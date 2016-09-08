<?php

use App\Model\Article;
use Slim\Http\Request;
use Slim\Http\Response;



$app->any(
    '/new',
    function (Request $request, Response $response) {
        $files = $request->getUploadedFiles();
        $file = null;
        if(!empty($files)){
            $file = file_get_contents($files['file']->file);
        }

        $params = $request->getParams();
        if(!empty($params)){
            Article::create(['name' => $params['name'], 'text' => $params['text']]);

            return $response->withRedirect('/');
        }

        return $this->view->render($response, 'new.html.twig', ['file' => $file]);
    }
);