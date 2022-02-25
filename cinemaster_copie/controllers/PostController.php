
<?php 

require_once '../model/Post.php';

class PostController{

public function AddPost(){

    if(isset($_POST['submit'])){
        $result = Post::AddPost();
        if($result === 'ok'){
            header("location:profile.php");
        }else{

            // a changer par une variable session pour afficher une popup pour l utilusateur pour luii informer que le poste n est pas inserer
            echo $result;  
        }
    }
}

public function getAllPosts(){
    $Posts = Post::getAll();
    return $Posts;
}

public function getOnePost($id){
 
    $post = Post::getPost($id);
    return $post;
}


public function UpdatePost(){
    if(isset($_POST['submit'])){
        $result = Post::Update();
        if($result === 'ok'){
            header('location:profile.php');
        }else{
            echo $result;  
        }
    }
}

public function deletePost(){
    if(isset($_POST['deletePost'])){
        $id = $_POST['id'];
        $result = Post::deletePost($id);
        if($result === 'ok'){
            header('location:profile.php');
        }else{
            echo $result;  
        }
    }
}

}   

?>