- Evita miele, sale e zuccheri aggiunti per bambini sotto i 12 mesi.
- Usa solo ingredienti naturali e facilmente digeribili.
@if($userProfile->value < 12)
    - Evita alimenti con consistenze troppo dure o fibre insolubili.
@endif
@if($userProfile->value >= 12 && $userProfile->value < 24)
    - Puoi introdurre legumi e piccoli pezzi, se ben cotti.
@endif
