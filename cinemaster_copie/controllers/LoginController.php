<?php

require_once '../model/account.php';

class LoginController{
    
    public function LoginIn(){
      
        session_start();
        
        if(isset($_POST['email'])){
            $data=array(
                'email'=>$_POST['email'],
                'motpass'=>$_POST['pass']
            );
            $loginProfile = account::LoginIn($data);
            if($loginProfile== 'ok'){
                $_SESSION["loginError"] = null;
                $url = '../view/profile.php';
                header('Location:'.$url);
            }
            else{
                $_SESSION["loginError"] = $loginProfile;
            }


        }
    }

}
?>