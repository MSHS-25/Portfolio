'''
Sufiyaan OITSDO3D
'''
import time
import requests
from bs4 import BeautifulSoup

URL = 'http://localhost/'
time.sleep(1)

response = requests.get(URL)
print( "URL gevonden wacht 3 seconden")
time.sleep(3)

soup = BeautifulSoup(response.content, 'html.parser')
print(soup.prettify())