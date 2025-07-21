<?php

namespace App\Enums\Wizard;

enum WizardSteps
{
    case INTRO;
    case AGE;
    case CONTEXT;
    case SUMMARY;
    case DETAILS;
}
