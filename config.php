<?php
$controllers = [
    'HomeController' => 'Home',
    'AboutController' => 'About',
    'ContactsController' => 'Contacts'
];
$config = [];
foreach ($controllers as $k => $v) {
    $handler = [
        'controller' => 'controllers\\' . $k,
        'method' => 'index'
    ];
    if ($v === 'Home') {
        $config['routes']['/'] = [
            'handler' => $handler // обработчик
        ];
        continue;
    }
    $config['routes']['/' . strtolower($v)] = [
        'handler' => $handler
    ];
}
//die(var_dump($config));
