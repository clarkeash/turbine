<?php

namespace Clarkeash\Turbine\Concerns;
use Symfony\Component\Process\Process;
use function Laravel\Prompts\info;

trait SetupFlux
{
    use InteractsWithComposer;

    public function setupFlux()
    {
        if (!$this->hasComposerPackage('livewire/flux-pro')) {
            info('Installing Flux Pro');
            if (!$this->fluxAuthIsConfigured()) {
                $this->call('flux:activate');
            } else {
                $process = new Process(['composer', 'config', 'repositories.flux-pro', 'composer', 'https://composer.fluxui.dev']);
                $process->run();

                $process = new Process(['composer', 'require', 'livewire/flux-pro']);
                $process->run();
            }
        }
    }
}