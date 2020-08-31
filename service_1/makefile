install:
    winpty docker exec -it service_1 composer install
    winpty docker exec -it service_2 composer install

start:
    winpty docker exec -it service_1 php bin/hyperf.php start
    winpty docker exec -it service_2 php bin/hyperf.php start