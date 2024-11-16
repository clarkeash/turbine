<?php

namespace Clarkeash\Turbine\Utils;

use Symfony\Component\Process\Process;
use function Laravel\Prompts\error;
use function Laravel\Prompts\note;

class Npm
{
    public static function make(): static
    {
        return new static();
    }

    /**
     * Determine if the given package is installed.
     *
     * @param string $package
     * @return bool
     */
    public static function hasPackage(string $package): bool
    {
        $packages = json_decode(file_get_contents(base_path('package.json')), true);

        return array_key_exists($package, $packages['dependencies'] ?? [])
            || array_key_exists($package, $packages['devDependencies'] ?? []);
    }

    public function install(): bool
    {
        return $this->installPackages([]);
    }

    public function installPackages(array $packages): bool
    {
        if (!empty($packages) && collect($packages)->filter(fn($package) => !static::hasPackage($package))->isEmpty()) {
            return true;
        }

        // Install NPM packages...
        $args = empty($packages) ? ['npm', 'install'] : array_merge(['npm', 'install', '-D'], $packages);
        $process = new Process($args);
        $process->run();

        if (!$process->isSuccessful()) {
            error('Failed to install packages');
            error($process->getErrorOutput());
            note('Try running: ' . implode(' ', $args));
            return false;
        }

        return true;
    }

    public function build()
    {
        // Build
        info('Building Assets');
        $process = new Process($args = ['npm', 'run', 'build']);
        $process->run();

        if (!$process->isSuccessful()) {
            error('Failed to build');
            error($process->getErrorOutput());
            note('Try running: ' . implode(' ', $args));
            return false;
        }

        return true;
    }
}