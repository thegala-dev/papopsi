<?php

namespace App\Enums\Wizard\Context;

use App\Enums\Wizard\Concerns\HasLocalization;

enum Experiences
{
    use HasLocalization;

    case JUNIOR;
    case MID;
    case SENIOR;
}
