<?php

return [
    '/' => ['AcceuilController', 'index'],
    '/sanctions' => ['AcceuilController', 'index'],
    '/sanctions/create' => ['ConnexionController', 'create'],
    '/sanctions/login' => ['ConnexionController', 'login'],
    '/legal' => ['MentionLegalController', 'legal']
];