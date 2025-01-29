// ik maak hier een leeg object 
const allesErin = {}

// ik voeg 2 properties toe
// wasleeg is een boolean en die als true heeft als waarde
// Versie heb ik als waarde A gegeven
allesErin.wasLeeg = true;
allesErin.Versie ="A";

// ik heb hier een array genaamd getallen, ik heb de waarde 1 in het array gebruikt
var getallen = [1]

// hier maak ik een for loop voor mijn array
// deze for loop zorgt dat de getallen 1 tot 12 worden toegevoegd
// i=1 is het initialisatie en ook het begin waarde
// i<=12 is de voorwaarden.
// 1++ is het increment
for (var i = 2; i <= 12; i++) {
    getallen.push(i);
    console.log(getallen);
    // ik schrijf het array getallen naar het console
    // hier push ik de opgeslagen getallen in het array.
}
// hier maak ik een var maximum, daarna gebruik ik math.max(...getallen) 
var maximum = Math.max(...getallen);
// hier push ik de var maximum 2 keer in het array met de operator *
getallen.push(maximum * 2);

// ik maak een nieuwe property aan (binair) en als value geef ik getallen
allesErin.binair = getallen;

// hier maak ik een object met de variable naam als sub 
// ik maak een property (getal) en bij getal zet ik een niet interger getal
// ik maak nog een property mijnNaam en daar zet ik mijn naam ertussen
// ik maak nog een property klaar en als waarde geef ik hem true want het is een bool
const sub = {
    getal: 8.30,
    mijnNaam: "Sufiyaan Alam",
    klaar: true,
}

// in mijn object allesErin maak ik een nieuwe property genaamd sub en de waarde ervan is "sub"
allesErin.sub = sub;

// als laatst schrijf ik mjin naam weg in het console
// in alleserin heb ik mijn object sub en in mijn object "sub" staat mijnNaam en de waarde van mijnNaam = "Sufiyaan Alam"
// en het schrijft daarna mijnNaam (Sufiyaan Alam naar het console)
console.log(allesErin.sub.mijnNaam);

