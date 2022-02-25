<?php
 require_once 'db.php';

 class Comment{

    
    static public function getAll($id){
        $stmt = DB::connect()->prepare("SELECT c.*, a.nom, a.prenom from comment c, accounts a where c.account_id = a.id and post_id = $id");
        $stmt->execute();
        return $stmt->fetchAll();
        // $stmt->close();
    }

    static public function AddComment(){
        session_start();
        $comment = $_POST['comment'];
        $post_id = $_POST['post_id'];
        $account_id = $_SESSION["user_id"];
   
        $stmt = DB::connect()->prepare('INSERT INTO comment (comment,post_id,account_id) VALUES (:comment,:post_id,:account_id)');
        $executed = $stmt->execute(["comment"=> $comment,"post_id"=> $post_id,"account_id"=> $account_id]);
   
        if($executed){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt = null;

    }

 }

 ?>