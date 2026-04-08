<?php

return [
    'navigation_group' => 'Gerenciamento de Licenças',
    'resources' => [
        'license' => ['navigation_label' => 'Licenças', 'model_label' => 'Licença', 'plural_model_label' => 'Licenças'],
        'license_template' => ['navigation_label' => 'Modelos de Licença', 'model_label' => 'Modelo de Licença', 'plural_model_label' => 'Modelos de Licença'],
        'license_usage' => ['navigation_label' => 'Usos de Licença', 'model_label' => 'Uso de Licença', 'plural_model_label' => 'Usos de Licença'],
        'license_scope' => ['navigation_label' => 'Escopos de Licença', 'model_label' => 'Escopo de Licença', 'plural_model_label' => 'Escopos de Licença'],
    ],
    'pages' => ['statistics' => ['navigation_label' => 'Estatísticas de Licenciamento', 'title' => 'Estatísticas de Licenciamento']],
    'widgets' => [
        'stats' => [
            'total_licenses' => 'Total de Licenças', 'total_licenses_description' => 'Todas as licenças no sistema',
            'active_licenses' => 'Licenças Ativas', 'active_licenses_description' => 'Licenças atualmente ativas',
            'total_usages' => 'Total de Usos', 'total_usages_description' => 'Registros de uso de licença',
            'expiring_soon' => 'Expirando em Breve', 'expiring_soon_description' => 'Licenças ativas expirando nos próximos 30 dias',
            'license_templates' => 'Modelos de Licença', 'license_templates_description' => 'Modelos de licença ativos',
        ],
        'recent_usages' => ['heading' => 'Usos Recentes de Licença'],
        'expiring_licenses' => ['heading' => 'Licenças Expirando', 'empty_heading' => 'Nenhuma licença expirando', 'empty_description' => 'Não há licenças expirando nos próximos 30 dias.'],
    ],
    'fields' => [
        'license_key' => 'Chave de Licença', 'key' => 'Chave', 'scope' => 'Escopo', 'scope_id' => 'Escopo da Licença',
        'template' => 'Modelo de Licença', 'licensable_type' => 'Tipo Licenciável', 'licensable_id' => 'ID Licenciável',
        'expires_at' => 'Expira em', 'is_active' => 'Ativo', 'created_at' => 'Criado em', 'updated_at' => 'Atualizado em',
        'feature' => 'Funcionalidade', 'quantity' => 'Quantidade', 'used_at' => 'Usado em', 'days_remaining' => 'Dias Restantes',
        'device_id' => 'ID do Dispositivo', 'device_name' => 'Nome do Dispositivo', 'metadata' => 'Metadados',
        'activated_at' => 'Ativado em', 'deactivated_at' => 'Desativado em',
    ],
    'actions' => ['create' => 'Criar', 'edit' => 'Editar', 'view' => 'Visualizar', 'delete' => 'Excluir', 'deactivate' => 'Desativar'],
    'filters' => ['active' => 'Ativo', 'inactive' => 'Inativo', 'deactivated' => 'Desativado'],
];
