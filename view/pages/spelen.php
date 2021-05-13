<section>
    <h1 class="spelen__title">urban knikkeren 101</h1>
    <p class=" spelen__inleiding">Met onze vereniging nemen we knikkeren naar nieuwe hoogtes, letterlijk. De stad wordt het knikkerveld, de hoogtes een nieuwe dimensie. Je knikker kan overal belanden.</p>
</section>
<section >
    <div class="uitleg__wrapper">
    <h2 class="hidden">hoe spelen?</h2>
    <article class="uitleg__part">
        <h3>Doel van <br> het spel</h3>
        <p>Je probeert zo snel mogelijk de bolleket uit de middencirkel te krijgen. Je ziet de stad als tool en niet als obstakel. Alleen dan kan jij als eerste de knikker veroveren.</p>
    </article>
    <article class="uitleg__part">
        <h3>De hoogtes trotseren</h3>
        <p>Buiten de buitencirkel zone gebruik je katapulten om de knikker omhoog of ver vooruit te krijgen. Met je freerun kennis klim je naar optimale 
plekken om van te spelen.</p>
    </article>
    <article class="uitleg__part">
        <h3>Baas over eigen knikker</h3>
        <p>Binnen de buitencirkel toon je dat jij de baas bent over je knikker. Je knikker doet exact wat jij voor ogen hebt. 
Zo kom je niet voor diepe dalen te staan.</p>
    </article>
    </div>
    <img class="uitleg__img" src="./assets/img/hoeSpelen.png" alt="Hoe spelen?" width="1320" height="740">
    <article class="uitleg__part uitleg__part--target">
        <h3>De target</h3>
        <p class="target__inleiding">Op de gebouwen zijn targets gevestigd, bestaande uit verschillende cirkels. Elke cirkel komt met z’n eigen moeilijkheden en obstacels</p>
        <div class="target">
        <section class="target__part">
            <h4>Startlijn</h4>
            <p>Elke speler moet ergens buiten de startcirkel starten. Zoek een tactische plaats. </p>
        </section>
        <section class="target__part">
            <h4>Buitencirkel</h4>
            <p>je mag geen hulpmiddelen gebruiken binnen de cirkel rond de middencirkel. </p>
        </section>
        <section class="target__part">
            <h4>Middencirkel</h4>
            <p>Hier ligt de bolleket die je moet veroveren, maar je mag geen voet in deze cirkel zetten. </p>
        </section>
        </div>
    </article>
</section>
<section>
    <h2 class="niveau__title">niveaus</h2>
    <div class="niveau__wrapper">

<?php foreach($niveaus as $niveau): ?>
    <article class="niveau__part">
        <div class="part__wrapper">
        <h3><?php echo $niveau['name'] ?></h3>
        <img class="niveau__level" src="./assets/img/level<?php echo $niveau['id'] ?>.png" alt="Level <?php echo $niveau['id'] ?>" width="220" height="80">
        <p class="niveau__subtitle"><?php echo $niveau['tagline'] ?></p>
        <p><?php echo $niveau['beschrijving'] ?></p>
</div>

        <a class="niveau__button" href="index.php?page=agenda&niveau=<?php echo $niveau['name'] ?>&soort=all&datum=oplopend&action=filter"><?php echo $niveau['name'] ?> <br>activiteiten 
        <img class="button__pijl button__pijl--niveau" src="./assets/img/pijl.svg" alt="pijl" width="86" height="40">
        </a>

    </article>
<?php endforeach; ?>

    </div>
</section>