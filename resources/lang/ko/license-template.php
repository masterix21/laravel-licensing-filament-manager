<?php

return [
    'fields' => [
        'scope' => '범위',
        'global' => '글로벌',
        'name' => '템플릿 이름',
        'slug' => 'Slug',
        'tier_level' => '등급',
        'parent_template' => '상위 템플릿',
        'is_active' => '활성',
        'supports_trial' => '체험판 지원',
        'trial_duration_days' => '체험 기간 (일)',
        'has_grace_period' => '유예 기간 있음',
        'grace_period_days' => '유예 기간 (일)',
        'license_duration_days' => '라이선스 기간 (일)',
        'default_max_usages' => '기본 최대 사용 횟수',
        'days' => ':count 일',
        'base_configuration' => '기본 설정',
        'features' => '기능',
        'entitlements' => '권한',
        'meta' => '메타데이터',
        'licenses_count' => '라이선스 수',
    ],
    'form' => [
        'details' => '템플릿 상세',
        'durations' => '기간 및 주기',
        'configuration' => '설정 및 기능',
        'metadata' => '메타데이터',
    ],
    'actions' => [
        'create' => '새 템플릿',
    ],
    'filters' => [
        'is_active' => '활성 템플릿만',
    ],
    'help' => [
        'license_duration_days' => '영구 라이선스의 경우 비워두세요',
        'trial_duration_days' => '체험 기간 일수',
        'grace_period_days' => '만료 후 유예 기간 일수',
        'base_configuration' => '라이선스 기본 설정에 병합되는 키/값 쌍 (예: max_usages, validity_days, grace_days).',
        'features' => '클라이언트에 노출되는 기능 토글을 위한 불리언 플래그.',
        'entitlements' => '숫자 또는 문자열 권한 (제한, 용량 등).',
        'default_max_usages' => '라이선스당 최대 동시 사용 수',
    ],
];
