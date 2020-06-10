<?php

function display_head($title, $description) {
  echo '<head>';

  //using variables
  echo '<title>'.$title.'</title>';
  echo '<meta name="description" content="'.$description.'">';

  //general stuff
  echo '<meta charset="UTF-8">';
  echo '<meta http-equiv="refresh" content="30">';

  echo '</head>';
}

//menu stuff
function display_menu($is_main = false) {
  $pages = [
    ['main | ', '' ],
    ['test | ', 'test'],
    ['logIn | ', 'logIn.php'],
    ['timer', 'timer.html']
  ];

  echo '<div id="menu" class="menu">';
  echo '<p>Time Sort</p>';
  echo '<nav>';

  for ($i = 0; $i < count($pages); $i++) {
    echo '<a href="';
    if ($is_main) {
      echo './';
    }
    else {
      echo '../';
    }
    echo $pages[$i][1];
    echo '">';
    echo $pages[$i][0];
    echo '</a>';
  }
  
  echo '</nav>';  
  echo '</div>';
}