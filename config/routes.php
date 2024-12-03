<?php

return [
    '/' => ['AcceuilController', 'index'],
    '/sanctions' => ['AcceuilController', 'index'],
    '/sanctions/create' => ['ConnexionController', 'create'],
    '/sanctions/login' => ['ConnexionController', 'login'],
    '/sanctions/logout' => ['ConnexionController', 'logout'],
    '/legal' => ['MentionLegalController', 'legal'],
    '/promotions/create' => ['PromotionController', 'create']
];
