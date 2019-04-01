<?php
// DIC configuration

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

// redis
$container['redis'] = function ($c) {
    $settings = $c->get('settings')['redis'];
    if (empty($settings['password'])) unset($settings['password']);
    return new Predis\Client($settings);
};

// jwt
$container['jwt'] = function ($c) {
    $settings = $c->get('settings')['jwt'];
    return new \Containers\JwtContainer($settings);
};

// cors
$container['cors'] = function ($c) {
    $settings = $c->get('settings')['cors'];
    return new Medz\Cors\Slim\Cors($settings);
};

// errorHandler
$container['errorHandler'] = function ($c) {
    return new \Handlers\Exception\CustomErrorHandler();
};

// phpErrorHandler
$container['phpErrorHandler'] = function ($c) {
    return new \Handlers\Exception\CustomPhpErrorHandler($c);
};

// notAllowedHandler
$container['notAllowedHandler'] = function ($c) {
    return new \Handlers\Exception\CustomNotAllowedHandler();
};

// notFoundHandler
$container['notFoundHandler'] = function ($c) {
    return new \Handlers\Exception\CustomNotFoundHandler();
};

// wechat-miniProgram
$container['wechatMiniProgram'] = function ($c) {
    $settings = $c->get('settings')['wechat'];
    return EasyWeChat\Factory::miniProgram($settings);
};