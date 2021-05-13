<section class="agenda__titles">
    <h2 class="agenda__title">Agenda</h2>
    <img class="agenda__subtitle" src="./assets/img/saveTheDate.png" alt="Save the date" width="650" height="110">
</section>
<div class="agenda__wrapper">
<section class="agenda__evenementen">
    <h2 class="hidden">evenementen</h2>

<?php if(empty($activiteiten)){echo '<p class="evenement__geen">Er werden geen activiteiten gevonden.</p>';} ?>
<?php foreach($activiteiten as $activiteit):?>
    <?php if($activiteit['title'] == 'Knikker kampioen'): ?>
<a class="evenement__link" href="index.php?page=detail&id=<?php echo $activiteit['id'] ?>">
    <article class="agenda__evenement agenda__evenement--hoofd "  data-niveau="<?php echo $activiteit['niveau'];?>" data-datum="<?php echo $activiteit['datum'];?>" data-soort="<?php echo $activiteit['soort'];?>">
        <img src="./assets/img/editie.png" alt="3e editite" width="88" height="238">
        <div>
        <p class="evenement__datum"><?php  if($activiteit['recuring']==0){ echo strftime( '%d %B %Y' ,strtotime($activiteit['datum']));}else{ echo $activiteit['datum']; } ?></p>
         <h3 class="subtitle__evenement"><?php echo $activiteit['title'] ?></h3>
        <p class="evenement__oneliner"><?php echo $activiteit['oneliner'] ?></p>

        <p class="evenement__parameters"><?php if($activiteit['niveau'] != 'iedereen'){echo 'vanaf '.$activiteit['niveau'];}else{echo $activiteit['niveau'];}  ?></p>

        </div>
        <img class="evenement__img evenement__img--hoofd" src="./assets/img/activiteiten/<?php echo $activiteit['img'] ?>.png" alt="hoofdevenement" height="270" width="207">
        <img class="evenement__gif evenement__gif--hoofd" src="./assets/gif/<?php echo $activiteit['img'] ?>.gif" alt="<?php echo $activiteit['title'] ?>" height="270" width="207">
    </article>
</a>

<?php else:?>
<a href="index.php?page=detail&id=<?php echo $activiteit['id'] ?>" class="evenement__link">
    <article class="agenda__evenement" data-niveau="<?php echo $activiteit['niveau'];?>" data-soort="<?php echo $activiteit['soort'];?>" data-datum="<?php echo $activiteit['datum'];?>">
        <img class="evenement__img" src="./assets/img/activiteiten/<?php echo $activiteit['img'] ?>.png" alt="<?php echo $activiteit['title'] ?>" height="207" width="270">
        <img class="evenement__gif" src="./assets/gif/<?php echo $activiteit['img'] ?>.gif" alt="<?php echo $activiteit['title'] ?>" height="207" width="270">
        <div class="evenement__inhoud">
        <p class="evenement__datum"><?php  if($activiteit['recuring']==0){ echo strftime( '%d %B %Y' ,strtotime($activiteit['datum']));}else{ echo $activiteit['datum']; } ?></p>
        <h3 class="subtitle__evenement"><?php echo $activiteit['title'] ?></h3>
        <p class="evenement__oneliner"><?php echo $activiteit['oneliner'] ?></p>
        <p class="evenement__parameters"><?php if($activiteit['niveau'] != 'iedereen'){echo 'vanaf '.$activiteit['niveau'];}else{echo $activiteit['niveau'];}  ?></p>
        </div>
    </article>
    </a>

<?php endif?>
<?php endforeach;?>
</section>
<section class="filter">
<h2 class="hidden">filter</h2>
<form class="filter__form" action="index.php?page=agenda" method="get">
    <input type="hidden" value="agenda" name="page">
    <h3 class="filter__title">niveau</h3>
    <div class="filter__part">
    <div>
    <label class="filter__label">
    <input class="filter__radio filter__niveau" checked type="radio" name="niveau" value="all">
    <span> x</span>
    </label>
    <label class="filter__label">
    <input class="filter__radio filter__niveau" <?php if(!empty($_GET['niveau']) && $_GET['niveau'] == 'beginner'){echo 'checked';} ?> type="radio" name="niveau" value="beginner">
    <span> beginner</span>
    </label>
    </div>
    <div>
    <label class="filter__label">
    <input class="filter__radio filter__niveau" type="radio" name="niveau" value="gevorderd" <?php if(!empty($_GET['niveau']) && $_GET['niveau'] == 'gevorderd'){echo 'checked';} ?>>
    <span> gevorderd </span>
    </label>
    </div>
    <div>
    <label class="filter__label">
    <input class="filter__radio filter__niveau" type="radio" name="niveau" value="expert" <?php if(!empty($_GET['niveau']) && $_GET['niveau'] == 'expert'){echo 'checked';} ?>>
    <span> expert</span>
    </label>
    </div>
    </div>

    <h3 class="filter__title">soort</h3>
    <div class="filter__part">
    <div>
    <label class="filter__label">
    <input class="filter__radio filter__soort" checked type="radio" name="soort" value="all">
    <span> x</span>
    </label>
    <label class="filter__label">
    <input class="filter__radio filter__soort" type="radio" name="soort" value="recreatief" <?php if(!empty($_GET['soort']) && $_GET['soort'] == 'recreatief'){echo 'checked';} ?>>
    <span> recreatief</span>
    </label>
    </div>
    <div>
    <label class="filter__label">
    <input class="filter__radio filter__soort" type="radio" name="soort" value="competitief" <?php if(!empty($_GET['soort']) && $_GET['soort'] == 'competitief'){echo 'checked';} ?>>
    <span> competitief</span>
    </label>
    </div>
    </div>

    <h3 class="filter__title">datum</h3>
    <div class="filter__part">
    <div>
    <label class="filter__label">
    <input class="filter__radio filter__datum" type="radio" name="datum" value="oplopend" checked>
    <span> meest recent</span>
    </label>
    </div>
    <div>
    <label class="filter__label">
    <input class="filter__radio filter__datum" type="radio" name="datum" value="aflopend" <?php if(!empty($_GET['datum']) &&$_GET['datum'] == 'aflopend'){echo 'checked';} ?>>
    <span> minst recent</span>
    </label>
    </div>
    </div>

    <div class="filter__buttons">
    <button type="submit" name="action" value="filter" class="filter__button filter__button--filter">Filter</button>
    </div>
    
</form>
</section>
</div>
