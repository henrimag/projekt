<?php

function display_head($title, $description) {
  // echo '<head>';

  //using variables
  echo '<title>'.$title.'</title>';
  echo '<meta name="description" content="'.$description.'">';

  //general stuff
  echo '<meta charset="UTF-8">';
  echo '<meta http-equiv="refresh" content="300">';

  echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />';
	echo '<link rel="stylesheet" href="../style/style.css">';

  echo '</head>';
}

//menu stuff
function display_teacher_menu() {
  $pages = [
    ['Avaleht', 'teacher.php' ],
    ['Logi sisse', 'logIn.php'],
    ['Vaata statistikat', 'stats.php']
  ];
  display_menu($pages);
}

function display_student_menu() {
  $pages = [
    ['Avaleht', 'student.php' ],
    ['Logi sisse', 'logIn.php'],
    ['Salvesta aega', 'timer.php'],
    ['Vaata statistikat', 'stats.php']
  ];
  display_menu($pages);
}

function display_menu($pages) {
  echo '<div id="menu" class="menu">';
  echo '<p>TimeSort</p>';
  echo '<nav>';

  for ($i = 0; $i < count($pages); $i++) {
    echo '<a href="./';
    echo $pages[$i][1];
    echo '">';
    echo $pages[$i][0];
    echo '</a>';
  }
  
  echo '</nav>';  
  echo '</div>';
}
