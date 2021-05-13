
<section class="home__container">
<div class="container__tekst">
<h1 class="title">Knik <br><span class="title--smal">crew</span></h1>
<p class="subtitle">Knikkeren naar een hoger niveau</p>
</div>
<div class="home__img">
<img class=" home__collage--gif" src="./assets/gif/gebouwenHome.gif" alt="collage" width="619" height="943">
<img class="home__collage home__collage--png" src="./assets/img/gebouwenHome.png" alt="collage" width="619" height="943">
</div>
</section>
    <article class="inleiding">
        <h2 class="inleiding__title subtitle">Urban <br>Knikker Club</h2>
        <p class="inleiding__tekst">Ben jij een echte waaghals? Herinner je je nog hoe leuk het knikkeren op de speelplaats was? Dan zoeken we jou!</p>
        <p class="inleiding__tekst">Met onze combinatie van knikkeren en freerunning gooi je alles in de strijd om de knikker te veroveren.</p>
        <a class="inleiding__button" href="index.php?page=spelen">Hoe spelen 
        <img class="button__pijl" src="./assets/img/pijl.svg" alt="pijl" width="86" height="40">
        </a>
    </article>
<section class="evenementen">
    <div class="evenementen__titles">
    <a class="evenement__link" href="index.php?page=agenda"><h2 class="evenementen__title">Evenementen</h2></a>
    <img class="evenement__subtitle" src="./assets/img/saveTheDate.png" alt="Save the date" width="650" height="110">
    </div>
    <div class="evenementen__wrapper">
    <a class="evenement__link" href="index.php?page=detail&id=<?php echo $hoofdActiviteit['id'] ?>">
    <article class="evenementen__evenement evenementen__evenement--hoofd">
        <div class="evenement__container--tekst">
        <img src="./assets/img/editie.png" alt="3e editie" width="119" height="322">
        <div>
        <p class="evenement__datum"><?php echo strftime( '%d %B %Y' ,strtotime($hoofdActiviteit['datum'])); ?></p>
        <h3 class="subtitle__evenement subtitle__evenement--hoofd"><?php echo $hoofdActiviteit['title'] ?></h3>
        <p class="evenement__oneliner"><?php echo $hoofdActiviteit['oneliner'] ?></p>
        <p class="evenement__parameters"><?php echo strftime( '%H:%M' ,strtotime($hoofdActiviteit['start'])) ?> - <?php echo strftime( '%H:%M' ,strtotime($hoofdActiviteit['end'])) ?></p>
        <p class="evenement__parameters"><?php if($hoofdActiviteit['niveau'] != 'iedereen'){echo 'vanaf '.$hoofdActiviteit['niveau'];}else{echo $hoofdActiviteit['niveau'];}  ?></p>
        </div>
        </div>
        <div class="evenement__container--img">
        <img class="evenement__img--home" src="./assets/img/activiteiten/knikkerKampioen.png" alt="hoofdevenement" width="240" height="271">
        <img class="evenement__pijl evenement__pijl--hoofd" src="./assets/img/pijlKort.svg" alt="pijl" width="65" height="38">
        </div>
    </article>
    </a>
    <div class="evenementen__klein">

<?php foreach($randActiviteiten as $activiteit): ?>
    <a class="evenement__link" href="index.php?page=detail&id=<?php echo $activiteit['id'] ?> ">
    <article class="evenementen__evenement evenementen__evenement--klein">
        <div class="evenement__wrapper">
        <p class="evenement__datum"><?php  if($activiteit['recuring']==0){ echo strftime( '%d %B %Y' ,strtotime($activiteit['datum']));}else{ echo $activiteit['datum']; } ?></p>
        <h3 class="subtitle__evenement"><?php echo $activiteit['title'] ?></h3>
        <p class="evenement__oneliner"><?php echo $activiteit['oneliner'] ?></p>
        </div>
        <img class="evenement__pijl " src="./assets/img/pijlKort.svg" alt="pijl" width="65" height="38">
    </article>
    </a>
<?php endforeach; ?>

    </div>
    </div>
</section>

