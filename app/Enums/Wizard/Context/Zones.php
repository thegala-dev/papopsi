<?php

namespace App\Enums\Wizard\Context;

use App\Enums\Wizard\Concerns\HasLocalization;

enum Zones
{
    use HasLocalization;

    case CITY;
    case TOWN;
    case COUNTRY;
}
