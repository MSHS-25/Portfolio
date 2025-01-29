// Functie om een taak toe te voegen
function addTask() {
    // Haal de <ul> op met id 'taskList'
    const taskList = document.getElementById('taskList');

    // Haal de waarde op van het inputveld voor taaknaam
    const taskName = document.getElementById('taskName').value;

    // Haal de waarde op van het inputveld voor taakbeschrijving
    const taskDescription = document.getElementById('taskDescription').value;

    // Maak een nieuw list item aan
    let li = document.createElement("li");
    
    // Voeg HTML toe aan het list item met de taaknaam, -beschrijving en een knop om de taak te voltooien
    li.innerHTML = `${taskName}: ${taskDescription} <button onclick="completeTask(this)">Voltooid</button>`;
    
    // Voeg het nieuwe list item toe aan de lijst met taken
    taskList.appendChild(li);
}

// Functie om een taak als voltooid te markeren
function completeTask(button) {
    // Haal het ouder element (het <li>) op van de knop
    const item = button.parentNode;

    // Voeg de klasse 'gedaan' toe aan het list item
    item.classList.add('gedaan');

    // Schakel de knop uit
    button.disabled = true;
}

// Voeg een event listener toe aan het element met id 'addTaskButton' om de addTask functie uit te voeren wanneer er op geklikt wordt
document.getElementById('addTaskButton').addEventListener('click', addTask);
