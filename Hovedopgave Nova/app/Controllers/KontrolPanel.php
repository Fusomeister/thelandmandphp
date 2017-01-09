<?php

namespace App\Controllers;

use Core\View;
use Core\Controller;
use App\Models\Kontrolpanel as KontrolModel;

use Helpers\Session;
use Helpers\Password;
use Helpers\Url;
use Redirect;

class KontrolPanel extends \App\Core\Controller
{
    private $model;

    public function __construct()
    {
        parent::__construct();
        
        $this->model = new KontrolModel;
    }
    
    public function index()
    {
        if(Session::get('isAdmin') == 1)
        {
            return View::make('KontrolPanel/index')
                    ->shares('title', 'Dit kontrolpanel');
        }
        else
        {
            return redirect::to('/');
        }
    }
}