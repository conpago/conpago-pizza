# conpago-pizza
Conpago Framework demo app

How to use:

1. Run server with entrypoint in project /public directory  
```bash
php -S localhost:8888 -t public/
```

2. Say Hello to check everything is working fine:
```bash
curl -i "localhost:8888"
```
Result:
```
HTTP/1.1 200 OK
Host: localhost:8888
Date: Wed, 22 Mar 2017 09:48:21 +0100
Connection: close
X-Powered-By: PHP/7.1.3-2+deb.sury.org~xenial+1
Content-type: text/html; charset=UTF-8

{"success":true,"text":"Hello World!!!"}
```

3. Order Your pizza:
```bash
curl -i \
-X POST \
--header "Content-Type: application/json" \
--header "Accept: application/json" \
-d '{"order":{"name": "capriciosa","double_dough": "1","sauces": ["ketchup", "mayonaise"]}}' \
"http://localhost:8888/?interactor=OrderPizza"
```
Result:
```
HTTP/1.1 200 OK
Host: localhost:8888
Date: Wed, 22 Mar 2017 09:48:14 +0100
Connection: close
X-Powered-By: PHP/7.1.3-2+deb.sury.org~xenial+1
Content-type: text/html; charset=UTF-8

{"ingredients":{"0":"sos pomidorowy","1":"ser","2":"pieczarki"},"double_dough":"1","sauces":{"0":"ketchup","1":"mayonaise"}}
```