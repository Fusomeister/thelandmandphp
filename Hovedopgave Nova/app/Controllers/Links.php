<?php

namespace App\Controllers;

use Core\View;
use Core\Controller;
use App\Models\Links as LinksModel;

use Helpers\Url;
use Redirect;

class Links extends \App\Core\Controller
{
    private $model;

    public function __construct()
    {
        parent::__construct();
        
        $this->model = new LinksModel;
    }
    
    public function index()
    {
        $getLinks = $this->model->getLinks();
        
        return View::make('Links/index')
                ->shares('title', 'Links')
                ->withData($getLinks);
    }
    
    //GET
    public function CreateLinks()
    {
        return View::make('Links/createLinks')
                ->shares('title', 'Tilføj et link');
    }
    
    public function CreateLinksPost()
    {
        $title = $_POST['title'];
        $url = 'http://'.$_POST['url'];
        $desc = $_POST['desc'];
        
        $newLink = array(
                    'Title' => $title,
                    'Url' => $url,
                    'UrlDesc' => $desc,
                );
        $this->model->addLink($newLink);
        
        return Redirect::to('/links');
    }
    
    public function DeleteLink($id)
    {
        $this->model->DeleteLink($id);
        return Redirect::back();
    }
    
    //GET
    public function EditLink($id)
    {
        $getLink = $this->model->GetLinkFromId($id);
        
        return View::make('Links/editLink')
                ->shares('title', 'Rediger link')
                ->withData($getLink);
    }
    
    //POST
    public function EditLinkPost($id)
    {
        $title = $_POST['title'];
        $url = 'http://'.$_POST['url'];
        $desc = $_POST['desc'];
        
        $newLink = array(
                    'Title' => $title,
                    'Url' => $url,
                    'UrlDesc' => $desc,
                );
        $this->model->UpdateLinks($id, $newLink);
        
        return Redirect::to('/links');
    }
}