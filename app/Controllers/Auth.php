<?php

namespace App\Controllers;

use App\Models\UserModel;


class Auth extends BaseController
{

  function __construct()
    {

        $this->session = \Config\Services::session();
        $this->session->start();
        helper(['url', 'form']); 
      //$facebook = new \Facebook\Facebook([
        //'app_id' => '519183953288920',
        //'app_secret' => '7aa7eed21479d1386deccaa44bce78b5',
        //'default_graph_version' => 'v2.3'
     // ]);
      //$fb_helper = $facebook->getRedirectLoginHelper();
    }


    

    public function register()
    {
      return view('register');
    }

    public function login()
    {
      return view('login');
    }

    public function forgotpassword()
    {
      return view('forgotpassword');
    }


    public function save()
    {

      $validation =  \Config\Services::validation();
      $rules=[
        'name'=>'required',
        'email'=>'required|valid_email|is_unique[users.email]',
        'mobile'=>'required|max_length[10]',
        'password'=>'required|min_length[5]',
        'confirm_password'=>'required|min_length[5]|matches[password]'
      ];

      
      helper(['form']);

      if($this->validate($rules)){
        $model = new UserModel();
            $newUser = [                    
                'name' => $this->request->getVar('name'), 
                'email' => $this->request->getVar('email'),
                'mobile' => $this->request->getVar('mobile'),
                'password' => md5($this->request->getVar('password'))
            ];
            $model->save( $newUser );
            $user = $model->where('email', $newUser['email'])->first();
            $this->session->set($user);
            return redirect()->to('/dashboard');
      }else{
        return view('register', ['validation'=> $validation]);

        
      }

    }




    public function auth()
    {
      $validation =  \Config\Services::validation();
      $rules=[
        'email'=>'required|valid_email',
        'password'=>'required|min_length[5]',
        
      ];

      if($this->validate($rules)){
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $user = $model->where('email', $email)->first();
        
        
        if(!empty($user) && $user['password'] == md5($password)){
          $this->session->set($user);
          return redirect()->to('/dashboard');

        }else{
      
    
          $this->session->setFlashdata('message', 'password invalid');
          return redirect()->to('/login');
        }
      }else{
        return view('login', ['validation'=> $validation]);
      }
    }




    

    public function editmyprofile()
    {

      $validation =  \Config\Services::validation();
      $rules=[
        'name'=>'required',
        'email'=>'required|valid_email|is_unique[users.email]',
        'mobile'=>'required|max_length[10]',
        'password'=>'required|min_length[5]',
        'confirm_password'=>'required|min_length[5]|matches[password]'
      ];

      
      helper(['form']);

      if($this->validate($rules)){
        $model = new UserModel();
            $newUser = [                    
                'name' => $this->request->getVar('name'), 
                'email' => $this->request->getVar('email'),
                'mobile' => $this->request->getVar('mobile'),
                'password' => md5($this->request->getVar('password'))
            ];
            $model->save( $newUser );
            $user = $model->where('email', $newUser['email'])->first();
            $this->session->set($user);
            
            return redirect()->to('/dashboard');
      }else{
        return view('register', ['validation'=> $validation]);

        
      }

    }





    


    public function logout()
    {
      $this->session->remove('user_id');
      return redirect()->to('/login');
    }


    public function processforgotpassword()
    {
      

    }


}


