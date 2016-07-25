<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylorotwell@gmail.com>
 */
/**
 *最开始原来的server代码 
 */
/*--------------------------------------------------------------------------------------
 
$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Laravel
// application without having installed a "real" web server software here.
if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
    return false;
}

require_once __DIR__.'/public/index.php';

------------------------------------------------------------------------------------------*/
include __DIR__.'\vendor\autoload.php';

use EasyWeChat\Foundation\Application;//最开始这个命名空间搞错了！！！！弄懂命名空间

$options = [
		'debug' => true,
		'app_id' => 'wx0ac62c581571bc61',
		'secret' => 'bf10f1132d778eeaaf50877536330768',
		'token' => 'easywechat',

		'log' => [
				'level' => 'debug',
				'file'  => 'D:\softWare\wamp\www\wechat\wechat.log',
		],

];

$app = new Application($options);

$app->server->setMessageHandler(function ($message) {
    return "您好！欢迎关注我!";
});

$response = $app->server->serve();

$response->send();