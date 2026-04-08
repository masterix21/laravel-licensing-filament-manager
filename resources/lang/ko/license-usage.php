<?php

return [
    'fields' => [
        'usage_fingerprint' => '사용 지문',
        'status' => '상태',
        'client_type' => '클라이언트 유형',
        'name' => '이름',
        'ip' => 'IP 주소',
        'user_agent' => 'User Agent',
        'registered_at' => '등록일',
        'last_seen_at' => '마지막 접속일',
        'revoked_at' => '해지일',
    ],
    'actions' => [
        'revoke' => '사용 해지',
        'revoke_selected' => '선택 항목 해지',
        'heartbeat' => '하트비트 업데이트',
    ],
    'filters' => [
        'inactive' => '비활성 (7일 이상)',
    ],
    'help' => [
        'usage_fingerprint' => '일반적으로 기기 또는 설치 식별자의 해시값입니다.',
    ],
    'notifications' => [
        'revoked' => '사용이 성공적으로 해지되었습니다.',
    ],
];
