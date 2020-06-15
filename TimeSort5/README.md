# projekt
Tarkvara projekt 2020


## Uue lehe lisamine

Mõned asjad, mida uue lehe lisamisel silmas hoida

### Universaalne head
Kuna <head></head> on suuresti sama sisuga, on tehtud funktsioon selle genereerimiseks, mida saab lehe koostamisel kasutada. Selleks:
1) Faili kõige üleval tuleb requireda `page_loading.php` funktsiooni kasutamist, nt nii: `<?php require('../../functions/page_loading.php'); ?>`
2) Selle asemel, et käsitsi kirjutada <head></head>, kutsu esile hoopis funktsioon: `<?php display_head("Test leht", "See ei ole saidi avaleht"); ?>`
3) Funktsiooni esimene parameeter on lehe title ja teine parameeter description, asenda need vastavalt vajadusele ära

### Universaalne menüü
Kui lehel on vaja menüüd, kust saab minna kõikidele teistele lehtedele, siis tee nii:
1) Require `page_loading.php` , nagu eelmise ploki esimeses sammus
2) Selles kohas, kus tahad menüüd teha, kutsu esile `display_menu()` funktsioon, nt nii: `<?php display_menu(); ?>`

### Menüü
Selleks, et uus leht menüüs nähtaval oleks, tuleb teha järgmist:
1) Mine faili `/functions/page_loading.php`
2) Mine funktsiooni `display_menu()` deklaratsiooni
3) Lisa `$pages` massiivi deklaratsiooni sisse uus liige kujul `[ 'nimi', 'teekond' ]`. nime näidatakse menüüs ja teekond on teekond lehe failini

### css, js, pildid, funktsioonid
css ja js failid tuleb vastavalt panna `style` ja `javascript` kaustadesse, pildid `images` kausta, funktsioonid `functions` kausta