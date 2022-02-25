<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Document</title>
</head>

<?php 
    require_once '../controllers/createaccountController.php' ;
    $hasError = false;
    if(isset($_POST['submit'])){
        $newAccount= new CreateAccountController();
        $hasError = !$newAccount->addAccount();
    }
?>

<body>

<div id="boody">
    <header>
      <a href="acceuil.html"><span class="ps-2 text-white fw-bold pt-4 fs-3" >Ciné<span class="text-danger">Master</span></span></a>
      <nav>
        <ul>
          <li><a href="login.php"><button>Se connecter</button></a></li>
        </ul>
      </nav>
    </header>
    <form method="post" class="form">
        <div class="gr"><label>nom</label>
        <input type="text" name="nom" placeholder="Entrez votre nom" required></div>
        <div class="gr"><label>prenom</label>
        <input type="text" name="prenom" placeholder="Entrez votre prenom" required></div>
        <div class="gr"><label>email</label>
        <input type="email" name="email" placeholder="example@email.com" required></div>
        <div class="gr"><label>password</label>
        <input type="password" name="pass" placeholder="Le mot de pass" required></div>
        <div class="gr"> <label>valider password</label>
        <?php if($hasError): ?>
        <p id="alert">Le mot de passe inadapté</p>
        <?php endif; ?>
        <input type="password" name="validation" placeholder="Valide le mot de pass" required>
        <input id="inscription" type="submit" name="submit" value="S'inscrire">
        <br></div>
    </form>
  </div>



<div class="footer">
     <p>©2022 Ciné Master Terms of ServicePrivacy PolicyWorldwide</p>
     <div id="icones">
      <img src="images/insta.png" alt="" class="icone">
      <img src="images/twitter.png" alt="" class="icone">
      <img src="images/facebook.png" alt="" class="icone">
     </div>
    </div>
</body>
</html>