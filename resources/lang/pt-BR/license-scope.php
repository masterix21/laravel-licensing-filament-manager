<?php

return [
    'form' => ['basic_information' => 'Informações Básicas', 'default_license_settings' => 'Configurações Padrão de Licença', 'default_license_settings_description' => 'Valores padrão para licenças criadas neste escopo', 'key_rotation_settings' => 'Configurações de Rotação de Chaves', 'key_rotation_settings_description' => 'Configuração de rotação automática de chaves de assinatura', 'metadata' => 'Metadados'],
    'fields' => ['name' => 'Nome', 'slug' => 'Slug', 'slug_help' => 'Identificador amigável para URL (apenas letras minúsculas, números e hífens)', 'identifier' => 'Identificador', 'identifier_help' => 'Identificador único para uso na API (ex.: com.empresa.produto)', 'description' => 'Descrição', 'is_active' => 'Ativo', 'default_max_usages' => 'Máximo de Usos Padrão', 'default_duration_days' => 'Duração Padrão', 'default_duration_days_help' => 'Deixe vazio para licenças perpétuas', 'default_grace_days' => 'Período de Carência Padrão', 'key_rotation_days' => 'Intervalo de Rotação de Chaves', 'key_rotation_days_help' => 'Defina como 0 para desativar a rotação automática', 'last_key_rotation_at' => 'Última Rotação de Chaves', 'next_key_rotation_at' => 'Próxima Rotação Agendada', 'licenses_count' => 'Total de Licenças', 'active_licenses_count' => 'Licenças Ativas', 'meta' => 'Metadados Adicionais'],
    'actions' => ['create' => 'Novo Escopo de Licença', 'rotate_keys' => 'Rotacionar Chaves', 'rotate_keys_modal_heading' => 'Rotacionar Chaves de Assinatura', 'rotate_keys_modal_description' => 'Isto revogará as chaves ativas atuais e gerará novas. Esta ação não pode ser desfeita.', 'manual_rotation' => 'Rotação manual'],
    'filters' => ['needs_rotation' => 'Necessita Rotação de Chaves', 'has_licenses' => 'Possui Licenças'],
    'notifications' => ['created' => 'Escopo de Licença criado com sucesso.', 'updated' => 'Escopo de Licença atualizado com sucesso.'],
    'relations' => ['licenses' => 'Licenças', 'signing_keys' => 'Chaves de Assinatura'],
    'perpetual' => 'Perpétua',
    'unlimited' => 'Ilimitado',
    'seats' => 'assentos',
    'days' => 'dias',
    'none' => 'Nenhum',
    'rotation_days' => ':days dias', 'disabled' => 'Desativado',
];
