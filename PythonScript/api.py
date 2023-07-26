import requests
import json
# from googletrans import Translator
# translator = Translator() 
import random
import mysql.connector
from mysql.connector import Error


#Conexion Base de datos
try:
    mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="ambienteweb17/07",
    port="3307"
    )

    if mydb.is_connected:
        #Cursor para ejecutar sentencias
        mycursor = mydb.cursor()
        print("Conectado a la base de datos")
        #aqui va al cilo 
        for i in range(1,101):
            url = requests.get(f"https://dummyjson.com/products/{i}")
            data = url.json()

            #Datos del producto
            nombre = data["title"]
            precio = str(data["price"])
            descripcion = data["description"]
            cantidad = str(random.randint(1,100))
            categoria = data["category"]
            if categoria == "smartphones":
                categoria = 1
            elif categoria == "laptops":
                categoria = 2
            elif categoria == "fragrances":
                categoria = 3
            elif categoria == "skincare":
                categoria = 4
            elif categoria == "groceries":
                categoria = 5
            elif categoria == "home-decoration":
                categoria = 6
            elif categoria == "furniture":
                categoria = 7
            elif categoria == "tops":
                categoria = 8
            elif categoria == "womens-dresses":
                categoria = 9
            elif categoria == "womens-shoes":
                categoria = 10
            elif categoria == "mens-shirts":
                categoria = 11
            elif categoria == "mens-shoes":
                categoria = 12
            elif categoria == "mens-watches":
                categoria = 13
            elif categoria == "womens-watches":
                categoria = 14
            elif categoria == "womens-bags":
                categoria = 15
            elif categoria == "womens-jewellery":
                categoria = 16
            elif categoria == "sunglasses":
                categoria = 20
            elif categoria == "automotive":
                categoria = 17
            elif categoria == "motorcycle":
                categoria = 18
            elif categoria == "lighting":
                categoria = 19
              
            url_imagen = data["images"][0]

            #Insertar datos en MySQL
            query = f'INSERT INTO productos (nombre, precio, descripcion, cantidad_stock, categoria_id, url_imagen) VALUES ("{nombre}", "{precio}", "{descripcion}", "{cantidad}", "{categoria}", "{url_imagen}")'
            mycursor.execute(query)
            mydb.commit()

except Error as e:
    print("Error de conexión a la base de datos", e)

finally:
    if mydb.is_connected():
        mycursor.close()
        mydb.close()
        print("Conexión a la base de datos finalizada")






