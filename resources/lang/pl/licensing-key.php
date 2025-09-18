<?php

return [
    'fields' => [
        'kid' => 'ID klucza',
        'status' => 'Status',
        'algorithm' => 'Algorytm',
        'valid_from' => 'Ważny od',
        'valid_until' => 'Ważny do',
        'revoked_at' => 'Unieważniono',
        'revocation_reason' => 'Powód unieważnienia',
    ],

    'actions' => [
        'generate_new' => 'Wygeneruj nowy klucz',
        'generate_new_modal_heading' => 'Wygeneruj nowy klucz podpisywania',
        'generate_new_modal_description' => 'To utworzy nowy klucz podpisywania dla tego zakresu.',
        'revoke' => 'Unieważnij klucz',
        'revoke_modal_heading' => 'Unieważnij klucz podpisywania',
        'revoke_modal_description' => 'To trwale unieważni ten klucz podpisywania. Ta akcja nie może zostać cofnięta.',
        'revoke_selected' => 'Unieważnij zaznaczone klucze',
    ],

    'filters' => [
        'expired' => 'Wygasłe klucze',
    ],

    'notifications' => [
        'generated' => 'Klucz podpisywania został wygenerowany pomyślnie.',
        'generated_body' => 'Wydano nowy klucz podpisywania: :kid',
        'revoked' => 'Klucz podpisywania został unieważniony.',
        'failed' => 'Nie udało się wygenerować klucza podpisywania.',
    ],
];
