<?php
/**
 * Welcome controller
 *
 * @author David Carr - dave@novaframework.com
 * @version 3.0
 */

namespace App\Controllers;

use App\Core\Controller;

use View;

class Om extends \App\Core\Controller
{
    public function index()
    {
        return View::make('Om/index')
                ->shares('title', 'Om');
    }
}