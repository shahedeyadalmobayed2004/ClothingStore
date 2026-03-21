# 📑 Project Documentation: Clothing Store
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


### 🚀 CI/CD Pipeline Status
* Unit & Browser Testing: Passed ✅
* Code Standards (PSR-12): Verified ✅
* Static Analysis (PHPStan): Clean ✅

## 5. Document API Endpoints and Android App Features

### 🟢 Part 1: API Endpoints (Laravel Backend)
| Method | Endpoint | Description |
| :--- | :--- | :--- |
| `GET` | `/products` | View all products with search & category filtering |
| `POST` | `/products` | Store a new product in the database |
| `PUT` | `/products/{id}` | Update product details |
| `DELETE` | `/products/{id}` | Remove a product from the store |
| `GET` | `/categories` | List all available categories |

### 📱 Part 2: Android App Features
* Product Browser: A mobile interface to browse clothing items synced with the backend.
* Search & Filter: Allows users to find products by name or category.
* Real-time Data Sync: Ensures prices and availability are always current.
