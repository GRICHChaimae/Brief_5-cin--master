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
<?php 
    require_once '../controllers/PostController.php' ;
    if(isset($_POST['submit'])){
        $newAnimal= new PostController();
        $newAnimal->AddPost();
    }
?>
<body>

<div class="layer">
    <header>
      <a href="acceuil.html"><span class="ps-2 text-white fw-bold pt-4 fs-3" >Ciné<span class="text-danger">Master</span></span></a>
      <nav>
        <ul>
        <li><a href="profile.php"><img src="images/add_post.png" alt="">Publier</a></li>
        </ul>
      </nav>
    </header>

    <form action="" method="post" enctype="multipart/form-data">
    <div>
    <div class="gr"><label>Titre</label>
        <input type="text" name="titre" placeholder="titre" id="title">
    </div>
    <div class="gr">
        <label>Description</label>
        <textarea  id="" cols="43" rows="10" name="description_"  placeholder="description"></textarea>
    </div>
        <div class="gr"><label> Ajouter une image </label>
        <input  type="file" name="photo">
    </div>
        <button type="submit" name="submit">Publier</button>
    </div>
    </form>

    </div>
  
</body>
</html>
