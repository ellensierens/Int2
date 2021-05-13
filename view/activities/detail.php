<section >
<h1 class="detail__title" ><?php echo $activiteit['title'] ?></h1>
<div class="detail__wrapper">
<div class="detail__img">
<div class="detail__evenement">
<img class="evenement__img" src="./assets/img/activiteiten/<?php echo $activiteit['img'] ?>.png" alt="<?php echo $activiteit['title'] ?>" <?php if($activiteit['id'] == 1){ echo 'width="405" height=482'; }else{ echo 'width="650" height=500';} ?> >
<img class="evenement__gif evenement__gif--meer" src="./assets/gif/<?php echo $activiteit['img'] ?>.gif" alt="<?php echo $activiteit['title'] ?>" width="650" height=500 >
</div>
<img class="img__oneliner" src="./assets/img/oneliners/<?php echo $activiteit['img'] ?>Tekst.png" alt="<?php echo $activiteit['oneliner'] ?>" width="800" height=172>
</div>
<div class="detail__tekst">
<p><?php echo $activiteit['description'] ?></p>
<div>
<p class="evenement__datum"><?php  if($activiteit['recuring']==0){ echo strftime( '%d %B %Y' ,strtotime($activiteit['datum']));}else{ echo $activiteit['datum']; } ?></p>
<p class="evenement__datum"><?php echo strftime( '%H:%M' ,strtotime($activiteit['start'])) ?> - <?php echo strftime( '%H:%M' ,strtotime($activiteit['end'])) ?></p>
<p class="evenement__datum"><?php echo $activiteit['locatie'] ?></p>
<p class=" evenement__prijs"><?php echo $activiteit['prijs'] ?> euro</p>
</div>
<div>
<p class="evenement__parameters"> <?php if($activiteit['niveau'] != 'iedereen'){echo 'vanaf '.$activiteit['niveau'];}else{echo $activiteit['niveau'];}  ?></p>
<p class="evenement__parameters"><?php echo $activiteit['soort'] ?></p>
</div>
<form class="inschrijven__button" method="post" action="index.php?page=cart">
        <input type="hidden" name="activiteit_id" value="<?php echo $activiteit['id'];?>" />
        <button class="inschrijven__button" type="submit" name="action" value="add">inschrijven 
            <img class="button__pijl" src="./assets/img/pijl.svg" alt="pijl" width="86" height="40">
        </button>
</form>
</div>
</div>
</section>

<section class="meer">
    <h2 class="meer__title">meer</h2>

<?php foreach($randActiviteiten as $activiteit): ?>
    <a class="evenement__link" href="index.php?page=detail&id=<?php echo $activiteit['id'] ?>">
    <article class="meer__evenement">
    <img class="evenement__img" src="./assets/img/activiteiten/<?php echo $activiteit['img'] ?>.png" alt="<?php echo $activiteit['title'] ?>" <?php if($activiteit['id'] == 1){ echo 'width="118" height=154'; }else{ echo 'width="200" height=154';} ?>>
    <img class="evenement__gif evenement__gif--meer <?php if($activiteit['id'] == 1){ echo 'meer__gif--hoofd'; }?>" src="./assets/gif/<?php echo $activiteit['img'] ?>.gif" alt="<?php echo $activiteit['title'] ?>" <?php if($activiteit['id'] == 1){ echo 'width="118" height=154'; }else{ echo 'width="200" height=154';} ?>>
    <div class="meer__wrapper">
    <h3 class="evenement__title--meer"><?php echo $activiteit['title'] ?></h3>
    <img class="meer__pijl" src="./assets/img/pijlKort.svg" alt="pijl" width="52" height="30">
    </div>
    </article>
    </a>
<?php endforeach; ?>

</section>
