<div class="cart__wrapper">
<section class="cart">
<h1 class="cart__title">Doe mee</h1>
<?php $aantalActiviteiten = 0;
        foreach($_SESSION['cart'] as $activiteit){
            $aantalActiviteiten ++;
        } ?>
<p class="cart__subtitle">Je hebt <?php echo $aantalActiviteiten; ?> <?php if($aantalActiviteiten == 1){echo "activiteit";}else{echo "activiteiten";} ?> toegevoegd.</p>
</section>
<aside class="cart__progress">
    <h2 class="hidden">progress</h2>
    <div class="progress__part">
    <img  src="./assets/img/progress1.png" alt="1" width="58" height="55">
    <p>inschrijvingen</p>
    </div>
    <div class="progress__part">
    <img class="progress__notactive" src="./assets/img/progress2.png" alt="2" width="32" height="23">
    <p>gegevens</p>
    </div>
    <div class="progress__part">
    <img class="progress__notactive" src="./assets/img/progress3.png" alt="3" width="30" height="27">
    <p>betaling</p>
    </div>
</aside>
</div>
<form action="index.php?page=cart" method="post">
    <h2 class="hidden">Activiteiten</h2>
    <div class="inschrijvingen__labels">
        <p class="labels__label--activiteit">activiteit</p>
        <p class="labels__label--aantal">aantal <br> personen</p>
        <p class="labels__label--prijs">prijs</p>
    </div>
<?php $totaal = 0;
if(empty($_SESSION['cart'])){echo '<p class="evenement__geen">Je hebt nog geen activiteiten toegevoegd.</p>';}?>
<p class="error "><?php if(!empty($_SESSION['error'])){ echo $_SESSION['error'];} ?></p>
<?php foreach($_SESSION['cart'] as $activiteit): ?>
    <?php $subtotaal = $activiteit['activiteit']['prijs'] * $activiteit['hoeveelheid']; 
            $totaal += $subtotaal;?>
    <article class="cart__item" id="<?php echo $activiteit['activiteit']['id']?>">
    <a class="cart__item--link evenement__link" href="index.php?page=detail&id=<?php echo $activiteit['activiteit']['id']?>">
        <img src="./assets/img/activiteiten/<?php echo $activiteit['activiteit']['img']?>.png" alt="<?php echo $activiteit['activiteit']['title']?>" <?php if($activiteit['activiteit']['id'] == 1){ echo 'width="155" height="202" class="cart__img--hoofd"'; }else{ echo 'width="202" height="155"';} ?>>
        <div class="item__info">
        <p class=" evenement__datum"><?php  if($activiteit['activiteit']['recuring']==0){ echo strftime( '%d %B %Y' ,strtotime($activiteit['activiteit']['datum']));}else{ echo $activiteit['activiteit']['datum']; } ?></p>
         <h3 class="subtitle__evenement"><?php echo $activiteit['activiteit']['title']?></h3>
        <p class="evenement__parameters"><?php echo $activiteit['activiteit']['niveau']?></p>
        </div>
        </a>
        <input type="hidden" name="activiteit_id" value="<?php echo $activiteit['activiteit']['id']; ?>">
        <input   class="item__aantal" type="number" min="0"  name="aantal[<?php echo $activiteit['activiteit']['id'];?>]" value="<?php echo $activiteit['hoeveelheid']?>" />
        
        <p class="item__price" data-prijs="<?php echo money_format("%i",$activiteit['activiteit']['prijs']) ?>"><?php echo numfmt_format_currency ( numfmt_create( 'nl_BE', NumberFormatter::CURRENCY ) , $totaal , "EUR" );?></p>
        <button class=" item__button" type="submit" value="<?php echo $activiteit['activiteit']['id'];?>" name="verwijder">x</button>
    </article>
<?php endforeach;?>
    <div class="cart__info">
    <button class='cart__update' type="submit" name="action" value="update">inschrijvingen bijwerken</button>
    <p>totaalprijs: <span class="totaal"><?php echo numfmt_format_currency ( numfmt_create( 'nl_BE', NumberFormatter::CURRENCY ) , $totaal , "EUR" );?></span></p>
    </div>
    <a class="cart__link" href="index.php?page=agenda">Ontdek meer activiteiten</a>
    <div class="button__wrapper">
    <button type="submit" class="betalen__button" name="action" value="gegevens">gegevens
        <img class="button__pijl button__pijl--betalen" src="./assets/img/pijl.svg" alt="pijl" width="86" height="40">
    </button>

        </div>
</form>
