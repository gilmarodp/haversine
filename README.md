# 📄 Haversine

A PHP library to calculate the distance between coordinates using the Haversine formula.

<a href="https://www.buymeacoffee.com/gilmarodp"><img src="https://img.buymeacoffee.com/button-api/?text=Buy me a coffee&emoji=☕&slug=gilmarodp&button_colour=FFDD00&font_colour=000000&font_family=Cookie&outline_colour=000000&coffee_colour=ffffff" /></a>

## 🚀 Installation

Use [Composer](https://getcomposer.org):

Install via Composer:

```bash
composer require gilmarodp/haversine
```

## 📦 Usage

```php
require 'vendor/autoload.php'; // optional

use Gilmarodp\Haversine\Point;
use Gilmarodp\Haversine\Calculator;

// Define point A (latitude, longitude)
$pointA = new Point(-23.55052, -46.633308);

// Define point B (latitude, longitude)
$pointB = new Point(-23.55100, -46.634000);

// Calculate the distance between point A and point B in meters
$distance = Calculator::distance($pointA, $pointB);

// Show the distance
echo "Distance: {$distance} meters";
// Expected output: Distance: 88.455106784955 meters
```

## 📘 API

`Point`: Represents a geographic point.

```php
new Point(float $latitude, float $longitude)
```

`Calculator`: Calculator abstration
```php
Calculator::distance(Point $from, Point $to): float
```
This static function returns the distance in meters between two points.


## ✅ Requirements

🐘 PHP 7.4 or higher


## 🧪 Testing

```bash
composer test
```

## 👤 Author

[Gilmar Oliveira](https://gilmar.is-a.dev)


## Version

MIT - [LICENSE](LICENSE)
