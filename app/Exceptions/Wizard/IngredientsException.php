<?php

namespace App\Exceptions\Wizard;

use App\Enums\Support\ToastType;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class IngredientsException extends WizardException
{
    public function __construct(?Collection $cta = null, ?Throwable $previous = null)
    {
        parent::__construct(
            toastType: ToastType::WARNING,
            title: 'Ingredienti fuori controllo!',
            message: 'Stavamo preparando la lista della spesa… ma uno degli ingredienti si è nascosto! Riprova o scrivici, che lo andiamo a stanare insieme.',
            cta: $cta,
            code: $previous?->getCode() ?: Response::HTTP_INTERNAL_SERVER_ERROR,
            previous: $previous
        );
    }
}
