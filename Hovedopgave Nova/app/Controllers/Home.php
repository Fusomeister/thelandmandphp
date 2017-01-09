<?php
/**
 * Welcome controller
 *
 * @author David Carr - dave@novaframework.com
 * @version 3.0
 */

namespace App\Controllers;

use App\Core\Controller;
use Session;
use Helpers\Session as OldSession;
use Helpers\url;
use Redirect;

use View;

class Home extends \App\Core\Controller
{
    public function __construct()
    {
        parent::__construct();
        
        if(!OldSession::get('loggedin'))
        {
            Url::redirect('/login');         
        }
    }


    public function index()
    {
        return View::make('Home/index')
                ->shares('title', 'Home');
    }
}