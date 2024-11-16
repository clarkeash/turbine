<?php

namespace Clarkeash\Turbine\Concerns;

use Illuminate\Support\Composer;
use Symfony\Component\Process\Process;

trait InteractsWithComposer
{
    /**
     * Determine if the given Composer package is installed.
     *
     * @param  string  $package
     * @return bool
     */
    protected function hasComposerPackage(string $package): bool
    {
        $packages = json_decode(file_get_contents(base_path('composer.json')), true);

        return array_key_exists($package, $packages['require'] ?? [])
            || array_key_exists($package, $packages['require-dev'] ?? []);
    }

    protected function fluxAuthIsConfigured(): bool
    {
        /** @var Composer $composer */
        $composer = app(Composer::class);
        $command = array_merge($composer->findComposer(), ['config', 'http-basic.composer.fluxui.dev.username']);

        $process = (new Process($command, base_path()))->setTimeout(null);

        $process->run();

        return $process->isSuccessful() && !empty(trim($process->getOutput()));
    }
}