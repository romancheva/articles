<?php

use App\Model\Article;
use Slim\Http\Request;
use Slim\Http\Response;

$app->get(
    '/{id}',
    function (Request $request, Response $response, $args) {
        $article = Article::query()->find($args['id']);

        return $this->view->render($response, 'article.html.twig', ['article' => $article]);
    }
);