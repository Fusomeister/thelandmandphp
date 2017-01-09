<?php

namespace App\Controllers;

use Core\View;
use Core\Controller;
use App\Models\Account as AccountModel;

use Session;
use Helpers\Session as OldSession;
use Helpers\Password;
use Helpers\Url;
use Redirect;

class Account extends \App\core\controller
{
    private $model;

    public function __construct()
    {
        parent::__construct();
        
        $this->model = new AccountModel;
    } 

    public function profile($username)
    {
        //så man ikke kan besøge andres profiler
        if(Session::get('Username') == $username)
        {
            $getUserInfo = $this->model->GetUserInfo($username);    

            //r($getUserInfo);

            return View::make('Account/profile')
                    ->shares('title', 'Profil')
                    ->withData($getUserInfo);
        }
        else
        {
            Url::redirect('/');
        }
    }

    public function register()
    {
        return View::make('Account/register')
                ->shares('title', 'Profil');
    }
    
    public function registerPost()
    {
        $username = $_POST['UserName'];
        $email = $_POST['Email'];
        $emailVerify = $_POST['emailVerify'];
        $password = $_POST['password'];
        $passwordVerify = $_POST['passwordVerify'];
        $isAdmin = $_POST['isAdmin'];
        
        $IsUsernameTaken = $this->model->IsUsernameTaken($username);

        if($IsUsernameTaken == null)
        {
            if($email === $emailVerify && $password === $passwordVerify)
            {
                $generateGUID = Account::getGUID();
                $hashPassword = Password::make($password);
                
                $postUser = array(
                    'PK_UserId' => $generateGUID,
                    'Email' => $email,
                    'PasswordHash' => $hashPassword,
                    'UserName' => $username,
                    'isAdmin' => $isAdmin
                );
                $this->model->AddUser($postUser);
                
                //sådan skriver du fejl beskeder til user
                $status = 'Brugernavn blev oprettet';
                return Redirect::to('/')->withStatus($status);
                //Url::redirect('/');
            }
            else
            {
                //sådan skriver du fejl beskeder til user
                $status = 'E-mail og/eller adgangskode matcher ikke';
                return Redirect::back()->withInput()->withStatus($status, 'danger');
                //Url::redirect('/forum');
            }
        }
        else
        {
            //sådan skriver du fejl beskeder til user
            $status = 'Brugernavnet er taget';
            return Redirect::back()->withInput()->withStatus($status, 'danger');
            //Url::redirect('/register');
        }
    }

    public function login()
    { 
        return View::make('Account/login')
                ->shares('title', 'Log ind');
    }
    
    public function loginPost()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $dbHash = $this->model->getHash($username);
        
        if(Password::verify($password, $dbHash) == false)
        {
            //sådan skriver du fejl beskeder til user
            $status = 'Brugernavn og adgangskode matcher ikke';
            return Redirect::back()->withInput()->withStatus($status, 'danger');
            //Url::redirect('/login');
        }
        else
        {
            
            OldSession::set('loggedin', true);
            OldSession::set('UserId', $this->model->getId($username));
            OldSession::set('Username', $username);
            OldSession::set('isAdmin', $this->model->IsAdmin($username));
            
            Url::redirect('/');
        }
    }
    
    public function logout()
    {
        OldSession::destroy('loggedin');
        OldSession::destroy('UserId');
        OldSession::destroy('Username');
        OldSession::destroy('isAdmin');
        
        Return redirect::to('/');
    }
    
    public function changeEmail()
    {
        return View::make('Account/changeEmail')
                ->shares('title', 'Skift e-mail');
    }
    
    public function changeEmailPost()
    {
        $oldEmail = $_POST['oldEmail'];
        $newEmail = $_POST['newEmail'];
        $username = Session::get('Username');
        
        $checkOldEmail = $this->model->CheckEmail($username);
        
        if($oldEmail == $checkOldEmail)
        {
            $newEmailArray = array(
                    'Email' => $newEmail
                );
            $this->model->UpdateEmail($username, $newEmailArray);
            Url::redirect('/profile/'.$username);
        }
        else
        {
            Url::redirect('/profile/'.$username);
        }
    }
    
    public function changePassword()
    {
        return View::make('Account/changePassword')
                ->shares('title', 'Skift Adgangskode');
    }
    
    public function changePasswordPost()
    {
        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST['newPassword'];
        $newPasswordRepeat = $_POST['newPasswordRepeat'];
        $username = Session::get('Username');
        
        $getOldPassword = $this->model->CheckPassword($username);
        
        if(Password::verify($oldPassword, $getOldPassword) == true)
        {
            if($newPassword === $newPasswordRepeat)
            {
                $hashPassword = Password::make($newPassword);
                
                $newPasswordArray = array(                    
                    'PasswordHash' => $hashPassword,
                );
                
                $this->model->UpdatePassword($username, $newPasswordArray);
                Url::redirect('/profile/'.$username);
            }
            else
            {
                //get out
                Url::redirect('/profile/'.$username);
            }
        }
        else
        {
            Url::redirect('/profile/'.$username);
        }
    }
    
    static private function getGUID()
    {
        if (function_exists('com_create_guid'))
        {
            return com_create_guid();
        }
        else
        {
            mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45);// "-"
            $uuid = chr(123)// "{"
                .substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12)
                .chr(125);// "}"
            return $uuid;
        }
    }
}