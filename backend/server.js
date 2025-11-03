const express = require('express');
const path = require('path');
const helmet = require('helmet');
const compression = require('compression');
const rateLimit = require('express-rate-limit');
const nodemailer = require('nodemailer');
const { Pool } = require('pg');
const { v4: uuidv4 } = require('uuid');
const bodyParser = require('body-parser');
const basicAuth = require('express-basic-auth');

const app = express();
app.disable('x-powered-by');
app.use(helmet());
app.use(compression());
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());
app.use(express.static(path.join(__dirname, '../public')));
app.set('view engine','ejs');
app.set('views', path.join(__dirname, 'views'));

const limiter = rateLimit({ windowMs: 60*1000, max: 200 });
app.use(limiter);

const pool = new Pool({ connectionString: process.env.DATABASE_URL, ssl: { rejectUnauthorized: false } });

async function ensureTables(){
  await pool.query(`
  CREATE TABLE IF NOT EXISTS submissions (
    id UUID PRIMARY KEY,
    receipt_code TEXT UNIQUE,
    full_name TEXT,
    email TEXT,
    phone TEXT,
    message TEXT,
    created_at TIMESTAMP DEFAULT now()
  );
  `);
}
ensureTables().catch(console.error);

app.post('/api/contact', async (req,res) => {
  try{
    const { full_name, email, phone, message } = req.body;
    const id = uuidv4();
    const receipt = id.split('-')[0];
    await pool.query('INSERT INTO submissions (id, receipt_code, full_name, email, phone, message) VALUES ($1,$2,$3,$4,$5,$6)', [id, receipt, full_name, email, phone, message]);
    let transporter = nodemailer.createTransport({
      host: process.env.SMTP_HOST,
      port: parseInt(process.env.SMTP_PORT||587),
      secure: (process.env.SMTP_SECURE === 'true'),
      auth: {
        user: process.env.SMTP_USER,
        pass: process.env.SMTP_PASS
      }
    });
    const mailOptions = {
      from: process.env.SMTP_FROM || `SONATUR Support <noreply@sonatur.app>`,
      to: process.env.SMTP_USER,
      bcc: process.env.PROTON_BACKUP_EMAIL || undefined,
      subject: `Nouvelle soumission ${receipt}`,
      text: `Code: ${receipt}\nNom: ${full_name}\nEmail: ${email}\nTel: ${phone}\nMessage: ${message}`
    };
    transporter.sendMail(mailOptions).catch(console.error);
    res.redirect(`/receipt/${receipt}`);
  }catch(e){
    console.error(e);
    res.status(500).send('Erreur serveur');
  }
});

app.get('/receipt/:code', async (req,res) => {
  const code = req.params.code;
  const r = await pool.query('SELECT * FROM submissions WHERE receipt_code=$1', [code]);
  if(r.rows.length===0) return res.status(404).send('Not found');
  res.render('receipt', {row: r.rows[0]});
});
app.get('/', (req, res) => {
  res.sendFile(__dirname + '/../public/SONATUR INNOVAIA2025/index.html');
});

app.use('/admin', basicAuth({
  users: { [process.env.ADMIN_USER || 'admin']: process.env.ADMIN_PASS || 'Innovaia2025' },
  challenge: true
}));

app.get('/admin', async (req,res) => {
  const r = await pool.query('SELECT id, receipt_code, full_name, email, phone, created_at FROM submissions ORDER BY created_at DESC LIMIT 200');
  res.render('admin', {rows: r.rows});
});

app.get('/admin/export.csv', async (req,res) => {
  const r = await pool.query('SELECT id, receipt_code, full_name, email, phone, message, created_at FROM submissions ORDER BY created_at DESC');
  const lines = ['id,receipt_code,full_name,email,phone,message,created_at'];
  r.rows.forEach(row => lines.push([row.id,row.receipt_code,row.full_name,row.email,row.phone,row.message,row.created_at].map(s=>`"${String(s).replace(/"/g,'""')}"`).join(',')));
  res.header('Content-Type','text/csv');
  res.attachment('export.csv');
  res.send(lines.join('\n'));
});

app.get('/health',(req,res)=>res.json({ok:true}));

const port = process.env.PORT || 10000;
app.listen(port, ()=> console.log('Listening', port));

import path from "path";
import { fileURLToPath } from "url";

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

app.use(express.static(path.join(__dirname, "../public")));

app.get("/", (req, res) => {
  res.sendFile(path.join(__dirname, "../public/SONATUR INNOVAIA2025/index.html"));
});
