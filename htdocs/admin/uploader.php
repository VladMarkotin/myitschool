<?php 

/*if (empty($_FILES['files']['name'][0])) exit;

echo '<pre>';
print_r($_FILES);
echo '</pre>';

//проверяем, существует ли папка, куда будут загружаться файлы 
$destPath = './uploads';
if (!file_exists($destPath)) {
    mkdir('./uploads');
}

$allFiles = scandir($destPath);


foreach($_FILES['files']['tmp_name'] as $index => $path) {
    if (file_exists($path)) {

        $fileInfo = pathinfo($_FILES['files']['name'][$index]);
        $findFiles = preg_grep("/^".  $fileInfo['filename'] . "(.+)?\." . $fileInfo['extension'] . "$/", $allFiles);

        $filename = $fileInfo['filename'] . (count($findFiles) > 0 ? '_' . (count($findFiles)+1) : '') . '.' . $fileInfo['extension'];

        move_uploaded_file($path, $destPath  . '/' . $filename);
    }
}*/

echo '<pre>';
print_r($_FILES);
echo '<pre/>';

$fileDestination = './uploads'. $newFileName;
if (!file_exists($fileDestination)) {
    mkdir('./uploads');
}

foreach ($_FILES['files']['tmp_name'] as $index => $path) {

    if (isset($_POST['submit'])) {

        $files = $_FILES['files'];
        $name = $_FILES['files']['name'][$index];
        $tmp_name = $_FILES['files']['tmp_name'][$index];
        $size = $_FILES['files']['size'][$index];
        $error = $_FILES['files']['error'][$index];

        //file extension check 
        $tempExtension = explode('.', $name);
        $fileExtension = strtolower(end($tempExtension));
        $allowedArr = ['jpg', 'png', 'jpeg', 'pdf']; //allowed file extensions 

        if (in_array($fileExtension, $allowedArr)) {

            if ($error === 0) {

                if ($size < 500000) {

                    $newFileName = uniqid('', true) . '.' . $fileExtension;
                    $fileDestination = './uploads' . $newFileName;
                    move_uploaded_file($tmp_name, $fileDestination);
                    header("Location: /admin");

                } else {
                    echo 'Your file(s) size is too big';
                }

            } else {
                echo 'Sorry, there is an error. Try again!';
            }

        } else {
            echo 'Sorry, your file(s) extension is not acceptable';
        }
    }

}