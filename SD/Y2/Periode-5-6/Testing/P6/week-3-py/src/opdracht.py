class Winkelwagen:
    def __init__(self):  
        self.prijzenlijst = {
            "melk": 3.50,
            "eieren": 4.20,
            "appels": 2.80,
            "brood": 1.90
        }

        self.productenlijst = {
            "melk": 3,
            "eieren": 2,
            "appels": 5,
            "brood": 8
        }

    def voeg_item_toe(self, item, aantal):
        self.productenlijst[item] += aantal

    def totale_prijs(self):
        totale_prijs = 0
        for item in self.prijzenlijst.keys():
            totale_prijs += self.prijzenlijst[item] * self.productenlijst[item]
        return totale_prijs

    