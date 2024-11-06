<?php

namespace Clarkeash\Turbine\Console;

use Clarkeash\Turbine\Concerns\InteractsWithComposer;
use Clarkeash\Turbine\Concerns\InteractsWithNPM;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Process\Process;
use function Laravel\Prompts\error;
use function Laravel\Prompts\note;
use function Laravel\Prompts\info;
use function Laravel\Prompts\outro;

#[AsCommand(name: 'turbine:install')]
class InstallCommand extends Command
{
    use InteractsWithComposer, InteractsWithNPM;

    // Future
    // Teams support
    // Pro - more jetstream features

    public function handle()
    {
        // Install Flux Pro
        if (!$this->hasComposerPackage('livewire/flux-pro')) {
            info('Installing Flux Pro');
            $this->call('flux:activate');
        }

        // Flux Setup
        $this->setupBackend();

        // Tailwind Setup
        if (!$this->setupFrontEnd()) {
            return;
        }

        outro('Your Turbine starter kit is now ready!');
    }

    public function setupFrontEnd(): bool
    {
        // Install standard NPM packages (vite etc)
        $process = new Process(['npm', 'install']);
        $process->run();

        if (!$process->isSuccessful()) {
            error('Failed to build');
            error($process->getErrorOutput());
            note('Try running: npm install');
            return false;
        }

        // Install Tailwind
        if (!$this->hasNPMPackage('tailwindcss')) {
            $args = [
                'npm', 'install', '-D', 'tailwindcss', 'postcss', 'autoprefixer'
            ];

            info('Installing Tailwind');
            $process = new Process($args);
            $process->run();

            if (!$process->isSuccessful()) {
                error('Failed to install Tailwind');
                error($process->getErrorOutput());
                note('Try running: ' . implode(' ', $args));
                return false;
            }
        }

        // Copy Configs
        copy(__DIR__ . '/../../stubs/tailwind.config.js', base_path('tailwind.config.js'));
        copy(__DIR__ . '/../../stubs/postcss.config.js', base_path('postcss.config.js'));
        copy(__DIR__ . '/../../stubs/vite.config.js', base_path('vite.config.js'));

        // Copy app.css
        copy(__DIR__ . '/../../stubs/resources/css/app.css', resource_path('css/app.css'));

        // Build
        info('Building Assets');
        $process = new Process(['npm', 'run', 'build']);
        $process->run();

        if (!$process->isSuccessful()) {
            error('Failed to build');
            error($process->getErrorOutput());
            note('Try running: npm run build');
            return false;
        }

        return true;
    }

    public function setupBackend()
    {
        // Livewire...
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Livewire'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/app/Http/Livewire', app_path('Http/Livewire'));

        // Views...
        (new Filesystem)->ensureDirectoryExists(resource_path('views'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/resources/views', resource_path('views'));

        // Routes...
        copy(__DIR__.'/../../stubs/routes/web.php', base_path('routes/web.php'));
    }
}