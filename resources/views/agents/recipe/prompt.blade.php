📌 **Genera un oggetto JSON conforme allo schema strutturato per la ricetta.**
Non aggiungere testo esterno.

📍 **Contesto del pasto**
- Zona: {{ __('agents.zone.' . $context->cookingContext->zone) }} ({{ $context->metadata->region }})
- Stagione stimata: {{ now($context->metadata->timezone)->format('F') }}
- Orario locale: {{ $context->metadata->time }} ({{ $context->metadata->timezone }})
- Tipo di pasto: {{ __('agents.meal_type.' . strtolower($context->metadata->mealType->name)) }}

👪 **Preferenze familiari**
- Preferenza del genitore: {{ __('agents.preference.' . $context->cookingContext->preference) }}
- Esperienza in cucina: {{ __('agents.experience.' . $context->cookingContext->experience) }}
- Tempo disponibile: {{ __('agents.time.' . $context->cookingContext->time) }}

📥 **Ingredienti disponibili**
@foreach($context->ingredients as $ingredient)
    - {{ $ingredient->label }} ({{ $ingredient->quantity }})
@endforeach

🛠️ **Strumenti disponibili**
@foreach($context->tools as $tool)
    - {{ $tool->label }}@if($tool->optional) *(opzionale)*@endif: {{ $tool->notes }}
@endforeach

📋 **Linee guida per la generazione**
- Usa ingredienti e strumenti in modo selettivo: **non è necessario usarli tutti**.
- Semplifica la ricetta se l’utente ha poco tempo o poca esperienza.
- Se il tempo disponibile è "poco", limita a max 2 step veloci.
- Se il tempo è "medio", crea 3–4 step brevi.
- Se il tempo è "tutto il tempo necessario", puoi includere più passaggi.
- Gli step devono contenere solo gli ingredienti e strumenti effettivamente usati in quel passaggio.
- Calcola e indica il tempo per ogni step.
- La descrizione deve spiegare **perché questa ricetta è adatta** per il bambino in base a stagione, età e ingredienti.
- La proprietà "steps" deve essere un array, anche se contiene un solo passaggio.
