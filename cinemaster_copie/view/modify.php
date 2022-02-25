<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add_post.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<?php 

require_once '../controllers/PostController.php' ;

if(isset($_POST['id'])){
  $exitPost = new PostController();
  $Post = $exitPost->getOnePost($_POST['id']);
}
else{
  header('location:profile.php');
}
if(isset($_POST['submit'])){
  $post= new PostController();
  $post->UpdatePost();
}

?>
<div>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modifier</h5>
      </div>
      <div class="modal-body">
      <form  method="post" enctype="multipart/form-data">
        <input type="text" name="id" value="<?php echo $Post['id'] ?>" hidden>
    <div>
    <div class="gr"><label>Titre</label>
        <input type="text" name="titre" placeholder="titre"  value="<?php echo $Post['titre'] ?>">
    </div>
    <div class="gr">
        <label>Description</label>
        <input type="text" name="description_" value="<?php echo $Post['description_'] ?>">
    </div>
        <div class="gr"><label>L'image</label>
        <img src="<?php echo $Post['photo'] ?>" alt="">
        <input type="text" value="<?php echo $Post['photo'] ?>" name = "image" hidden>
        <input  type="file" name="photo" class="mt-3" >
        </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="submit">Modifier </button>
      </div>
    </div>
    </form>
  </div>
</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>