<?php

namespace App\Controllers;

use Src\Controller;

class SiteController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index', ['framework' => 'hooray']);
    }
}
