<?php

return [
    'fields' => ['kid' => 'ID da Chave', 'status' => 'Status', 'algorithm' => 'Algoritmo', 'valid_from' => 'Válido Desde', 'valid_until' => 'Válido Até', 'revoked_at' => 'Revogado em', 'revocation_reason' => 'Motivo da Revogação'],
    'actions' => [
        'generate_new' => 'Gerar Nova Chave', 'generate_new_modal_heading' => 'Gerar Nova Chave de Assinatura',
        'generate_new_modal_description' => 'Isto criará uma nova chave de assinatura para este escopo.',
        'revoke' => 'Revogar Chave', 'revoke_modal_heading' => 'Revogar Chave de Assinatura',
        'revoke_modal_description' => 'Isto revogará permanentemente esta chave de assinatura. Esta ação não pode ser desfeita.',
        'revoke_selected' => 'Revogar Chaves Selecionadas',
    ],
    'filters' => ['expired' => 'Chaves Expiradas'],
    'notifications' => ['generated' => 'Chave de assinatura gerada com sucesso.', 'generated_body' => 'Nova chave de assinatura emitida: :kid', 'revoked' => 'Chave de assinatura revogada.', 'failed' => 'Não foi possível gerar a chave de assinatura.'],
];
