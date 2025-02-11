class Dog:
    def __init__(self, name, breed, age):
        self.name = name
        self.breed = breed
        self.age = age

dog_one = Dog("Buddy", "Golden Retriever", 3)

print (dog_one.__dict__)