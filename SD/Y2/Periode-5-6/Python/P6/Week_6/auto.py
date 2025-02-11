class Auto:
    def __init__(self, merk, kenteken, type, tank, kleur):
        self.merk = merk
        self.kenteken = kenteken
        self.type = type
        self.tank = tank
        self.kleur = kleur

    def start_auto(self):
        print(f"{self.merk} {self.type} {self.kleur} is gestart.")
        

    def stop_auto(self):
        print(f"{self.merk} {self.type} {self.kleur} is gestopt.")

    def check_tank(self):
        if self.tank < 10:
            print(f"De {self.merk} {self.type} moet zo spoedig mogelijk tanken! Er is nog maar {self.tank}% benzine in de tank!")
        elif 10 <= self.tank < 40:
            print(f"De {self.merk} {self.type} moet binnenkort tanken. Er zit nog maar {self.tank}% benzine in de tank!")
        else:
            print(f"De {self.merk} {self.type} heeft nog voldoende benzine, namelijk {self.tank}%!")


    def check_kenteken(self):
        print(f"De {self.merk} {self.type} ({self.kleur}) heeft als kenteken {self.kenteken}.")




auto1 = Auto("Hyundai", "AB-123-CD", "Nvision 76", 99, "grijs")
auto2 = Auto("Honda", "EF-456-GH", "Civic", 20, "rood")
auto3 = Auto("Nissan", "IJ-789-KL", "Skyline", 5, "blauw")
auto4 = Auto("BMW", "MN-012-OP", "M3", 80, "zwart")

auto1.start_auto()
auto2.stop_auto()
auto3.check_tank()
auto4.check_kenteken()