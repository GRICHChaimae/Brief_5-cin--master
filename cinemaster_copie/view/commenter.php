<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="commenter.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Document</title>
</head>
<?php 
// session_start();
require_once '../controllers/PostController.php' ;
require_once '../controllers/CommentController.php' ;

if(isset($_POST['id'])){
  $exitPost = new PostController();
  $commentaire = new CommentController();
  $Post = $exitPost->getOnePost($_POST['id']);
  $comments = $commentaire->getAllComments();
 
}
else{
  header('location:profile.php');
}

if(isset($_POST['submit'])){
  $commentaire = new CommentController();
  $commentaire->AddComment();
}

?>
<body>
<div class="fixed_post">
        <h4><?php echo $Post['titre'] ?></h4>
        <p>
        <?php echo $Post['description_'] ?>
        </p>
        <img src="<?php echo $Post['photo'] ?>" alt="">
       
        <div class="d-flex">
          <form action="" method="post">
            <div id="pour_commenter">
            <input type="text" class="form-control" name="comment">
            <input type="hidden" value="<?php echo $Post['id'] ?>" name="post_id">
            <button  type="submit" name="submit" class="btn btn-primary  commentaire">Commenter</button>
            </div>
          </form>
        </div>

       <?php foreach($comments as $comment):?>
        <div>
            <span >
                <p class="fw-bold"><?php echo $comment['nom'] ?> <?php echo $comment['prenom']?> </p>
                <p><?php echo $comment['comment']?></p>
            </span>
        </div>
    <?php endforeach; ?>

    </div>
</body>
</html>
