<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html', array());
})
->bind('homepage')
;

$app->get('/ecommerce', function () use ($app) {
    return $app['twig']->render('ecommerce.html', array());
})
->bind('ecommerce')
;

$app->get('/mobile', function () use ($app) {
    return $app['twig']->render('mobile.html', array());
})
->bind('mobile')
;

$app->get('/emarketing', function () use ($app) {
    return $app['twig']->render('emarketing.html', array());
})
->bind('emarketing')
;


$app->error(function (\Exception $e, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    $page = 404 == $code ? '404.html' : '500.html';

    return new Response($app['twig']->render($page, array('code' => $code)), $code);
});
