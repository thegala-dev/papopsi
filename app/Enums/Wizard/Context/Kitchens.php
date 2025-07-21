<?php

namespace App\Enums\Wizard\Context;

use App\Enums\Wizard\Concerns\HasLocalization;

enum Kitchens
{
    use HasLocalization;

    case SIMPLE_KITCHEN;
    case BASIC_KITCHEN;
    case GOOD_KITCHEN;
    case DELUXE_KITCHEN;
}
