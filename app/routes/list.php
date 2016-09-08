<?php

use App\Model\Article;
use Slim\Http\Request;
use Slim\Http\Response;

$app->get(
    '/',
    function (Request $request, Response $response) {
        $search = $request->getQueryParam('find_it');

        if(empty($search)){
            $results = Article::all();
        }else{
            $results = Article::query()
                ->where('text', 'LIKE', '%' .$search. '%')
                ->get();
        }

        return $this->view->render($response, 'list.html.twig', ['items' => $results]);
    }
);