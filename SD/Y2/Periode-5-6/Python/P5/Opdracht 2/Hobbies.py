Hobbies = []

Hobbies.append(input("Wat is jouw eerste hobby?\n"))
Hobbies.append(input("Wat is jouw tweede hobby?\n"))
Hobbies.append(input("Wat is jouw derde hobby?\n"))

print("Jouw hobby's zijn:", Hobbies)

Hobbies = []

for i in range(3):
    hobby = input("Wat is jouw hobby nummer " + str(i + 1) + "?\n")
    Hobbies.append(hobby)

print("Jouw hobby's zijn:", Hobbies)
