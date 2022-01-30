<?php
require_once 'console_logic/classes/ConsoleClass.php';
$console = new ConsoleClass();
$dirList = $console->getDirList();
$userList = $console->getStudents('BE106');
if ($_POST) {
    $ref = $_POST['ref'];
    $owner = $_POST['owner'];
    $dir = $_POST['dir']."\\HW\\".$owner;
    $path = $console->setCommand("cd", [$dir]);
    $console->setCommand("git clone", [$ref]);
    $result = $console->execute();
}
$html = <<<_CODE
       <div>
         <h3>Получить домашку:</h3>
          <form action="" method="post">
              <label for="dir">Выбрать дирректорию:</label>
              <select id="dir" name="dir">
                 {$dirList}
              </select>
              <label for="owner">Чья домашка?</label>
              <select id="owner" name="owner">
                  {$userList}
              </select>
              <label for="cmd">Ссылка на репозиторий:</label>
              <input id="cmd" name="ref">
              <button type="submit">Получить домашку</button>
          </form>
          <hr/>
       </div>

_CODE;
echo $html;
