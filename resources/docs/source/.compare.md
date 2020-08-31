---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#general


<!-- START_b5807964b67925bcb310ef24f51967da -->
## api/cars
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/cars" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/cars"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "id": 2,
        "year": 1996,
        "make": "Mazda",
        "model": "Miata",
        "sub_model": "Base",
        "engine": "1.8l",
        "mileage": 100000,
        "created_at": "2020-07-19T00:16:34.000000Z",
        "updated_at": "2020-07-19T00:16:34.000000Z"
    }
]
```

### HTTP Request
`GET api/cars`


<!-- END_b5807964b67925bcb310ef24f51967da -->

<!-- START_5835f3073a1fb3277b5fc35d89bad64e -->
## api/cars/{id}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/cars/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/cars/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "Car not found"
}
```

### HTTP Request
`GET api/cars/{id}`


<!-- END_5835f3073a1fb3277b5fc35d89bad64e -->

<!-- START_030a3b97848ed13cc21cfefd0a48956f -->
## api/cars
> Example request:

```bash
curl -X POST \
    "http://localhost/api/cars" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/cars"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/cars`


<!-- END_030a3b97848ed13cc21cfefd0a48956f -->

<!-- START_cd23c1970aa48399dfac4bbcbea20db5 -->
## api/cars/{id}
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/cars/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/cars/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/cars/{id}`


<!-- END_cd23c1970aa48399dfac4bbcbea20db5 -->

<!-- START_2fa030336d4f47d1903c039cabebe397 -->
## api/cars/{id}
> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/cars/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/cars/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/cars/{id}`


<!-- END_2fa030336d4f47d1903c039cabebe397 -->


