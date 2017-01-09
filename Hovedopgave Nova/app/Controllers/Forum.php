<?php

namespace App\Controllers;

use Core\View;
use Core\Controller;
use App\Models\Forum as ForumModel;

use Helpers\Session as OldSession;
use Session;
use Helpers\Password;
use Helpers\Url;
use Redirect;

class Forum extends \App\Core\Controller
{
    private $model;

    public function __construct()
    {
        parent::__construct();
        
        $this->model = new ForumModel;
    }
    
    public function index()
    {
        $getAllPosts = $this->model->TopicsAndUsers();
        
        return View::make('Forum/index')
                ->shares('title', 'Forum')
                ->withData($getAllPosts);
    }
    
    //POST
    public function createTopic()
    {
        $userId = OldSession::get('UserId');
        $title = $_POST['title'];
        $note = $_POST['note'];
    
        $newTopic = array(
            'FK_tUserId' => $userId,
            'Title' => $title,
            'Note' => $note
        );
        
        $this->model->addTopic($newTopic);
        return Redirect::back();
        
    }
    
    public function comments($id)
    {
        $getAnswers = $this->model->TopicsAndCommentsAndUsers($id);
        $getTopicOwner = $this->model->SelectedTopicAndUser($id);
         
        if($getAnswers == null)
        {
            $getAnswers = 0;
        }
        
        return View::make('Forum/comments')
                ->shares('title', $getTopicOwner[0]->Title)
                ->shares('username', $getTopicOwner[0]->UserName)
                ->shares('note', $getTopicOwner[0]->Note) 
                ->shares('id', $getAnswers[0]->PK_TopicId)
                ->withData($getAnswers);
    }
    
    public function CreateCommentPost($id)
    {
        $comment = $_POST['newComment'];
        $UserId = Session::get('UserId');
        $TopicId = $id;
        
        $newComment = array(
                    'FK_cUserId' => $UserId,
                    'FK_cTopicId' => $TopicId,
                    'Comment' => $comment
                );
        $this->model->AddComment($newComment);
        return Redirect::back();             
    }
    
    public function DeleteTopic($id)
    {
        if(oldSession::get('isAdmin') == 1)
        {
            $this->model->DeleteTopic($id);

            return Redirect::back();
        }
        else 
        {
            return Redirect::to('/');
        }
    }
    
    //TIL TESTING AF DB
    public function test()
    {
        $getThings = $this->model->TopicsAndCommentsAndUsers('1');      
        $getMore = $this->model->SelectedTopicAndUser('1');
        
        pr($getThings[0]);
        pr($getMore[0]);     
    }
}