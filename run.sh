#!/bin/bash

set -xe

# Build the image
docker build -t contesterpp-web-image:1.0 .

# Run the container
docker run -p 80:80 --name contesterPP-web -v "$(pwd)":/var/www/html contesterpp-web-image:1.0
