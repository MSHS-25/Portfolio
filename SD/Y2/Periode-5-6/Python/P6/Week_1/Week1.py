# Sufiyaan Alam OITSDO3D

# https://www.w3schools.com/python/python_for_loops.asp
# https://www.w3schools.com/python/python_user_input.asp
# Importeren van Faker

# Deel 1

from faker import Faker
import random

# Initialiseren van de Faker generator
fake = Faker()

try:
    aantal_namen = int(input("Hoeveel namen wilt u genereren? "))
    namen_lijst = []

    for i in range(aantal_namen):
        naam = fake.name() 
        namen_lijst.append(naam) 

    print("\nGegenereerde namen:")
    for naam in namen_lijst:
        print(naam)

# # deel 2

    namen_set = set()

    def list_checker(namen_lijst, namen_set):
        for naam in namen_lijst:
            if naam.startswith("C"):
                namen_set.add(naam)     

    # Check uitvoeren
    list_checker(namen_lijst, namen_set)

    # Printen van resultaten
    if namen_set:
        print("\nNamen die beginnen met de letter 'C':")
        for naam in namen_set:
            print(naam)
    else:
        print("\nGeen namen beginnen met de letter 'C'.")

# deel 3
    converted = list(namen_set)

    if converted: 
        print(f"Er zijn {len(converted)} naam/namen die beginnen met 'C'. Een willekeurige naam is: {random.choice(converted)}")
    else:
        print("Er zijn geen naam/namen die beginnen met een C")
# deel 4 
    if converted: 
        persoon_info = {
            "naam": random.choice(converted),
            "leeftijd": random.randint(18, 100),
            "adres": f"{random.randint(1, 100)} {random.choice(['straat'])}",
            "email": fake.email(),
            "telefoonnummer": fake.phone_number(),
        }

except ValueError:
    print("Fout: Vul een geheel getal in voor het aantal namen.")






