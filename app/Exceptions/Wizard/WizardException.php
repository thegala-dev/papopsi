<?php

namespace App\Exceptions\Wizard;

use App\Enums\Support\ToastType;
use App\Exceptions\Contracts\WizardException as WizardExceptionContract;
use Illuminate\Support\Collection;
use Throwable;

abstract class WizardException extends \RuntimeException implements WizardExceptionContract
{
    private ToastType $toastType;

    private string $title;

    private ?Collection $cta;

    public function __construct(ToastType $toastType, string $title = '', string $message = '', ?Collection $cta = null, int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->toastType = $toastType;
        $this->title = $title;
        $this->cta = $cta;
    }

    public function toastType(): ToastType
    {
        return $this->toastType;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function cta(): ?Collection
    {
        return $this->cta;
    }
}
