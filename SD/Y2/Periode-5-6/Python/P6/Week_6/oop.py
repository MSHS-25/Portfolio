class BankAccount:
    def __init__(self, name, iban, amount):
        self.name = name
        self.account_number = iban
        self.__account_amount = amount

    def greet(self):
        return f"hello, {self.account_holder}. Uw IBAN is {self.__account_number}."
    
    def get_saldo(self):
        return f"Uw saldo is {round(self.__account_amount, 2)}."
    
    def get_saldo(self, amount: float, description: str):
        if amount < 0:
            return f"er is {round(amount, 2)} afgeschreven."
        else:
            self.__account_amount += amount
            return f"Er is {round(amount, 2)} opgeslagen. Het nieuwe saldo is {round(self.__account_amount, 2)}."