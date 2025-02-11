class Animal:
    def __init__(self, name, species):  # Fix de dubbele underscores in __init__
        self.name = name
        self.species = species

    def introduce(self):
        print(f"I am {self.name} and I am a {self.species}.")


class Cat(Animal):
    def __init__(self, name, breed, age):
        super().__init__(name, species="Cat")
        self.breed = breed
        self.age = age

    def speak(self):
        print(f"{self.name} is aan het miauwen!")


class Dog(Animal):
    def __init__(self, name, breed, age):
        super().__init__(name, species="Dog")
        self.breed = breed
        self.age = age

    def speak(self):
        print(f"{self.name} is aan het blaffen!")


jira = Cat("Jira", "Persian", 3)
timmy = Dog("Timmy", "Labrador Retriever", 5)

def animal_speak(obj):
    return obj.speak()

animal_speak(jira)
