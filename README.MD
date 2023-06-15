# Cookie-based authentication middleware for Laravel.

Cookie-based authentication is a Laravel middleware that provides cookie-based authentication functionality. It allows you to secure your application from any access.

## Installation

You can install this package via Composer. Simply run the following command:

```bash
composer require zalkarz/cookie-based-auth
```

## Usage

To use the Cookie-based authentication middleware, follow these steps:

1. Add the middleware to your route or route group in your Laravel application.
2. Configure the required environment variables for authentication credentials.
3. Customize the authentication logic if needed.

Here's an example of how to add the middleware to a route group:

```php
protected $middlewareGroups = [
        'web' => [
            ...
            \Zalkarz\CookieBasedAuth\Http\Middleware\CookieBasedAuth::class
        ],
    ];
```

## Configuration
Make sure to set these environment variables in your .env file or your server configuration. 
For example:

```dotenv
COOKIE_BASED_AUTH_USERNAME=johndoe
COOKIE_BASED_AUTH_PASSWORD=mypassword
```

## Contributing
Contributions are welcome! If you find any issues or want to add new features, please submit a pull request.

## License
This package is open-source software licensed under the MIT license.