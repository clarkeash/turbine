<?php

namespace Clarkeash\Turbine\Concerns;

trait InteractsWithNPM
{
    /**
     * Determine if the given Composer package is installed.
     *
     * @param string $package
     * @return bool
     */
    protected function hasNPMPackage(string $package): bool
    {
        $packages = json_decode(file_get_contents(base_path('package.json')), true);

        return array_key_exists($package, $packages['dependencies'] ?? [])
            || array_key_exists($package, $packages['devDependencies'] ?? []);
    }
}