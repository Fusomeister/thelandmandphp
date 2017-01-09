<?php

namespace App\Models;

use Database\Model;
use DB;

class Forum extends Model
{
    protected $table = 'topics';
    protected $primaryKey = 'Id';
    
    public function getAllTopics()
    {
        $data = DB::table('topics')->get();
        
        return $data;
    }
    
    public function addTopic($newTopic)
    {
        $data = DB::table('topics')->insert($newTopic);
    }

    public function TopicsAndUsers()
    {
        $data = DB::table('topics')
                ->leftJoin('users', 'topics.FK_tUserId', '=', 'users.PK_UserId')
                ->get();
        
        return $data;
    }
    
    public function SelectedTopicAndUser($id)
    {
        $data = DB::table('topics')
                ->leftJoin('users', 'topics.FK_tUserId', '=', 'users.PK_UserId')
                ->where('topics.PK_TopicId', $id)
                ->select('users.UserName', 'topics.Title', 'topics.Note')
                ->get();
        
        return $data;
    }


    public function TopicsAndCommentsAndUsers($id)
    {
        $data = DB::table('topics')
                ->leftJoin('comments', 'topics.PK_TopicId', '=', 'comments.FK_cTopicId')
                ->leftJoin('users', 'comments.FK_cUserId', '=', 'users.PK_UserId')
                ->where('topics.PK_TopicId', $id)
                ->select('topics.PK_TopicId', 'topics.Title', 'topics.Note', 
                        'comments.PK_CommentId', 'comments.comment', 'users.UserName')
                ->get();
        
        return $data;
    }
    
    public function AddComment($newComment)
    {
        DB::table('comments')->insert($newComment);
    }
    
    public function DeleteTopic($id)
    {
        DB::table('topics')->where('PK_TopicId', $id)->delete();
    }
}