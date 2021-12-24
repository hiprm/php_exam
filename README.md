### 1) Clone The Project From GitHub
git clone https://github.com/hiprm/php_exam.git

### 2) Create a MYSQL DB

### 3) Add DB name to .env file

### 4) composer install

### 5) Run DataBase Migration
php artisan migrate

### 6) Run Seeders
    php artisan db:seed --class=CustomerSeed
    php artisan db:seed --class=ProductSeed
    php artisan db:seed --class=OrderSeed
    php artisan db:seed --class=OrderDetailsSeed
    
### 7) start project
    php artisan serve
    
### 8) call get product API (GET API)
    http://127.0.0.1:8000/api/orders/1
    
### 9) call Create product API (POST API)
    http://127.0.0.1:8000/api/create_order
    
{
  "customerId": 1,
  "orderDate": "2021-12-29",
  "status": "pending",
  "comment": "testing comment",
  "order_details": [
    {
      "productId": 1,
      "orderQty": 5,
      "unitPrice": 700.50
    },
    {
      "productId": 2,
      "orderQty": 5,
      "unitPrice": 700.50
    }
  ]
}
