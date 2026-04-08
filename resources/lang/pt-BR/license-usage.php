<?php

return [
    'fields' => [
        'usage_fingerprint' => 'Impressão Digital de Uso',
        'status' => 'Status',
        'client_type' => 'Tipo de Cliente',
        'name' => 'Nome',
        'ip' => 'Endereço IP',
        'user_agent' => 'User Agent',
        'registered_at' => 'Registrado em',
        'last_seen_at' => 'Último Acesso em',
        'revoked_at' => 'Revogado em',
    ],
    'actions' => [
        'revoke' => 'Revogar Uso',
        'revoke_selected' => 'Revogar Selecionados',
        'heartbeat' => 'Atualizar Heartbeat',
    ],
    'filters' => ['inactive' => 'Inativos (7+ dias)'],
    'help' => ['usage_fingerprint' => 'Geralmente um hash de identificadores do dispositivo ou da instalação.'],
    'notifications' => ['revoked' => 'Uso revogado com sucesso.'],
];
