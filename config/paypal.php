<?php 
return [ 
    'client_id' => 'AWgVbjmbRoRKPCX_tA1s44UzGjGipGI07AMcvz3w9imor-5m-SFDAgpBELYcvhGPcakx8MHB9FV5kjGJ',
	'secret' => 'EBFCXFdwDQtzCCBjF3gv3U434_jiBf8plVMqnhPDkZFklBwLEpUEEyoLKei8BkxrFdcZVDJKbguIr1Zq',
    'settings' => array(
        'mode' => 'sandbox',
        'http.ConnectionTimeOut' => 1000,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'FINE'
    ),
];