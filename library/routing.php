<?php declare(strict_types=1);

$routing = array(
    '#\/(.*?)\/(.*?)\/(.*)#' => '/\1_\2/\3'
);

$default['controller'] = 'ranks';
$default['action'] = 'index';