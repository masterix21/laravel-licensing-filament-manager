<?php

return [
    'navigation_group' => '라이선스 관리',
    'resources' => [
        'license' => [
            'navigation_label' => '라이선스',
            'model_label' => '라이선스',
            'plural_model_label' => '라이선스',
        ],
        'license_template' => [
            'navigation_label' => '라이선스 템플릿',
            'model_label' => '라이선스 템플릿',
            'plural_model_label' => '라이선스 템플릿',
        ],
        'license_usage' => [
            'navigation_label' => '라이선스 사용 내역',
            'model_label' => '라이선스 사용',
            'plural_model_label' => '라이선스 사용 내역',
        ],
        'license_scope' => [
            'navigation_label' => '라이선스 범위',
            'model_label' => '라이선스 범위',
            'plural_model_label' => '라이선스 범위',
        ],
    ],
    'pages' => [
        'statistics' => [
            'navigation_label' => '라이선스 통계',
            'title' => '라이선스 통계',
        ],
    ],
    'widgets' => [
        'stats' => [
            'total_licenses' => '전체 라이선스',
            'total_licenses_description' => '시스템 내 전체 라이선스',
            'active_licenses' => '활성 라이선스',
            'active_licenses_description' => '현재 활성 상태인 라이선스',
            'total_usages' => '전체 사용 횟수',
            'total_usages_description' => '라이선스 사용 기록',
            'expiring_soon' => '곧 만료',
            'expiring_soon_description' => '30일 이내 만료 예정인 활성 라이선스',
            'license_templates' => '라이선스 템플릿',
            'license_templates_description' => '활성 라이선스 템플릿',
        ],
        'recent_usages' => [
            'heading' => '최근 라이선스 사용',
        ],
        'expiring_licenses' => [
            'heading' => '만료 예정 라이선스',
            'empty_heading' => '만료 예정 라이선스 없음',
            'empty_description' => '30일 이내에 만료되는 라이선스가 없습니다.',
        ],
    ],
    'fields' => [
        'license_key' => '라이선스 키',
        'key' => '키',
        'scope' => '범위',
        'scope_id' => '라이선스 범위',
        'template' => '라이선스 템플릿',
        'licensable_type' => '라이선스 대상 유형',
        'licensable_id' => '라이선스 대상 ID',
        'expires_at' => '만료일',
        'is_active' => '활성 상태',
        'created_at' => '생성일',
        'updated_at' => '수정일',
        'feature' => '기능',
        'quantity' => '수량',
        'used_at' => '사용일',
        'days_remaining' => '남은 일수',
        'device_id' => '기기 ID',
        'device_name' => '기기 이름',
        'metadata' => '메타데이터',
        'activated_at' => '활성화일',
        'deactivated_at' => '비활성화일',
    ],
    'actions' => [
        'create' => '생성',
        'edit' => '편집',
        'view' => '보기',
        'delete' => '삭제',
        'deactivate' => '비활성화',
    ],
    'filters' => [
        'active' => '활성',
        'inactive' => '비활성',
        'deactivated' => '비활성화됨',
    ],
];
