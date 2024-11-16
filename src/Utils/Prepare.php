<?php

namespace Clarkeash\Turbine\Utils;

use Illuminate\Filesystem\Filesystem;

class Prepare
{
    public static function base()
    {
        // Copy Configs
        copy(__DIR__ . '/../../stubs/base/tailwind.config.js', base_path('tailwind.config.js'));
        copy(__DIR__ . '/../../stubs/base/postcss.config.js', base_path('postcss.config.js'));
        copy(__DIR__ . '/../../stubs/base/vite.config.js', base_path('vite.config.js'));

        // Copy app.css
        copy(__DIR__ . '/../../stubs/base/resources/css/app.css', resource_path('css/app.css'));

        // Livewire...
        (new Filesystem)->ensureDirectoryExists(app_path('Livewire'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../stubs/base/app/Livewire', app_path('Livewire'));

        // Views...
        (new Filesystem)->ensureDirectoryExists(resource_path('views'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../stubs/base/resources/views', resource_path('views'));

        // Models
        copy(__DIR__ . '/../../stubs/base/app/Models/User.php', app_path('Models/User.php'));

        // Routes...
        copy(__DIR__ . '/../../stubs/base/routes/web.php', base_path('routes/web.php'));
    }

    public static function teams()
    {
        // Enums
        (new Filesystem)->ensureDirectoryExists(app_path('Enums'));
        copy(__DIR__ . '/../../stubs/teams/app/Enums/Role.php', app_path('Enums/Role.php'));

        // Livewire...
        (new Filesystem)->ensureDirectoryExists(app_path('Livewire/Teams'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../stubs/teams/app/Livewire/Teams', app_path('Livewire/Teams'));

        // Views...
        (new Filesystem)->ensureDirectoryExists(resource_path('views/teams'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../stubs/teams/resources/views/teams', resource_path('views/teams'));
        copy(__DIR__ . '/../../stubs/teams/resources/views/components/navigation.blade.php', resource_path('views/components/navigation.blade.php'));

        // Migrations
        copy(__DIR__ . '/../../stubs/teams/database/migrations/0001_01_01_000000_create_teams_table.php', database_path('migrations/0001_01_01_000000_create_teams_table.php'));
        copy(__DIR__ . '/../../stubs/teams/database/migrations/0001_01_01_000001_create_users_table.php', database_path('migrations/0001_01_01_000001_create_users_table.php'));
        (new Filesystem)->delete(database_path('migrations/0001_01_01_000000_create_users_table.php'));

        if ((new Filesystem)->exists(database_path('migrations/0001_01_01_000001_create_cache_table.php'))) {
            rename(database_path('migrations/0001_01_01_000001_create_cache_table.php'), database_path('migrations/0001_01_01_000002_create_cache_table.php'));
        }

        if ((new Filesystem)->exists(database_path('migrations/0001_01_01_000002_create_jobs_table.php'))) {
            rename(database_path('migrations/0001_01_01_000002_create_jobs_table.php'), database_path('migrations/0001_01_01_000003_create_jobs_table.php'));
        }

        // Models
        copy(__DIR__ . '/../../stubs/teams/app/Models/Team.php', app_path('Models/Team.php'));
        copy(__DIR__ . '/../../stubs/teams/app/Models/User.php', app_path('Models/User.php'));

        // Factories
        copy(__DIR__ . '/../../stubs/teams/database/factories/TeamFactory.php', database_path('factories/TeamFactory.php'));
        copy(__DIR__ . '/../../stubs/teams/database/factories/UserFactory.php', database_path('factories/UserFactory.php'));

        // Overwrite Registration
        copy(__DIR__ . '/../../stubs/teams/app/Livewire/Auth/Register.php', app_path('Livewire/Auth/Register.php'));
        copy(__DIR__ . '/../../stubs/teams/resources/views/livewire/auth/register.blade.php', resource_path('views/livewire/auth/register.blade.php'));

        // Overwrite Routes
        copy(__DIR__ . '/../../stubs/teams/routes/web.php', base_path('routes/web.php'));

        // Pages & Components
        copy(__DIR__ . '/../../stubs/teams/app/Livewire/Pages/Settings/Team.php', app_path('Livewire/Pages/Settings/Team.php'));
        copy(__DIR__ . '/../../stubs/teams/resources/views/livewire/pages/settings/team.blade.php', resource_path('views/livewire/pages/settings/team.blade.php'));

        (new Filesystem)->ensureDirectoryExists(app_path('Livewire/Settings/Team'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../stubs/teams/app/Livewire/Settings/Team', app_path('Livewire/Settings/Team'));

        (new Filesystem)->ensureDirectoryExists(resource_path('views/livewire/settings/team'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../../stubs/teams/resources/views/livewire/settings/team', resource_path('views/livewire/settings/team'));



        // Add Invitations Model

        // Add Invitations Factory

        // Add Invitations Migration

        // Add Page to manage team members
    }
}