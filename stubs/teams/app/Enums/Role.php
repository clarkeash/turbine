<?php

namespace App\Enums;

enum Role: string
{
    case Admin = 'admin';
    case Editor = 'editor';
    case Viewer = 'viewer';

    public function badgeColour(): string
    {
        return match ($this) {
            self::Admin => 'lime',
            self::Editor => 'amber',
            self::Viewer => 'teal',
        };
    }

    public function description(): string
    {
        return match ($this) {
            self::Admin => 'Admin users can perform any action.',
            self::Editor => 'Editor users have the ability to read, create, and update.',
            self::Viewer => 'Viewer users only have the ability to read. Create, and update are restricted.',
        };
    }
}
