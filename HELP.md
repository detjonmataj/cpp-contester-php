# How to Run

```console
docker build -t contesterpp-web-image:1.0 . && docker run -p 80:80 --name contesterPP-web -v "$(pwd)":/var/www/html contesterpp-web-image:1.0
```
