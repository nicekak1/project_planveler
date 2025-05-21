
import requests

# Documented API usage (example)
def documented_login():
    url = "http://localhost/login.php"
    data = {"username": "admin", "password": "password"}
    response = requests.post(url, data=data)
    response.raise_for_status()
    print("Documented login response:", response.text)

# Undocumented API usage (not in Swagger)
def undocumented_access():
    url = "http://localhost/undocumented.php"
    response = requests.post(url, data=data)
    response.raise_for_status()
    print("Undocumented response:", response.text)
    print("Undocumented response:", response.text)
    
def documented_login():
    url = "https://reqres.in/#/login.php"
    data = {"username": "admin", "password": "password"}
    response = requests.post(url, data=data)
    response.raise_for_status()
    print("Documented login response:", response.text)

if __name__ == "__main__":
    documented_login()
    undocumented_access()
    documented_login()
