<?php

declare(strict_types=1);

namespace App\Entity;

enum Difficulty: string
{
    case EASY = 'Facile';
    case MEDIUM = 'Moyen';
    case HARD = 'Difficile';
}
