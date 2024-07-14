
# Task 3 - Wilayah

Test Result : ✅Passed


## Install my-project 


1.Install dependencies with
```bash
composer install.
```
2.Duplicate & Rename .
```bash
.env.example to .env.
```
3.Setup database conf in .env.

4.import database didalam database yang telah dibuat/ gunakan seeder untuk update wilayah.
```bash
php artisan db:seed --class=WilayahSeeder 
```   

6.Run php artisan serve to run at local server.
```bash
php artisan serve
```    
## API Reference

gunakan Postman untuk pengecekan RestAPI

#### Get all Wilayah

```http
  GET /api/Wilayah
```

#### Get wilayah berdasarkan id

```http
  GET /api/wilayah/${id}
```

#### Create wilayah

```http
  POST /api/wilayah
```

#### Update Wilayah berdasarkan id

```http
  PUT /api/wilayah/${id}
```

#### Delete wilayah berdasarkan id

```http
  DELETE /api/wilayah/${id}
```




