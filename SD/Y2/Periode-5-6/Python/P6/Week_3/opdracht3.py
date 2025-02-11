'''
Sufiyaan OITSDO3D
'''

def totaal_doelpunten(bestand):
    with open(bestand, 'r') as data:
        totaal = 0
        for rij in data:
            gesplitst = rij.strip().split(',')
            totaal += int(gesplitst[3]) + int(gesplitst[4])
    return totaal

def doelpunten_feyenoord_uit(bestand):
    with open(bestand, 'r') as data:
        totaal = 0
        for rij in data:
            gesplitst = rij.strip().split(',')
            if gesplitst[1] == "Ajax":
                totaal += int(gesplitst[4])
    return totaal

def ajax_hield_nul(bestand):
    with open(bestand, 'r') as data:
        for rij in data:
            gesplitst = rij.strip().split(',')
            if gesplitst[0] == "Ajax" and int(gesplitst[4]) == 0:
                return gesplitst[2]
    return None

bestand = "klassieker.txt"

vraag1 = totaal_doelpunten(bestand)
print(f"VRAAG 1: Er zijn in totaal {vraag1} doelpunten gemaakt.")

vraag2 = doelpunten_feyenoord_uit(bestand)
print(f"VRAAG 2: Feyenoord heeft {vraag2} doelpunten gescoord in hun uitwedstrijden bij Ajax.")

vraag3 = ajax_hield_nul(bestand)
if vraag3:
    print(f"VRAAG 3: Ajax hield voor het eerst de nul in de ArenA op {vraag3}.")
else:
    print("VRAAG 3: Geen enkele wedstrijd gevonden")
