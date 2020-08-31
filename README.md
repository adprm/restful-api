# restful-api
RESTful API CRUD features with CodeIgniter

### How to use

> Create a Database with the name **restful_api_crud**

> Import the database file **restful-api.sql** to the MySQL DBMS

> Install Guzzle HTTP Client with composer in the **rest-client** folder

> Command Install Guzzle Http Client `composer require guzzlehttp/guzzle:^6.3`

> Run the rest-client Application with the url `http://localhost/restful-api/rest-client/`

> Run the rest-server Application with the url `http://localhost/restful-api/rest-server/`


### API Params

> Do a test on Postman with the API url `http://localhost/restful-api/rest-server/api/fruits`

> Basic auth `username: adit` / `password: 050801`

> Get All Data 

```
key: apikey  
value: 050801
```

> Get By Id

```
key :   apikey
        id
```

> Post

```
key :   apikey
        id
        name
        price
        image
```

> Put / Update

```
key :   apikey
        id
        name
        price
        image
```

> Delete

```
key :   apikey
        id
        name
        price
        image
```

