// Definieer de basisklasse Monster
class Monster {
    constructor(name, hp, attackPower, defense) {
        this.name = name;
        this.hp = hp;
        this.attackPower = attackPower;
        this.defense = defense;
    }

    // Methode om aan te vallen
    attack(target) {
        let damage = 0; // Initialiseer de variabele damage met 0

        // Bereken de schade die wordt toegebracht
        if (this.attackPower > target.defense) {
            damage = this.attackPower - target.defense;
        } else {
            damage = 0;
        }

        // Richt de schade aan het doelwit
        target.take_damage(damage);
    }

    // Methode om schade te ontvangen
    take_damage(damage) {
        // Verminder de HP met de schade
        this.hp -= damage;
    }
}

// Definieer de Dragon klasse als subklasse van Monster
class Dragon extends Monster {
    constructor(name, hp, attackPower, defense, fireBreath) {
        super(name, hp, attackPower, defense);
        this.fireBreath = fireBreath; // Nieuwe eigenschap specifiek voor Dragon
    }
}

// Definieer de Goblin klasse als subklasse van Monster
class Goblin extends Monster {
    constructor(name, hp, attackPower, defense, stealth) {
        super(name, hp, attackPower, defense);
        this.stealth = stealth; // Nieuwe eigenschap specifiek voor Goblin
    }
}

// Maak een nieuwe instantie van Dragon
let draco = new Dragon("Draco", 100, 20, 10, "vuurspuwen");

// Maak een nieuwe instantie van Goblin
let sneaky = new Goblin("Sneaky", 50, 15, 5, "sluipaanval");

// Dragon valt Goblin aan
draco.attack(sneaky);

// Goblin valt Dragon aan
sneaky.attack(draco);

// Schrijf de overgebleven HP van Dragon naar de console
console.log(draco.name + " heeft nog " + draco.hp + " HP over.");

// Schrijf de overgebleven HP van Goblin naar de console
console.log(sneaky.name + " heeft nog " + sneaky.hp + " HP over.");