function handleClick() { // Hier maak ik een click functie
    // Ik definieer een promise met 2 parameters, resultaat en fout
    let dobbelsteenPromise = new Promise((resultaat, fout) => {
        // Hier genereren we een willekeurig aantal ogen van 1 tot 6
        let aantalOgen = Math.floor((Math.random() * 6) + 1);

        if (aantalOgen > 0) { // Voorwaarde om te bepalen of het succesvol is
            resultaat(aantalOgen); // Als het goed gaat, geef resultaat(aantalOgen)
        } else { 
            // Als het fout gaat, geef "Fout bij het gooien van de dobbelsteen" terug
            fout("Fout bij het gooien van de dobbelsteen");
        }
    });

    // Handler voor de afhandeling van de promise
    dobbelsteenPromise.then((waarde) => {
        // Bij succes, bijwerken van de inhoud van de <p>-tag met het gegooid resultaat
        document.getElementById('resultaat').textContent = `Je hebt een ${waarde} gegooid!`;
    }).catch((error) => {
        // Bij een fout, bijwerken van de inhoud van de <p>-tag met de foutmelding
        document.getElementById('resultaat').textContent = error;
    });
}
// als ik op mijn buttom druk "rolDobbelsteen" met een click functie, voer HandleClick uit
document.getElementById("rolDobbelsteen").addEventListener("click", handleClick);
