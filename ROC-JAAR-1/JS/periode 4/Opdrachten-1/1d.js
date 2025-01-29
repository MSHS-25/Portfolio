class Monster {
    static monsters = []; // Een leeg array om alle gecreëerde monsters bij te houden.
  
    static maxHealth() { // maxHealth geef ik als waarde 100
        return 100;
    }
  
    constructor(name, hp) {
        this.name = name;
        this.hp = hp;
        Monster.monsterCount++; // monsterCount wordt hier verhoogd wanneer een nieuw monster wordt gemaakt.
        Monster.monsters.push(this); // Het nieuwe monster wordt toegevoegd aan het array van monsters.
    };
  
    static generateRandomHealth(maxHealth) {
        if (maxHealth <= 50) {
            return 51;
        }
        // Genereert een willekeurige gezondheidswaarde tussen 51 en maxHealth
        return Math.floor(Math.random() * (maxHealth - 50)) + 51;
    };

    static createMonster(name) { // Kleine letter "c" in "createMonster" gebruikt om overeen te komen met de methodeaanroep hieronder.
        const hp = this.generateRandomHealth(this.maxHealth());
        return new Monster(name, hp); // Geeft een nieuw monster terug met de gegenereerde naam en hp.
    };

    attack() {
        const attackValue = Math.floor(Math.random() * 11) + 10; // Berekent de aanvalswaarde.
        this.hp -= attackValue; // Verlaagt de gezondheid van het aangevallen monster.
        if (this.hp < 0) {
            this.hp = 0; // Zorgt ervoor dat de gezondheid niet onder nul gaat.
        }
        return attackValue; // Geeft de aanvalswaarde terug.
    }

    static getTotalMonsters() {
        return Monster.monsterCount; // Geeft het totale aantal monsters terug.
    };
}

// Creëer drie monsters
const dragon = Monster.createMonster("Dragon");
const hydra = Monster.createMonster("Hydra");
const phoenix = Monster.createMonster("Phoenix");

console.log(`Total monsters created: ${Monster.getTotalMonsters()}`); // Toont het totale aantal gecreëerde monsters.
console.log(Monster.monsters); // Toont de details van alle monsters.

// Laat de monsters elkaar aanvallen en toon de resultaten in de console
console.log(`\nBattle begins:`);

// Dragon valt Hydra aan
let attackValue = dragon.attack(hydra);
console.log(`Dragon attacks Hydra for ${attackValue} damage. Hydra's remaining HP: ${hydra.hp}`);

// Hydra valt Phoenix aan
attackValue = hydra.attack(phoenix);
console.log(`Hydra attacks Phoenix for ${attackValue} damage. Phoenix's remaining HP: ${phoenix.hp}`);

// Phoenix valt Dragon aan
attackValue = phoenix.attack(dragon);
console.log(`Phoenix attacks Dragon for ${attackValue} damage. Dragon's remaining HP: ${dragon.hp}`);

console.log(`\nFinal states of monsters:`);
console.log(Monster.monsters); // Toont de uiteindelijke toestanden van de monsters.
