<div class="cart__wrapper">
<section class="cart">
<h1 class="cart__title">Gegevens</h1>
<?php $aantalActiviteiten = 0;
        foreach($_SESSION['cart'] as $activiteit){
            $aantalActiviteiten ++;
        } ?>
<p class="cart__subtitle">Je schrijft je in voor <?php echo $aantalActiviteiten; ?> <?php if($aantalActiviteiten == 1){echo "activiteit";}else{echo "activiteiten";} ?>.</p>
</section>
<aside class="cart__progress">
    <h2 class="hidden">progress</h2>
    <div class="progress__part">
    <img class="progress__notactive" src="./assets/img/betaling1.png" alt="1" width="23" height="28">
    <p>inschrijvingen</p>
    </div>
    <div class="progress__part">
    <img  src="./assets/img/betaling2.png" width="58" height="55" alt="2" >
    <p>gegevens</p>
    </div>
    <div class="progress__part">
    <img class="progress__notactive" src="./assets/img/progress3.png" alt="3" width="30" height="27">
    <p>betaling</p>
    </div>
</aside>
</div>
<div class="betaling__wrapper">
<section class="betaling__herhaling">
    <h2 class="herhaling__title">winkelmandje</h2>
<?php $totaal = 0; ?>
<?php foreach($_SESSION['cart'] as $activiteit): ?>
<?php $subtotaal = $activiteit['activiteit']['prijs'] * $activiteit['hoeveelheid']; 
            $totaal += $subtotaal;?>
    <article class="herhaling__item">
        <p><?php echo $activiteit['hoeveelheid']?>x</p>
        <h3 class="herhaling__title--activiteit"><?php echo $activiteit['activiteit']['title']?></h3>
        <p><?php echo $subtotaal?> euro</p>
    </article>
<?php endforeach; ?>

    <p class="herhaling__totaal"><?php echo $totaal ?> euro</p>
</section>
<form class="gegevens__form" action="index.php?page=checkout" method="post" >
<span class="error"><?php if(!empty($errors['naam'])){ echo $errors['naam'];} ?></span>
    <label class="form__label form__label--eerst"> 
        <span>
        <span>naam</span>
        <span class="error"><?php if(!empty($errors['naam'])){ echo $errors['naam'];} ?></span>
        </span>
        <input placeholder="doe" type="text" name="naam" class="input" value="<?php if(!empty($_POST['naam'])){ echo $_POST['naam'];} ?>" required>
    </label>



    <label class="form__label">
        <span>
        <span>voornaam</span>
        <span class="error"><?php if(!empty($errors['voornaam'])){ echo $errors['voornaam'];} ?></span>
        </span>
        <input placeholder="john" type="text" name="voornaam" class="input" value="<?php if(!empty($_POST['voornaam'])){ echo $_POST['voornaam'];} ?>" required>
    </label >  



    <label class="form__label">
        <span>
        <span>email</span>
        <span class="error"><?php if(!empty($errors['email'])){ echo $errors['email'];} ?></span>
        </span>
        <input placeholder="john@johndoe.be" type="email" name="email" class="input" value="<?php if(!empty($_POST['email'])){ echo $_POST['email'];} ?>" required>
    </label>



    <input type="hidden" name="action" value="addOrder">

    <button type="submit" class="betalen__button" name="action" value="addOrder">betalen
        <img class="button__pijl button__pijl--betalen" src="./assets/img/pijl.svg" alt="pijl" width="86" height="40">
    </button>

</form>

</div>
