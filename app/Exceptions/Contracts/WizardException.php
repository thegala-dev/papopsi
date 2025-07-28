<?php

namespace App\Exceptions\Contracts;

use App\Enums\Support\ToastType;
use Illuminate\Support\Collection;

interface WizardException
{
    public function toastType(): ToastType;

    public function title(): string;

    public function cta(): ?Collection;
}
