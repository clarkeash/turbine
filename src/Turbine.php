<?php

namespace Clarkeash\Turbine;

use Clarkeash\Turbine\Enums\Mode;

class Turbine
{
    protected Mode $mode = Mode::B2C;
    public static function withTeams(): static
    {
        $instance = new static;
        $instance->mode = Mode::B2B;

        return $instance;
    }

    public static function withoutTeams(): static
    {
        $instance = new static;
        $instance->mode = Mode::B2C;

        return $instance;
    }

    public function usesTeams(): bool
    {
        return $this->mode === Mode::B2B;
    }
}