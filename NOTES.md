Intro
---
Docker Machine (Mac users)
Dockerfile_v1
Docker Hub

Dockerfile_v2

v1
---
docker-compose -f docker-compose-v1.yml build
docker-compose -f docker-compose-v1.yml up -d
docker-compose -f docker-compose-v1.yml ps

http://192.168.99.100:32783/app/index_v1.php

Change something with no effect

v2
---
docker-compose -f docker-compose-v2.yml build
docker-compose -f docker-compose-v2.yml up -d
docker-compose -f docker-compose-v2.yml ps

http://192.168.99.100:32783/app/index_v1.php

v3
---
docker-compose -f docker-compose-v3.yml build
docker-compose -f docker-compose-v3.yml up -d
docker-compose -f docker-compose-v3.yml ps

No data
http://192.168.99.100:32783/app/index_v2.php

Import data
docker-compose -f docker-compose-v3.yml exec mysql sh -c "mysql -udocker -p docker_test < ./docker/mysql/data.sql"

Refresh page with data

Stop container and restart - data is persistent
docker-compose -f docker-compose-v3.yml stop
docker-compose -f docker-compose-v3.yml up -d

Completely remove the containers, data will be deleted
docker-compose -f docker-compose-v3.yml down
docker-compose -f docker-compose-v3.yml up -d

Autologic
---
Show Autologic structure

Useful things for Mac users
---

https://github.com/adlogix/docker-machine-nfs

```
alias docknfs="/usr/local/bin/docker-machine-nfs default --shared-folder=/Users --shared-folder=/private/var/folders"
```

clean up unused images and containers

```
#!/bin/bash

# Delete all stopped containers
docker rm $( docker ps -q -f status=exited)

# Delete all dangling (unused) images
docker rmi $( docker images -q -f dangling=true)
```