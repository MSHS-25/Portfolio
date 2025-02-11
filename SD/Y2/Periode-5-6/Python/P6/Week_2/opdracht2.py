'''
Sufiyaan OITSDO3D
'''
import sys
import time

uppercase_used = False
number_used = False
eight_digits_used = False

def check_password(x: str):
    global uppercase_used
    global number_used
    global eight_digits_used

    for char in x:
        if char.isupper():
            uppercase_used = True
        elif char.isdigit():
            number_used = True

        eight_digits_used = True if len(x) >= 8 else False
    
    
    if all([uppercase_used, number_used, eight_digits_used]):
        return True
    else:
        raise ValueError("Wachtwoord heeft niet de juiste vereisten")

while True:
    try:
        password = input("Voer een wachtwoord in: ")
        check_password(password)
    except ValueError as error:
        print(error)

    except KeyboardInterrupt:
        print("\nProgramma gestopt door de gebruiker.")
        sys.exit(0)
    else:
        print("Wachtwoord is geldig.")
        break
    finally:
         print(f"Finally statement geprint op {time.strftime('%Y-%m-%d %H:%M:%S')}")

sys.exit(0)
