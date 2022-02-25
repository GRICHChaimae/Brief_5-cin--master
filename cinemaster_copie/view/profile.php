<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="add_post.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
  
    <header>
      <a href="acceuil.html"><span class="ps-2 text-white fw-bold pt-4 fs-3" style="margin-left: 20PX; padding-top: 20px;">Ciné<span class="text-danger">Master</span></span></a>
      <nav>
      <div id="logout">
       <p>Bienvenue <?php session_start(); if(isset($_SESSION["userName"])){ echo ' '.$_SESSION["userName"];}?></p>
       <div>
      <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" href=""><img src="images/add_post.png" alt="">Ajouter un post</a>
      </div>
      <button>Se déconnecter</button>
      </div>
        
<!-- Modal -->
<?php 
    require_once '../controllers/PostController.php' ;
    require_once '../controllers/CommentController.php' ;
    if(isset($_POST['submit'])){
        $post= new PostController();
        $post->AddPost();

    }
    if(isset($_POST['deletePost'])){
      $post= new PostController();
      $post->deletePost();
    }
  

    $data = new PostController();
    $Posts = $data->getAllPosts();
?>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Ajouter un post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="post" enctype="multipart/form-data">
    <div>
    <div class="gr"><label>Titre</label>
        <input type="text" name="titre" placeholder="titre" id="title">
    </div>
    <div class="gr">
        <label>Description</label>
        <textarea  id="" name="description_"  placeholder="description"></textarea>
    </div>
        <div class="gr"><label> Ajouter une image </label>
        <input  type="file" name="photo">
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="submit">publier </button>
      </div>
    </div>
    </form>
  </div>
</div>
</div>
</div>
      </nav>
    </header>

    <div class="fixed_post">
        <h4>Peaky Blinders</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae reiciendis explicabo possimus accusantium eum eos, dignissimos iure ratione itaque, nemo, id dolor? In vel sapiente illum repudiandae, eos ad quae!</p>
        <img src="images/fixed_post.png" alt="">
        <div id="react">
        <div id="like">
          <img src="images/like.png" alt="">
          <img src="images/dislike.png" alt="">
        </div>
        <div id="commenter">
        <img src="images/commenter.png" alt="">
        <input type="submit" name="submit_comment" value="Commenter">
      </div>
        </div>

    </div>

    <div class="fixed_post">
        <h4>Peaky Blinders</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae reiciendis explicabo possimus accusantium eum eos, dignissimos iure ratione itaque, nemo, id dolor? In vel sapiente illum repudiandae, eos ad quae!</p>
        <img src="images/fixed_post.png" alt="">
        <div id="react">
        <div id="like">
          <img src="images/like.png" alt="">
          <img src="images/dislike.png" alt="">
        </div>
        <div id="commenter">
        <img src="images/commenter.png" alt="">


        <input type="submit" name="submit_comment" value="Commenter">
      </div>
        </div>

    </div>

    <?php foreach($Posts as $Value):?>
    <div class="fixed_post">
      <div class="post_header">
        <h4><?php echo $Value['titre'] ?></h4>
      <div class="modify">
      <?php if(isset($_SESSION["user_id"]) && ($Value['account_id'] == $_SESSION["user_id"])):?>
      <p>
      <form method="post" action="modify.php">
                        <input type="hidden" name="id" value="<?php echo $Value['id'] ?>">
                        <button type="submit" class="btn btn-success">modifier</button>
      </form>
    </p>
      <form action="" method="post">
      <input type="hidden" name="id" value="<?php echo $Value['id'] ?>">
        <button class="btn btn-outline-danger" type="submit" name="deletePost">Supprimer</button>
      </form>
      <?php endif ;?>
      </div>
      </div>
        <p><?php echo $Value['description_'] ?></p>
        <img src="<?php echo $Value['photo']?>" alt="">
        <div id="react">
        <div id="like">
          <img src="images/like.png" alt="">
          <img src="images/dislike.png" alt="">
        </div>
        <div id="commenter">
        <img src="images/commenter.png" alt="">
        <form method="post" action="commenter.php">
                        <input type="hidden" name="id" value="<?php echo $Value['id'] ?>">
                        <input type="submit" name="submit_comment" value="Commenter">
      </form>
      </div>
        </div>
  </div>
  <?php endforeach;?>

    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>