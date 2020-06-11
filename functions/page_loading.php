<?php

function display_head($title, $description) {
  echo '<head>';

  //using variables
  echo '<title>'.$title.'</title>';
  echo '<meta name="description" content="'.$description.'">';

  //general stuff
  echo '<meta charset="UTF-8">';
  echo '<meta http-equiv="refresh" content="300">';

  echo '</head>';
}

//menu stuff
function display_teacher_menu($is_main = false) {
  $pages = [
    ['Avaleht | ', 'teacher.php' ],
    ['Logi sisse | ', 'logIn.php'],
    ['Muuda profiili | ', 'teacher_profile.php'],
    ['Lisa kodutöö | ', 'homework.php']
  ];

  echo '<div id="menu" class="menu">';
  echo '<p>TimeSort</p>';
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

function display_student_menu($is_main = false) {
  $pages = [
    ['Avaleht | ', 'student.php' ],
    ['Logi sisse | ', 'logIn.php'],
    ['Muuda profiili | ', 'student_profile.php'],
    ['Salvesta aega | ', 'timer.php']
 
  ];

  echo '<div id="menu" class="menu">';
  echo '<p>TimeSort</p>';
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