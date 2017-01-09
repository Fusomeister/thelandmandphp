<?php

namespace App\Models;

use Database\Model;
use DB;

class Account extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'Id';
    
    public function GetUserInfo($username)
    {
        return DB::table('users')->where('UserName', $username)->first();
        //return $this->all();      
    }
    
    public function getHash($username)
    {
        $data = DB::table('users')->where('UserName', $username)
                ->pluck('PasswordHash');
        
        return $data;
    }
    
    public function IsAdmin($username)
    {
        $data = DB::table('users')->where('UserName', $username)
                ->pluck('IsAdmin');
        
        return $data;
    }

    public function getId($username)
    {
        $data = DB::table('users')->where('UserName', $username)
                ->pluck('PK_UserId');
        return $data;
    }
    
    public function IsUsernameTaken($username)
    {
        $data = DB::table('users')->where('UserName', $username)->first();
        
        if($data == null)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
    
    public function AddUser($postUser)
    {
        DB::table('users')->insert($postUser);
    }
    
    public function CheckEmail($username)
    {
        $data = DB::table('users')->where('UserName', $username)
                ->pluck('Email');
        return $data;
    }
    
    public function UpdateEmail($username, $newEmail)
    {
        $data = DB::table('users')->where('UserName', $username)
                ->update($newEmail);
    }
    
    public function CheckPassword($username)
    {
        $data = DB::table('users')->where('UserName', $username)
                ->pluck('PasswordHash');
        return $data;
    }
    
    public function UpdatePassword($username, $newPassword)
    {
        $data = DB::table('users')->where('UserName', $username)
                ->update($newPassword);
    }
}
