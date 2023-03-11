# Basic Reservation

## Getting Started

## Build Docker
```
docker-compose build
```
```
docker-compose up -d
```
```
docker-compose exec php /bin/bash 
```
``` 
composer install
```

## Migration file run and fixtures load
```
 php bin/console doctrine:migrations:migrate
 ```
```
php bin/console doctrine:fixtures:load
```
```
 php bin/console --env=test doctrine:database:create
```
``` 
php bin/console --env=test doctrine:schema:create
```


##E2e Test
```
php bin/phpunit
```
## DB structure
![alt text](https://www.linkpicture.com/q/Screenshot-2023-03-12-at-00.31.32.png)

You can use postman collection in project root folder.

##Example Request

```
curl --location 'http://127.0.0.1:8000/home/1' | jq
```

```
  % Total    % Received % Xferd  Average Speed   Time    Time     Time  Current
                                 Dload  Upload   Total   Spent    Left  Speed
100   275  100   275    0     0   5851      0 --:--:-- --:--:-- --:--:--  5851
{
  "payload": {
    "home": [
      {
        "id": 1,
        "name": "Rigoberto Hirthe",
        "description": "Floyd Lemke",
        "address": "12170 Bogisich Track Suite 296\nEast Madisenmouth, NE 89568-7486",
        "location": "4520 Miracle Shoals",
        "createdAt": "2023-03-11T21:14:33+00:00",
        "updatedAt": "2023-03-11T21:14:33+00:00"
      }
    ]
  }
}
```

```
curl --location 'http://127.0.0.1:8000/search?checkInDate=12.03.2023&checkOutDate=13.03.2023' | jq
```

```
  % Total    % Received % Xferd  Average Speed   Time    Time     Time  Current
                                 Dload  Upload   Total   Spent    Left  Speed
100  2216    0  2216    0     0  28779      0 --:--:-- --:--:-- --:--:-- 28779
{
  "payload": {
    "homes": [
      {
        "id": 3,
        "home": {
          "id": 3,
          "name": "Hannah Kuhlman II",
          "description": "Miss Jessica Homenick",
          "address": "6972 Edgardo Fords\nHalvorsonburgh, AR 00870-0565",
          "location": "45919 Miller Knolls",
          "createdAt": "2023-03-11T21:14:33+00:00",
          "updatedAt": "2023-03-11T21:14:33+00:00",
          "__isCloning": false
        },
        "fromDate": "2023-03-11T00:00:00+00:00",
        "toDate": "2023-03-13T00:00:00+00:00",
        "createdAt": "2023-03-11T21:14:33+00:00",
        "updatedAt": "2023-03-11T21:14:33+00:00"
      },
      {
        "id": 4,
        "home": {
          "id": 4,
          "name": "Aimee Bergnaum V",
          "description": "Nola Luettgen",
          "address": "3699 Bechtelar Keys Suite 014\nEast Lilianeshire, SC 79693-6255",
          "location": "48277 Virgil Mountain Apt. 863",
          "createdAt": "2023-03-11T21:14:33+00:00",
          "updatedAt": "2023-03-11T21:14:33+00:00",
          "__isCloning": false
        },
        "fromDate": "2023-03-11T00:00:00+00:00",
        "toDate": "2023-03-14T00:00:00+00:00",
        "createdAt": "2023-03-11T21:14:33+00:00",
        "updatedAt": "2023-03-11T21:14:33+00:00"
      },
      {
        "id": 5,
        "home": {
          "id": 5,
          "name": "Kacey Parker",
          "description": "Tate Bogan",
          "address": "4498 Everett Rapids\nBrakuschester, WA 66007",
          "location": "154 Funk Camp Apt. 328",
          "createdAt": "2023-03-11T21:14:33+00:00",
          "updatedAt": "2023-03-11T21:14:33+00:00",
          "__isCloning": false
        },
        "fromDate": "2023-03-11T00:00:00+00:00",
        "toDate": "2023-03-15T00:00:00+00:00",
        "createdAt": "2023-03-11T21:14:33+00:00",
        "updatedAt": "2023-03-11T21:14:33+00:00"
      },
      {
        "id": 6,
        "home": {
          "id": 6,
          "name": "Prof. Joany Ferry",
          "description": "Brenden Padberg",
          "address": "49319 Kyla Island\nWest Eugeniamouth, AZ 82517",
          "location": "3582 Kira Burgs",
          "createdAt": "2023-03-11T21:14:33+00:00",
          "updatedAt": "2023-03-11T21:14:33+00:00",
          "__isCloning": false
        },
        "fromDate": "2023-03-11T00:00:00+00:00",
        "toDate": "2023-03-16T00:00:00+00:00",
        "createdAt": "2023-03-11T21:14:33+00:00",
        "updatedAt": "2023-03-11T21:14:33+00:00"
      },
      {
        "id": 7,
        "home": {
          "id": 7,
          "name": "Johan Hickle",
          "description": "Rhett Davis Sr.",
          "address": "37292 Wisoky Spur Apt. 990\nEast Adrianna, HI 09757-7571",
          "location": "092 Nicolas Burg Suite 216",
          "createdAt": "2023-03-11T21:14:33+00:00",
          "updatedAt": "2023-03-11T21:14:33+00:00",
          "__isCloning": false
        },
        "fromDate": "2023-03-11T00:00:00+00:00",
        "toDate": "2023-03-17T00:00:00+00:00",
        "createdAt": "2023-03-11T21:14:33+00:00",
        "updatedAt": "2023-03-11T21:14:33+00:00"
      }
    ]
  }
}
```