<?php

namespace App\Exceptions\Wizard;

use App\Enums\Support\ToastType;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class ToolsException extends WizardException
{
    public function __construct(?Collection $cta = null, ?Throwable $previous = null)
    {
        parent::__construct(
            toastType: ToastType::WARNING,
            title: 'Dove ho messo il frullatore?',
            message: 'Papopsi ha frugato ovunque… ma non riesce a trovare gli attrezzi giusti per cucinare questa pappa. Riprova o chiedici una mano!',
            cta: $cta,
            code: $previous?->getCode() ?: Response::HTTP_INTERNAL_SERVER_ERROR,
            previous: $previous
        );
    }
}
