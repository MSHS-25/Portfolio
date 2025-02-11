stemmen_frederiek = 0
stemmen_tim = 0

while True:
    stem = input("Op wie wil je stemmen? (Frederiek of Tim): ").strip().lower()
    
    if stem == "uitslag":
        break
    elif stem == "frederiek":
        stemmen_frederiek += 1
    elif stem == "tim":
        stemmen_tim += 1

if stemmen_frederiek > stemmen_tim:
    print("Frederiek heeft gewonnen!")
elif stemmen_tim > stemmen_frederiek:
    print("Tim heeft gewonnen!")
else:
    print("Het is een gelijkspel!")
