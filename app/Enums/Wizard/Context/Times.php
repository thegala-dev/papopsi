<?php

namespace App\Enums\Wizard\Context;

use App\Enums\Wizard\Concerns\HasLocalization;

enum Times
{
    use HasLocalization;

    case NO_TIME;
    case FEW_TIME;
    case ENOUGH_TIME;
}
