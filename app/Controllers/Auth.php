<?php

namespace App\Controllers;

use App\Models\UserModel;
use Twilio\Rest\Client;
use SendGrid\Mail\Mail;

class Auth extends BaseController
{

  function __construct()
  {
    $this->session = \Config\Services::session();
    $this->session->start();
    helper(['url', 'form']); 
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

  public function sendemail()
  {
    return view('sendemail');
  }

  public function save()
  {
    $validation =  \Config\Services::validation();
    $rules=[
      'name'=>'required',
      'email'=>'required|valid_email|is_unique[users.email]',
      'mobile'=>'required|min_length[10]',
      'password'=>'required|min_length[5]',
      'confirm_password'=>'required|min_length[5]|matches[password]'
    ];
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
    $validation =  \Config\Services::validation();
    $rules=[
      'email'=>'required|valid_email'
    ];
    if($this->validate($rules)){
      $model = new UserModel();
      $uemail = $this->request->getVar('email');
      $user = $model->where('email', $uemail)->first();
      if(!empty($user)){
        $code = $this->generateResetCode();
        $model->where('email', $uemail)->set(['password_reset' => $code])->update();
        $link = base_url()."/reset-password/".$code;
        $msg = "Please click the link below to reset your password.\n\n".$link;
        $email = new \SendGrid\Mail\Mail(); 
        $email->setFrom(getEnv('SG_FROM'), "Reviewers Admin");
        $email->setSubject("Reset Reviewers Password");
        $email->addTo($uemail);
        $email->addContent("text/plain", $msg);
        $email->addContent("text/html", $msg);
        $sendgrid = new \SendGrid(getEnv('SG_KEY'));
        try {
          $response = $sendgrid->send($email);
        } catch (Exception $e) {
          echo 'Caught exception: '. $e->getMessage() ."\n";
        }
        $this->session->setFlashdata('message', 'Password reset email sent to '.$uemail);
        return view('forgotpassword', ['validation'=> $validation]);
      }else{
        $this->session->setFlashdata('message', 'Invalid email');
        return redirect()->to('/forgotpassword');
      }
    }else{
      return view('forgotpassword', ['validation'=> $validation]);
    }
  }

  public function processsendemail()
  {
      
  }

  public function checkreviews(){
    $pn = '+94704170948';
    $msg = 'Your business received a new Positive review';
    $this->sendsms($pn, $msg);
  }

  private function sendsms($pn, $msg){
    $account_sid = getEnv('TW_SID');
    $auth_token = getEnv('TW_SECRET');
    $twilio_number = getEnv('TW_PHONE');
    $client = new \Twilio\Rest\Client($account_sid, $auth_token);
    $client->messages->create(
        $pn,
        array(
            'from' => $twilio_number,
            'body' => $msg
        )
    );
  }

  private function generateResetCode(
    int $length = 64,
    string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
  ): string {
    if ($length < 1) {
      throw new \RangeException("Length must be a positive integer");
    }
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
      $pieces []= $keyspace[random_int(0, $max)];
    }
    return implode('', $pieces);
  }
}