## Overview

PHP's `array_map()` function doesn't allow associative array key mutation. This package provides a function, `array_map_keys()` which does.

The function iterates over an array and mutates each array item with the provided callback.

## Installation

Via Composer:
```
composer require aviator/array-map-keys
```

## Testing

Via Composer:
```
composer test
```

## Usage

An array:

```php
$input = [
    [
        'company' => 'Aviator Creative',
        'owner' => 'Daniel Deboer',
        'email' => 'daniel.s.deboer@gmail.com',
    ],
    [
        'company' => 'Widget Makers',
        'owner' => 'Jane Doe',
        'email' => 'jane@widgets.com',
    ],
];
```

A callback:

```php
$callback = function ($key, $value) {
    return [
        $value['owner'] => $value['email'];
    ];
};
```

The `array_map_keys` function:

```php
$results = array_map_keys($input, $callback);
```

The output:

```php
echo $results;

/*
[
    'Daniel Deboer' => 'daniel.s.deboer@gmail.com',
    'Jane Doe' => 'jane@widgets.com',
]
*/
```

## Other Stuff

### License

This package is licensed with the [MIT License (MIT)](LICENSE.md).