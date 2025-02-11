def fibonacci(n):
    a, b = 0, 1
    for _ in range(n):
        print(a, end=" ")
        a, b = b, a + b

    num = int(input("Hoeveel Fibonacci-getallen wil je zien? "))
    if num <= 0:
        print("Voer een positief getal in.")
    else:
        fibonacci(num)
