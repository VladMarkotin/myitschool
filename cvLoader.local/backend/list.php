<?php
$dir = $_SERVER['DOCUMENT_ROOT']."/storage/";
if ($dh = opendir($dir)) {
    while (($file = readdir($dh)) !== false) {
        echo "файл: $file : тип: " . filetype($dir . $file) . "\n";
    }
    closedir($dh);
}