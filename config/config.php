<?php

    $config = array();

    //Config for SmtpTransport
    $config['host'] = 'smtp.gmail.com';
    $config['port'] = 587;
    $config['user_name'] = 'samokish.viktoria@gmail.com';
    $config['password'] = '***';
    $config['encryption'] = 'tls';

    //sender
    $config['name'] = 'Fitonia';
    $config['email'] = 'samokish.viktoria@gmail.com';

    //site info
    $config['site_name'] = 'Fitonia';
    $config['home_url'] = 'http://localhost/';

    return $config;
