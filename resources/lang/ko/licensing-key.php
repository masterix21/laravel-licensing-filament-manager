<?php

return [
    'fields' => [
        'kid' => '키 ID',
        'status' => '상태',
        'algorithm' => '알고리즘',
        'valid_from' => '유효 시작일',
        'valid_until' => '유효 종료일',
        'revoked_at' => '해지일',
        'revocation_reason' => '해지 사유',
    ],
    'actions' => [
        'generate_new' => '새 키 생성',
        'generate_new_modal_heading' => '새 서명 키 생성',
        'generate_new_modal_description' => '이 범위에 대한 새 서명 키를 생성합니다.',
        'revoke' => '키 해지',
        'revoke_modal_heading' => '서명 키 해지',
        'revoke_modal_description' => '이 서명 키를 영구적으로 해지합니다. 이 작업은 되돌릴 수 없습니다.',
        'revoke_selected' => '선택한 키 해지',
    ],
    'filters' => [
        'expired' => '만료된 키',
    ],
    'notifications' => [
        'generated' => '서명 키가 성공적으로 생성되었습니다.',
        'generated_body' => '새 서명 키 발급: :kid',
        'revoked' => '서명 키가 해지되었습니다.',
        'failed' => '서명 키를 생성할 수 없습니다.',
    ],
];
