<?php

namespace App\Enums\Wizard;

enum UserProfiles: string
{
    case AGE_6_12 = '6-12';
    case AGE_12_24 = '12-24';
    case AGE_24_36 = '24-36';
    case AGE_36_60 = '36-60';
    case AGE_60_144 = '60-144';
}
