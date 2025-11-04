import express from "express";
import path from "path";
import { fileURLToPath } from "url";
import compression from "compression";
import bodyParser from "body-parser";

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const app = express();

app.disable("x-powered-by");
app.use(compression());
app.use(express.json());
app.use(bodyParser.urlencoded({ extended: false }));

// Fichiers statiques
app.use(express.static(path.join(__dirname, "../public")));

// Route principale
app.get("/", (req, res) => {
  res.sendFile(path.join(__dirname, "../public/SONATUR INNOVAIA2025/index.html"));
});

// Lancement serveur
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => console.log(`✅ Serveur SONATUR lancé sur le port ${PORT}`));
