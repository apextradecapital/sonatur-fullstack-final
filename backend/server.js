import express from "express";
import path from "path";
import { fileURLToPath } from "url";
import compression from "compression";
import bodyParser from "body-parser";

const __filename = fileURLToPath(import.meta.url);
const _dirname = path.dirname(_filename);

const app = express();

app.disable("x-powered-by");
app.use(compression());
app.use(express.json());
app.use(bodyParser.urlencoded({ extended: false }));

// Fichiers statiques
app.use(express.static(path.join(__dirname, "../public")));

// Route principale
app.get("/", (req, res) => {
  res.sendFile(path.join(__dirname, "../public/index.html"));
});

// Route pour la page d'accueil de souscription
app.get("/souscription/", (req, res) => {
  res.sendFile(path.join(__dirname, "../public/souscription.sonaturbf.net/index.html"));
});

// Servir les fichiers statiques de la souscription
app.use("/souscription", express.static(path.join(__dirname, "../public/souscription.sonaturbf.net")));

// Lancement serveur
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => console.log(✅ Serveur SONATUR lancé sur le port ${PORT}));