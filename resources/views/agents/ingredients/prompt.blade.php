@php /** @var \App\ValueObjects\Agent\MealRequestContext $context */ @endphp

📍 **Contesto del pasto**
- **Zona geografica:** {{ __('agents.zone.' . $context->cookingContext->zone) }} (Regione: {{ $context->metadata->region }})
- **Orario locale:** {{ $context->metadata->time }} ({{ $context->metadata->timezone }})
- **Stagione stimata:** {{ now($context->metadata->timezone)->format('F') }}
- **Tipo di pasto**: {{ __('agents.meal_type.' . strtolower($context->metadata->mealType->name)) }}
- La lista non deve contenere più di 10–15 ingredienti.
- Seleziona ingredienti adatti al tipo di pasto (es. evita carne rossa per la colazione).
- Privilegia alimenti con buon profilo nutrizionale e adatti alla fascia d’età indicata.
- Ogni ingrediente deve essere facilmente reperibile in {{ __('agents.zone.' . $context->cookingContext->zone) }} e coerente con la stagione attuale.

👪 **Preferenze familiari**
- Preferenza del genitore: {{ __('agents.preference.' . $context->cookingContext->preference) }}
- Esperienza in cucina: {{ __('agents.experience.' . $context->cookingContext->experience) }}
- Tempo disponibile: {{ __('agents.time.' . $context->cookingContext->time) }}

@if($context->cookingContext->experience === 'junior' || $context->cookingContext->time === 'no_time')
- Puoi includere anche prodotti già pronti se più comodi da usare (es. purea di patate precotta).
@else
- Prediligi ingredienti da preparare manualmente, lasciando flessibilità nella trasformazione (es. patate da lessare per una purea).
@endif

📋 **Regole da rispettare**
@include('agents.includes.nutrition-rules', ['userProfile' => $context->userProfile])

📌 **Struttura del response**
Genera **esclusivamente** un array JSON conforme allo schema fornito.
Non includere commenti, spiegazioni o testo fuori dallo schema.
Ogni oggetto ingrediente deve contenere:

- `lang`: con le etichette localizzate in italiano (`it`) e inglese (`en`)
- `quantity`: con la quantità localizzata in italiano (`it`) e inglese (`en`)
