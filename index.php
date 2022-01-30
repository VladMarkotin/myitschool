<?php
require_once 'header/header.html';
require_once 'console_logic/index.php';
echo <<<END
  <p>Меню:</p>
  <ul>
      <li><a href="lesson_1/index.php">1 урок</a></li> 
      <li><a href="lesson_2/index.php">2 урок</a></li> 
      <li><a href="lesson_3/index.php">3 урок</a></li>
      <li><a href="lesson_4/index.html">4 урок</a></li>
      <li><a href="lesson_5/">5 урок</a></li>
      <li><a href="lesson_6/ClassWork/index.php">6 урок</a></li>  
      <li><a href="lesson_7/index.php">7 урок</a></li>
      <li><a href="lesson_8_curl/index.php">8 урок</a></li>    
      <li><a href="lesson_9/ClassWork/index.php">9 урок</a></li> 
  </ul>
END;
require_once 'footer/footer.html';