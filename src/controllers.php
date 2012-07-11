<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Validator\Constraints as Assert;


$contactForm = $app['form.factory']->createBuilder('form')
    ->add('name', 'text', array(
        'label' => 'Nom',
        'constraints' => array(new Assert\NotBlank()),
    ))
    ->add('email', 'email', array(
        'label' => 'Email',
        'constraints' => new Assert\Email(),
    ))
    ->add('phone', 'text', array(
        'label' => 'Téléphone',
    ))
    ->add('message', 'textarea', array(
        'label' => 'Message',
        'required' => false,
    ))
    ->add('subject', 'hidden', array(
        'constraints' => array(new Assert\NotBlank()),
    ))
    ->getForm()
;

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
