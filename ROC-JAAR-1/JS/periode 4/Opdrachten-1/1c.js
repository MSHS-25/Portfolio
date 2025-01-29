class Bankrekening {
    // Constructor om de privé-eigenschap _saldo te initialiseren
    constructor() {
        this._saldo = 0;
    }

    // Setter om het saldo in te stellen
    stelSaldoIn(nieuwSaldo) {
        // Controleer of het nieuwe saldo niet negatief is
        if (nieuwSaldo >= 0) {
            this._saldo = nieuwSaldo; // Stel het saldo in
        } else {
            // Geef een foutmelding als het saldo negatief zou worden
            console.log('Het saldo mag niet negatief zijn. Opgegeven saldo: ' + nieuwSaldo);
        }
    }

    // Methode om het saldo te verhogen
    verhoogSaldo(bedrag) {
        // Controleer of het bedrag positief is
        if (bedrag > 0) {
            this._saldo += bedrag; // Verhoogt het saldo
        }
    }

    // Getter om het saldo op te halen
    haalSaldoOp() {
        // Bereken de gehele euro's en de eurocenten
        let euros = Math.floor(this._saldo / 100); // ik gebruik math.floor om het naar beneden af te ronden
        let centen = this._saldo % 100;
        // Format de centen om altijd twee cijfers te hebben
        let centenString = '0' + centen;
        if (centen >= 10) {
            centenString = String(centen);
        }
        // return het saldo in het formaat € xxx,yy
        return '€ ' + euros + ',' + centenString;
    }
}

// Maak een nieuwe instantie van de klasse 'Bankrekening'
let mijnRekening = new Bankrekening();

// Gebruik de methode verhoogSaldo om 12.45 euro aan het saldo toe te voegen
mijnRekening.verhoogSaldo(1245); // 1245 centen is gelijk aan €12,45

// Gebruik de methode verhoogSaldo om 10 euro aan het saldo toe te voegen
mijnRekening.verhoogSaldo(1000); // 1000 centen is gelijk aan €10,00

// Schrijf het uiteindelijke saldo van de bankrekening naar de console
console.log(mijnRekening.haalSaldoOp()); // Verwachte output: € 22,45
