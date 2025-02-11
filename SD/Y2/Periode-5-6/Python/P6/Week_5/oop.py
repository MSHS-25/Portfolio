class Person:
    def __init__(self, name):
        self.name = name
        
    def say_hello(self):
        return f"Hello, my name is {self.name}!"
    
ik = Person("Sufi")
print(ik.say_hello())

