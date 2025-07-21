<?php

namespace App\Enums\Wizard\Context;

use App\Enums\Wizard\Concerns\HasLocalization;

enum Preferences
{
    use HasLocalization;

    case FAST_MEAL;
    case SIMPLE_MEAL;
    case CUSTOM_MEAL;
}
