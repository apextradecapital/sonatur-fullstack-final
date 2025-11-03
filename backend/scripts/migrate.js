const { Pool } = require('pg');
const pool = new Pool({ connectionString: process.env.DATABASE_URL, ssl: { rejectUnauthorized: false } });
(async()=>{
  await pool.query(`CREATE TABLE IF NOT EXISTS submissions (id UUID PRIMARY KEY, receipt_code TEXT UNIQUE, full_name TEXT, email TEXT, phone TEXT, message TEXT, created_at TIMESTAMP DEFAULT now());`);
  console.log('Migration done'); process.exit(0);
})();