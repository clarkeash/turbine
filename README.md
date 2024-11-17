<p align="center">
    <img alt="Turbine AI Generated Logo" src="/logo.png">
</p>

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
- Team Support
- Legal Pages
  - Privacy Policy (`/privacy`)
  - Terms of Service (`/terms`)

View the [screenshots](https://github.com/clarkeash/turbine/tree/main/screenshots)

## Team Support

We handle team support a little differently to things like laravel jetstream, we don't support users being on multiple teams, so we just have a `team_id` on the user table.
We support the following team features:

- Inviting users to a team
- Removing users from a team
- Editing the user details on a team
- Updating the team name
- We have team roles (admin, editor, viewer) which you can customise (see `app/Enums/Role`), we dont assign any permissions or checks for these roles.

## Screenshots
| | |
|:-------------------------:|:-------------------------:|
|<img src="screenshots/login.png?raw=true">|<img src="screenshots/register.png?raw=true">|
|<img src="screenshots/password-reset.png?raw=true">|<img src="screenshots/dashboard.png?raw=true">|
|<img src="screenshots/profile-settings.png?raw=true">|<img src="screenshots/team.png?raw=true">|

## Inspiration

 - [Laravel Breeze](https://github.com/laravel/breeze)
 - [Fission Starter Kit](https://github.com/joshcirre/fission) by Josh Cirre
