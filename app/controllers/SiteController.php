<?php

namespace App\Controllers;

use Src\Controller;
use App\Models\User;

class SiteController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index', ['framework' => 'hooray']);
    }
    
    public function actionDemo()
    {
        return $this->render('demo');
    }
}
