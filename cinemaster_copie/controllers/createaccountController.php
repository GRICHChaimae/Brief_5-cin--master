
<?php 

    require_once '../model/account.php';

    class CreateAccountController{

        public function addAccount(){
            if(isset($_POST['submit'])){
                if($_POST['pass'] != $_POST['validation']){
                    return false;
                }else $result = account::addaccount();
                if($result === 'ok'){
                    header("location:login.php");
                }else{
                    echo $result;  
            }
        }
        return true;
        }
    }


?>
























class Add_Post{
    
    public function AddPost(){

        if(isset($_POST['submit'])){
            $result = NewPost::AddPost();
            if($result === 'ok'){
                header("location:profile.php");
            }else{
                echo $result;  
            }
        }
        }
}   

   

?>

