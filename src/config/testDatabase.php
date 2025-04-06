<?php

return [
      
      'pdo_testing' => [
            'type' => 'mysql',
            'host' => 'localhost',
            'database' => 'bug_tracker',
            'username' => 'root',
            'password' => '',
      ],

      'web_config_testing' => [
            '/' => [
                  'target' => 'Home@index',
                  'methode' => 'post',
                  'middleware' => null
            ]
      ]
];
