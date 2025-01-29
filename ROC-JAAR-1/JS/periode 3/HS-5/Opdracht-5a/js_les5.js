// Wacht totdat het DOM is geladen voordat de JavaScript-code wordt uitgevoerd.
document.addEventListener('DOMContentLoaded', function () {
    // Voeg een click eventListener toe aan de div met class "eerste".
    document.querySelector('.eerste').addEventListener('click', function(e) {
        // Log het event-object 'e' naar de console.
        console.log(e);
    });

    // Functie die de positiegegevens weergeeft in specifieke divs.
    function divToonPositie(e) {
        // Pas de tekst-inhoud van specifieke divs aan met positiegegevens.
        document.querySelector("#a1").textContent = e.clientX;
        document.querySelector("#a2").textContent = e.clientY;
        document.querySelector("#a3").textContent = e.offsetX;
        document.querySelector("#a4").textContent = e.offsetY;
        document.querySelector("#a5").textContent = e.pageX;
        document.querySelector("#a6").textContent = e.pageY;
        document.querySelector("#a7").textContent = e.screenX;
        document.querySelector("#a8").textContent = e.screenY;
    }

    // Voeg een mousemove eventListener toe aan de div met class "tweede".
    document.querySelector('.tweede').addEventListener('mousemove', divToonPositie);

    // Functie die de inhoud van elementen met class 'inhoud' leegt.
    function leegStats(e) {
        // Selecteer alle elementen met class 'inhoud'.
        var inhoudArray = document.querySelectorAll('.inhoud');
        // Loop door alle elementen in inhoudArray en leeg hun tekstinhoud.
        for (var i = 0; i < inhoudArray.length; i++) {
            inhoudArray[i].textContent = "";
        }
    }

    // Voeg een mouseout eventListener toe aan de div met class "tweede".
    document.querySelector('.tweede').addEventListener('mouseout', leegStats);
});
