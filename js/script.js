{

  let allActiviteiten = "";
  let filteredActiviteiten
  let selectedSoort = 'all';
  let selectedNiveau = 'all';
  let selectedDatum = "oplopend";

  const init = () => {


    setTimeout(() => {
      const $gif = document.querySelector('.home__collage--gif');
      if ($gif) {
        $gif.style.opacity = '1';
      }
    }, 1000);

    document.documentElement.classList.add('has-js');

    const $inputs = document.querySelectorAll('input');

    if (allActiviteiten === '') {
      allActiviteiten = fetchAllActiviteiten();
    }

    $inputs.forEach(input => {
      input.addEventListener('click', handleInputClick);
      if (input.name === 'niveau') {
        if (input.checked) {
          selectedNiveau = input.value;
        }
      }
    });

    const quantity_fields = document.querySelectorAll('.item__aantal');
    quantity_fields.forEach($hoeveelheid => $hoeveelheid.addEventListener('input', handleInputHoeveelheid));
  };

  const fetchAllActiviteiten = async () => {
    const url = `index.php?page=agenda`;

    const response = await fetch(url, {
      headers: new Headers({
        Accept: 'application/json'
      })
    });
    allActiviteiten = await response.json();
  }

  const handleInputHoeveelheid = e => {
    const $hoeveelheid = e.currentTarget;
    const itemPrice = parseFloat($hoeveelheid.nextElementSibling.dataset.prijs).toFixed(2);
    const itemTotal = parseFloat($hoeveelheid.value * itemPrice).toFixed(2);

    $hoeveelheid.parentElement.querySelector('.item__price').textContent = `${itemTotal} EUR`;

    let totalPrice = 0;
    document.querySelectorAll('.item__price').forEach($total => {
      const subtotal = parseFloat($total.textContent);
      if (!isNaN(subtotal)) {
        totalPrice += subtotal;
      }
    });
    document.querySelector('.totaal').innerHTML = `<span>total:</span> ${parseFloat(totalPrice).toFixed(2)} EUR`;

    if ($hoeveelheid.value == 0) {
      $hoeveelheid.parentElement.outerHTML = ``;
    }
  };

  const handleInputClick = e => {
    if (e.target.attributes.name.value == 'niveau') {
      selectedNiveau = e.target.value;

      filteredActiviteiten = allActiviteiten.filter(filterByNiveau);

      filteredActiviteiten = filteredActiviteiten.filter(filterBySoort);

      filteredActiviteiten = filterByDatum(filteredActiviteiten);
    }

    if (e.target.attributes.name.value == 'soort') {
      selectedSoort = e.target.value;

      filteredActiviteiten = allActiviteiten.filter(filterBySoort);

      filteredActiviteiten = filteredActiviteiten.filter(filterByNiveau);

      filteredActiviteiten = filterByDatum(filteredActiviteiten);
    }

    if (e.target.attributes.name.value == 'datum') {
      selectedDatum = e.target.value;

      filteredActiviteiten = filterByDatum(allActiviteiten);

      filteredActiviteiten = filteredActiviteiten.filter(filterByNiveau);

      filteredActiviteiten = filteredActiviteiten.filter(filterBySoort);
    }
    aanpassenUrl();
    showActiviteiten(filteredActiviteiten);

  }

  const filterByDatum = filteredActiviteiten => {
    const datumArray = filteredActiviteiten.filter(activiteit => {
      if (activiteit.datum.length == 10) {
        return true;
      } else {
        return false;
      }
    })
    gesorteerdeDatums = datumArray.sort(sortByDate);

    const recurringArray = filteredActiviteiten.filter(activiteit => {
      if (activiteit.datum.length > 10) {
        return true;
      } else {
        return false;
      }
    })
    gesorteerdeRecurring = recurringArray.sort(sortByDate);

    if (selectedDatum === 'oplopend') {
      filteredActiviteiten = gesorteerdeRecurring.concat(gesorteerdeDatums);
    }

    if (selectedDatum === 'aflopend') {
      filteredActiviteiten = gesorteerdeDatums.concat(gesorteerdeRecurring);
    }

    return filteredActiviteiten;
  }

  const sortByDate = (a, b) => {
    if (selectedDatum === 'oplopend') {
      if (a.recuring == 0 && b.recuring == 0) {
        if (a.datum < b.datum) {
          return -1;
        } else {
          return 1;
        }
      } else {
        if (a.recuring < b.recuring) {
          return 1;
        } else {
          return -1;
        }
      }
    }

    if (selectedDatum === 'aflopend') {
      if (a.recuring == 0 && b.recuring == 0) {
        if (a.datum < b.datum) {
          return 1;
        } else {
          return -1;
        }
      } else {
        if (a.recuring < b.recuring) {
          return -1;
        } else {
          return 1;
        }
      }
    }
  }

  const filterByNiveau = activiteit => {
    if (selectedNiveau === 'all' || activiteit.niveau === "iedereen") {
      return true;
    } else {
      if (activiteit.niveau === selectedNiveau) {
        return true;
      } else {
        return false;
      }
    }
  }

  const filterBySoort = activiteit => {
    if (selectedSoort === 'all') {
      return true;
    } else {
      if (activiteit.soort === selectedSoort) {
        return true;
      } else {
        return false;
      }
    }
  }

  const aanpassenUrl = () => {

    const path = window.location.href.split(`?`)[0];
    const qs = `?page=agenda&niveau=${selectedNiveau}&soort=${selectedSoort}&datum=${selectedDatum}&action=filter`;
    url = `${path}${qs}`;
    window.history.pushState({}, ``, url);
  }

  const showActiviteiten = () => {

    const $list = document.querySelector('.agenda__evenementen');
    if($list){
      $list.innerHTML = "";
    }


    const $title = document.createElement('h2');
    $title.textContent = 'evenementen';
    $title.classList.add("hidden");
    $list.appendChild($title);

    if (filteredActiviteiten.length !== 0) {
      filteredActiviteiten.forEach(activiteit => {
        if (activiteit.id === 1) {
          const $a = document.createElement('a');
          $a.classList.add('evenement__link');
          $a.setAttribute('href', `index.php?page=detail&id=${activiteit.id}`);
          $list.appendChild($a);

          const $article = document.createElement('artcile');
          $article.classList.add('agenda__evenement');
          $article.classList.add('agenda__evenement--hoofd');
          $a.appendChild($article);

          const $img = document.createElement('img');
          $img.setAttribute('src', './assets/img/editie.png');
          $img.setAttribute('alt', '3e editie');
          $img.setAttribute('height', '238');
          $img.setAttribute('width', '88');
          $article.appendChild($img);

          const $div = document.createElement('div');
          $article.appendChild($div);

          const $datum = document.createElement('p');
          $datum.classList.add('evenement__datum');
          if (activiteit.recuring > 0) {
            $datum.textContent = activiteit.datum;
          } else {
            const date = Date.parse(activiteit.datum);
            $datum.textContent = new Intl.DateTimeFormat('nl-BE', { day: '2-digit', month: 'long', year: 'numeric' }).format(date);
          }
          $div.appendChild($datum);

          const $title = document.createElement('h3');
          $title.textContent = activiteit.title;
          $title.classList.add('subtitle__evenement');
          $div.appendChild($title);

          const $onleliner = document.createElement('p');
          $onleliner.textContent = activiteit.oneliner;
          $onleliner.classList.add('evenement__oneliner');
          $div.appendChild($onleliner);

          const $parameters = document.createElement('p');
          if (activiteit.niveau === 'iedereen') {
            $parameters.textContent = activiteit.niveau;
          } else {
            $parameters.textContent = `Vanaf ${activiteit.niveau}`;
          }
          $parameters.classList.add('evenement__parameters');
          $div.appendChild($parameters);

          const $collage = document.createElement('img');
          $collage.classList.add('evenement__img');
          $collage.classList.add('evenement__img--hoofd');
          $collage.setAttribute('src', `./assets/img/activiteiten/${activiteit.img}.png`);
          $collage.setAttribute('alt', 'hoofdevenement');
          $collage.setAttribute('height', '270');
          $collage.setAttribute('width', '207');
          $article.appendChild($collage);

          const $gif = document.createElement('img');
          $gif.classList.add('evenement__gif');
          $gif.classList.add('evenement__gif--hoofd');
          $gif.setAttribute('src', `./assets/gif/${activiteit.img}.gif`);
          $gif.setAttribute('alt', activiteit.title);
          $gif.setAttribute('height', '270');
          $gif.setAttribute('width', '207');
          $article.appendChild($gif);
        } else {
          const $a = document.createElement('a');
          $a.classList.add('evenement__link');
          $a.setAttribute('href', `index.php?page=detail&id=${activiteit.id}`);
          $list.appendChild($a);

          const $article = document.createElement('artcile');
          $article.classList.add('agenda__evenement');
          $a.appendChild($article);

          const $collage = document.createElement('img');
          $collage.classList.add('evenement__img');
          $collage.setAttribute('src', `./assets/img/activiteiten/${activiteit.img}.png`);
          $collage.setAttribute('alt', activiteit.title);
          $collage.setAttribute('height', '207');
          $collage.setAttribute('width', '270');
          $article.appendChild($collage);

          const $gif = document.createElement('img');
          $gif.classList.add('evenement__gif');
          $gif.setAttribute('src', `./assets/gif/${activiteit.img}.gif`);
          $gif.setAttribute('alt', activiteit.title);
          $gif.setAttribute('height', '207');
          $gif.setAttribute('width', '270');
          $article.appendChild($gif);

          const $div = document.createElement('div');
          $div.classList.add('evenement__inhoud');
          $article.appendChild($div);


          const $datum = document.createElement('p');
          $datum.classList.add('evenement__datum');
          if (activiteit.recuring > 0) {
            $datum.textContent = activiteit.datum;
          } else {
            const date = Date.parse(activiteit.datum);
            $datum.textContent = new Intl.DateTimeFormat('nl-BE', { day: '2-digit', month: 'long', year: 'numeric' }).format(date);
          }
          $div.appendChild($datum);

          const $title = document.createElement('h3');
          $title.textContent = activiteit.title;
          $title.classList.add('subtitle__evenement');
          $div.appendChild($title);

          const $onleliner = document.createElement('p');
          $onleliner.textContent = activiteit.oneliner;
          $onleliner.classList.add('evenement__oneliner');
          $div.appendChild($onleliner);

          const $parameters = document.createElement('p');
          if (activiteit.niveau === 'iedereen') {
            $parameters.textContent = activiteit.niveau;
          } else {
            $parameters.textContent = `Vanaf ${activiteit.niveau}`;
          }
          $parameters.classList.add('evenement__parameters');
          $div.appendChild($parameters)
        }
      })
    } else {
      const $info = document.createElement('p');
      $list.appendChild($info);
      $info.textContent = 'Je hebt nog geen activiteiten toegevoegd.';
      $info.classList.add('evenement__geen');
    }
  }

  init();
}
