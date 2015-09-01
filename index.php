<?php
require 'vendor/autoload.php';
$app = new \Slim\Slim();
$app->response->headers->set('Content-Type', 'application/json');
$app->group('/v1', function () use ($app) {
    $app->get('/events', function () {
        echo "Hello, Events";
    });

    $app->get('/events/:id', function ($id) {
        $event = array('title' => 'ガーデニング講座　盆栽づくりに挑戦 ～山野草の根洗い～',
                       'image' => 'http://hakomachi.com/hakoeve/upload/event_images/1166/s_20150826095402_00001_original.jpg',
                       'dates' => '2015年 9月 2日 (水) 14時00分 ~',
                       'tag' => 'http://hakomachi.com/hakoeve/tags/search/?id=1&tagid%5B0%5D=25');
        echo json_encode($event, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
    });

    $app->get('/', function () {
        $ruby = array('ruby' => 'events');
        echo json_encode($ruby);
    });

    $app->get('/search', function () {
        $ruby = array('tag' => 'search');
        echo json_encode($ruby);
    });
});
$app->run();
?>