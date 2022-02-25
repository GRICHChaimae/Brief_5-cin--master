<?php
 require_once 'db.php';
class Post{

    static public function AddPost(){
        session_start();
        if(isset($_SESSION["user_id"])){
            $titre = $_POST['titre'];
            $Descption = $_POST['description_'];
            //$photo = $_POST['photo'];
            $img= $_FILES['photo']['name'];
            //pour savoir la location de l image sur la machine
            $imgsrc= $_FILES['photo']['tmp_name'];
            $folderLocation = "images";
            $path="$folderLocation/".$img;

            //fonction predefine en php pour deplacer l image 
            move_uploaded_file($imgsrc,$path);
            $stmt = DB::connect()->prepare('INSERT INTO post (titre,description_,photo,account_id) VALUES (:titre,:description_,:photo,:account_id)');
            $executed = $stmt->execute(["titre"=> $titre,"description_"=> $Descption,"photo"=>$path,"account_id"=> $_SESSION["user_id"]]);
            if($executed){
                return 'ok';
            }else{
                return 'error';
            }
            $stmt = null;
        }
        else{
            echo "user id null";
        }
    }

    static public function getAll(){
        $stmt = DB::connect()->prepare('SELECT * FROM post');
        $stmt->execute();
        return $stmt->fetchAll();
        // $stmt->close();
        $stmt = null;
    }

    static public function getPost($id){
        try{
            // $query = 'SELECT * FROM post WHERE id = :id';
            $stmt = DB::connect()->prepare("SELECT * FROM post WHERE id = $id");
            $stmt->execute();
            $post = $stmt->fetch(PDO::FETCH_ASSOC);

            return $post;
        }catch(PDOexception $ex){
        echo 'erreur'.$ex->getMessage();
    }
}

static public function Update(){
    $titre = $_POST['titre'];
    $description_ = $_POST['description_'];
    //$photo = $_POST['photo'];
    $photo = $_FILES['photo']['name'];
    //pour savoir la location de l image sur la machine
    $imgsrc= $_FILES['photo']['tmp_name'];
    $folderLocation = "images";
    $path="$folderLocation/".$photo;
    //fonction predefine en php pour deplacer l image 
    move_uploaded_file($imgsrc,$path);
    $id = $_POST['id'];
    $image = $_POST['image'];


    $stmt = DB::connect()->prepare('UPDATE post SET titre = :titre , description_ = :description_ , photo = :photo WHERE id = :id');
    if(isset($photo) && !empty($photo)){
        $executed = $stmt->execute(["id"=> $id ,"titre"=> $titre ,"description_"=> $description_ ,"photo"=> $path]);
    }else{
        $executed = $stmt->execute(["id"=> $id ,"titre"=> $titre ,"description_"=> $description_ ,"photo"=> $image]);
    }
    if($executed){
        return 'ok';
    }else{
        return 'error';
    }
    $stmt = null;
    }
    static public function deletePost($id){
        $stmt = DB::connect()->prepare("DELETE from post where id = $id");
        $stmt->execute();
    }


}

?>