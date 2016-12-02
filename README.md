# Tentang Indo Data
Database apa saja yang berhubungan dengan indonesia. Memakai Eloquent Model sehingga mendukung relationship Has Many dan Belongs to.

## Instalasi dengan Composer
```bash
composer require buchin/indodata
```
## Contoh Penggunaan
```php
use Buchin\Indodata\Province;
use Buchin\Indodata\City;
use Buchin\Indodata\District;
use Buchin\Indodata\Village;

// Initialize Capsule. Required to initialize DB connection.
$capsule = new Capsule;


// Relationship: Belongs To
// Get village
$village = Village::first();

// Get district
$district = $village->district;

// Get City
$city = $district->city;

// Get Province
$province = $city->province();

// Chainable
$province = $village->district->city->province;

```
