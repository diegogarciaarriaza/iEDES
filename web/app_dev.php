<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;

// If you don't want to setup permissions the proper way, just uncomment the following PHP line
// read http://symfony.com/doc/current/book/installation.html#configuration-and-setup for more information
umask(0002);

function netMatch ($CIDR,$IP) { 
    list ($net, $mask) = explode ('/', $CIDR); 
    return ( ip2long ($IP) & ~((1 << (32 - $mask)) - 1) ) == ip2long ($net); 
} 

// This check prevents access to debug front controllers that are deployed by accident to production servers.
// Feel free to remove this, extend it, or make something more sophisticated.
if (isset($_SERVER['HTTP_CLIENT_IP'])
    || isset($_SERVER['HTTP_X_FORWARDED_FOR'])
    || !(in_array(@$_SERVER['REMOTE_ADDR'], array('127.0.0.1', 'fe80::1', '::1'))
    || netMatch("192.168.0.24/32",@$_SERVER['REMOTE_ADDR'])
    || netMatch("192.168.0.24/24",@$_SERVER['REMOTE_ADDR'])
    || netMatch("185.56.180.49/32",@$_SERVER['REMOTE_ADDR'])
    || netMatch("185.56.180.49/24",@$_SERVER['REMOTE_ADDR']))
) {
    header('HTTP/1.0 403 Forbidden');
    exit('You are not allowed to access this file. Check '.basename(__FILE__).' for more information.');
}

$loader = require_once __DIR__.'/../app/bootstrap.php.cache';
Debug::enable();

require_once __DIR__.'/../app/AppKernel.php';

$kernel = new AppKernel('dev', true);
$kernel->loadClassCache();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);