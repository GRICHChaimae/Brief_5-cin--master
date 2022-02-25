<?php 

require_once '../model/Comment.php';

class CommentController{

    
public function getAllComments(){
    $id = $_POST['id'];
    $comments = Comment::getAll($id);
    return $comments;
}

public function AddComment(){
//     die("izeifu");
//     $comment = $_POST['comment'];
//     $post_id = $_POST['post_id'];
//     $account_id = $_SESSION["user_id"];
//     $comments = Comment::addComment($comment,$post_id,$account_id);
//     return $comments;
    
// }

        if(isset($_POST['submit'])){
            $result = Comment:: AddComment();
            if($result === 'ok'){
                header("location:profile.php");
            }else{
            // a changer par une variable session pour afficher une popup pour l utilusateur pour luii informer que le poste n est pas inserer
                echo $result;  
            }
        }
}

}

?>