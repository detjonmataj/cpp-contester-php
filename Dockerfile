FROM php:8.2.0RC6-apache-bullseye

CMD ["bash"]

RUN apt-get update -yq && apt-get upgrade -yq
RUN apt-get install openssh-server -yq

RUN echo 'root:password' | chpasswd
RUN mkdir -p /var/run/sshd
RUN sed -i "s/.*PasswordAuthentication.*/PasswordAuthentication yes/g" /etc/ssh/sshd_config

RUN echo "It works!" > /var/www/html/index.php

EXPOSE 80
EXPOSE 22

ENTRYPOINT ["bash", "-c", "/usr/sbin/sshd && apache2-foreground"]
