<?php require_once '../frontend/header.html'; ?>
<link rel="stylesheet" href="../frontend/css/style.css">
<?php
$content = file("storage/file.txt", false, null);
foreach($content as $c){
    echo $c. "<br/>";
}
require_once '../frontend/footer.html';