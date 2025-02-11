A = int(input("Typ de score van speler 1\n"))
B = int(input("Typ de score van speler 2\n"))

if A > B: 
    print("Speler 1 heeft gewonnen")
elif A < B:
    print("Speler 2 heeft gewonnen")
else:
    print("Het is een gelijkspel")
