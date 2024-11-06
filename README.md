# Turbine

## Intro
Turbine is a starter kit for Laravel making use of [Livewire](https://livewire.laravel.com/) & [Flux](https://fluxui.dev/), you can think of it as laravel breeze for livewire.

> [!WARNING]
> A paid flux pro account is required to use turbine, we do not ship any flux components with this package.

## Installation

### Create new laravel application

Install with no starter kit etc, and run migrations.

```shell
laravel new my-app
```

Install turbine

```shell
composer require clarkeash/turbine
```

Run installation command

```shell
php artisan turbine:install
```

## Features

- Login
- Registration
- Password Reset
- Logout
- Starter Dashboard
- Profile Settings
  - Update name, email
  - Update password

 ## Inspiration

 - [Laravel Breeze](https://github.com/laravel/breeze)
 - [Fission Starter Kit](https://github.com/joshcirre/fission) by Josh Cirre
