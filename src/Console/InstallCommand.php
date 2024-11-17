<?php

namespace Clarkeash\Turbine\Console;

use Clarkeash\Turbine\Concerns\InteractsWithComposer;
use Clarkeash\Turbine\Concerns\SetupFlux;
use Clarkeash\Turbine\Utils\Npm;
use Clarkeash\Turbine\Utils\Prepare;
use Illuminate\Console\Command;
use Symfony\Component\Console\Attribute\AsCommand;
use function Laravel\Prompts\outro;

#[AsCommand(name: 'turbine:install')]
class InstallCommand extends Command
{
    use InteractsWithComposer, SetupFlux;
    protected bool $teams = false;
    protected $signature = 'turbine:install 
                            {--teams : Indicates if team support should be installed}';

    public function handle()
    {
        $this->teams = $this->option('teams');

        // Flux Setup
        $this->setupFlux();

        // Turbine Setup
        Prepare::base();

        if ($this->teams) {
            Prepare::teams();
        }

        // FrontEnd Setup
        $npm = Npm::make();
        $npm->install();
        $npm->installPackages(['tailwindcss', 'postcss', 'autoprefixer', '@tailwindcss/typography']);

        outro('Your Turbine starter kit is now ready!');
    }
}