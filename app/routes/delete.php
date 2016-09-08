<?php

use App\Model\Article;
use Slim\Http\Request;
use Slim\Http\Response;


$app->post(
    '/delete/{id}',
    function (Request $request, Response $response, $args) {
        Article::destroy($args['id']);

        return $response->withRedirect('/');
    }
);