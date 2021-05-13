<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.typekit.net/lla6uve.css">
  <link rel="stylesheet" href="./css/reset.css">
  <link rel="stylesheet" href="./css/style.css">
  <title>KnikCrew - <?php if(empty($_GET['page'])){
    echo 'home';
  }else{
    echo $_GET['page'];
  } ?></title>
</head>

<body>
  <header class="header">
    <nav class="nav">
    <ul class="nav__list">
      <li>
        <ul class="nav__list--part">
           <li class="nav__item "><a class="nav__link" href="index.php"><img src="./assets/img/logo.png" alt="logo" height="20" width="99"></a></li>
           <li class="nav__item "><a class="nav__link <?php if($_GET['page'] == "agenda"){echo "nav__link--active";} ?>" href="index.php?page=agenda">Activiteiten</a></li>
          <li class="nav__item "><a class="nav__link <?php if($_GET['page'] == "spelen"){echo "nav__link--active";} ?>" href="index.php?page=spelen">Hoe spelen</a></li>
        </ul>
      </li>
      <li class="nav__item nav__item--rechts <?php if($_GET['page'] == 'home'){ echo 'nav__cart--home';} ?>"><a class="nav__link nav__item--rechts nav__cart" href="index.php?page=cart"><img src="./assets/img/cart.svg" width="30" height="24" alt="cart"></a></li>
     </ul>
    </nav>
    
  </header>
 <main>
     <?php echo $content; ?>
</main>
  <footer class="footer">
    <a class="footer__logo" href="index.php"><img src="./assets/img/logo.png" alt="logo" height="20" width="99"></a>
    <ul class="footer__socials">
      <li class="socials__item"><a class="socials__link" href="#">twitter</a></li>
      <li class="socials__item"><a class="socials__link" href="#">facebook</a></li>
      <li class="socials__item"><a class="socials__link" href="#">instagram</a></li>
    </ul>
  </footer>
  <script src="js/script.js"></script>
  <script src="js/validate.js"></script>
</body>

</html>