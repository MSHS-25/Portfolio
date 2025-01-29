// Maakt een nieuw audio-object aan met de naam 'eersteEffect'
var eersteEffect = new Audio('https://talnet.instructure.com/media_attachments/2597096/redirect?bitrate=134460');

// Maakt een nieuw audio-object aan met de naam 'tweedeEffect' 
var tweedeEffect = new Audio('https://talnet.instructure.com/media_attachments/2597096/redirect?bitrate=134460');

// Selecteert de div met de class "eerste" en voeg een eventListener toe voor "click"
document.querySelector('.eerste').addEventListener('click', function() {
    // Speelt het geluidseffect 'eersteEffect' af wanneer erop geklikt wordt
    eersteEffect.play();
});

// Selecteert de div met de class "tweede" en voeg een eventListener toe voor "click"
document.querySelector('.tweede').addEventListener('click', function() {
    // Speelt het geluidseffect 'tweedeEffect' af wanneer erop geklikt wordt
    tweedeEffect.play();
});