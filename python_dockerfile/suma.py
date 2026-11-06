# a = float(input("Ingrese el primer numero: "))
# b = float(input("Ingrese el segundo numero: "))
# print(f"La suma de {a} + {b} es: {a + b}")
while True:
    texto_a = input("Primer numero: ")
    a = float(texto_a)
    b = float(input("Segundo numero: "))
    print(f"La suma de {a} + {b} es: {a + b}")
    texto_a = input ("Desea continuar con otra suma? Si/No : ")
    if texto_a.lower() == "no":
            break
