@php /** @var \App\ValueObjects\Agent\MealRequestContext $context */ @endphp

📍 **Contesto del pasto**
- Zona geografica: {{ __('agents.zone.' . $context->cookingContext->zone) }} (Regione: {{ $context->metadata->region }})
- Orario locale: {{ $context->metadata->time }} ({{ $context->metadata->timezone }})
- Stagione stimata: {{ now($context->metadata->timezone)->format('F') }}
- Tipo di pasto: {{ __('agents.meal_type.' . strtolower($context->metadata->mealType->name)) }}
- La lista non deve contenere più di 10–15 ingredienti.
- Scegli ingredienti coerenti con il tipo di pasto (es. evita carne rossa a colazione).
- Privilegia ingredienti nutrienti, locali e stagionali.

👪 **Preferenze familiari**
- Preferenza del genitore: {{ __('agents.preference.' . $context->cookingContext->preference) }}
- Esperienza in cucina: {{ __('agents.experience.' . $context->cookingContext->experience) }}
- Tempo disponibile: {{ __('agents.time.' . $context->cookingContext->time) }}

@if($context->cookingContext->experience === 'junior' || $context->cookingContext->time === 'no_time')
    - Puoi includere anche prodotti già pronti se più comodi (es. purea di patate precotta).
@else
    - Prediligi ingredienti da preparare manualmente (es. patate da lessare per purea).
@endif

📋 **Regole da rispettare**
@include('agents.includes.nutrition-rules', ['userProfile' => $context->userProfile])
