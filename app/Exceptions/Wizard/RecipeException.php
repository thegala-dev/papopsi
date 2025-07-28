<?php

namespace App\Exceptions\Wizard;

use App\Enums\Support\ToastType;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class RecipeException extends WizardException
{
    public function __construct(?Collection $cta = null, ?Throwable $previous = null)
    {
        parent::__construct(
            toastType: ToastType::WARNING,
            title: 'Non tutte le ciambelle riescono col buco!',
            message: 'Abbiamo mescolato tutto con amore, ma qualcosa è andato storto nel preparare la ricetta. Riprova tra qualche minuto o scrivici: siamo qui per aiutarti!',
            cta: $cta,
            code: $previous?->getCode() ?: Response::HTTP_INTERNAL_SERVER_ERROR,
            previous: $previous
        );
    }
}
