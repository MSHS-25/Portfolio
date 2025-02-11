//Zorg dat je weer helemaal 'up to date' bent door in de root-folder "npm i" te gebruiken.
import express from "express";
import { dirname } from "path";
import { fileURLToPath } from "url";
import https from "https";

// Om lokaal pad te benaderen.
const __dirname = dirname(fileURLToPath(import.meta.url));
// Parameters tbv server
const app = express();
const port = process.env.PORT || 3000;

// Ter voorkomen van CORS
app.use((req, res, next) => {
    res.header('Access-Control-Allow-Origin', '*');
    next();
  });


// ------------ ROUTES ------------
// De ROOT
app.get("/", (req, res) => {
    // console.log(req);
    res.sendFile(__dirname + "/opdracht4b.html");
});

// De proxy voor: https://www.mmobomb.com/api1/games
app.get("/api/games", (req, res) => {
    // Melden:
    console.log('Informatie van alle games wordt opgehaald...');

    // Request naar mmobomb sturen:
    https.get('https://www.mmobomb.com/api1/games', response => {
        let deData = '';
        
        // Als er data binnenkomt
        response.on('data', antw => {
            // Aangezien we de data in stukken krijgen, alles aan de variabele deData vastplakken
            deData += antw.toString();
        });
      
        response.on('end', () => {
            // We zijn blijkbaar klaar; alle data is nu binnen
            // Stuur deData terug (deData bevat JSON)
            // console.log(JSON.parse(deData)[0]); // Eerste object even tonen
            res.send(deData);

        });

      }).on('error', err => {
        console.log('Error opgetreden: ', err.message);
    });
 
});

// De proxy voor: https://www.mmobomb.com/api1/game?id=xxx
app.get("/api/game", (req, res) => {
    // Toon id in console:
    console.log(`Info wordt opgehaald voor game-id: ${req.query.id}`);

    //Game info ophalen (obv id)
    https.get(`https://www.mmobomb.com/api1/game?id=${req.query.id}`, response => {
        let deData = '';
        
        // Als er data binnenkomt
        response.on('data', antw => {
            // Aangezien we de data in stukken krijgen, alles aan de variabele deData vastplakken
            deData += antw.toString();
        });
      
        response.on('end', () => {
            // We zijn blijkbaar klaar; alle data is nu binnen
            // Stuur deData terug (deData bevat JSON)
            // console.log(JSON.parse(deData));
            res.send(deData);
        });

      }).on('error', err => {
        console.log('Error opgetreden: ', err.message);
    });
  
});


// Hier de feitelijke server
app.listen(port, () => {
    console.log("Server listening @ " + port);
});