📌 **Genera un array JSON** di oggetti "strumento" conforme allo schema strutturato.
Non aggiungere testo o spiegazioni esterne.

📍 **Ingredienti selezionati**
@foreach($context->ingredients as $ingredient)
    - {{ $ingredient->label }}
@endforeach

📋 **Contesto del genitore**
- Esperienza: {{ __('agents.experience.' . $context->cookingContext->experience) }}
- Tempo disponibile: {{ __('agents.time.' . $context->cookingContext->time) }}

📋 **Fallback**
Se non sei sicuro, includi almeno un "strumento di base" come coltello, pentola o tagliere.
