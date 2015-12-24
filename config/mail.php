<?php

return [

    'driver' => 'smtp',
    'host' => 'smtp.gmail.com',
    'port' => 587,
    'from' => array('address' => 'myanmarmusicart@gmail.com', 'name' => 'Myanmar Music Art'),
    'encryption' => 'tls',
    'username' => 'myanmarmusicart@gmail.com',
    'password' => 'haytharthaw12345!@#$%',
    'sendmail' => '/usr/sbin/sendmail -bs',
    'pretend' => false,

];
