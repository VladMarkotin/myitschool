<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explorer</title>
</head>
<body>

<?php

    $dir_array = [];
    $files_array = [];

    $basePath = !empty($_GET['path']) ? $_GET['path'] : './';

    //echo $basePath . '<hr>';

    if (is_dir($basePath))  { // it is better to have a function here 
        $dd = opendir($basePath);

        while(($item = readdir($dd))) {

            if (is_dir($basePath . $item)) {
                array_push($dir_array, $item);
            } else array_push($files_array, $item);

        }
    } else {
        array_push($dir_array, '..');
    }

    sort($dir_array);
    sort($files_array);

//creating a list of files and catalogues available in the directory   
    $list = '';
    foreach ($dir_array as $dir) {

        $path = $basePath . $dir . '/';

        if ($dir == '.') continue;

        if ($dir == '..') {
            $basePathArr = explode('/', $basePath);
            if(is_dir($basePath)) array_pop($basePathArr);
            $lastItem = array_pop($basePathArr);

            if ($lastItem != '.' && $lastItem != '..') {
                $path = implode('/', $basePathArr) . '/';
            }
        }

        $list .= '<li><a href = "/admin/index.php?path='. $path . '">' . $dir . '</a></li>';
    }

    foreach ($files_array as $file) {
        $list .= '<li><a href = "/admin/index.php?path='. $basePath . $file . '">' . $file . '</a></li>';
    }

    if (!empty($list)) 
    echo '
    <ul>
        <li><a href = "/admin">.</a></li>'
        . $list . 
    '</ul>'; 
?>

<!--Editing files -->

<?php
    if (is_file($basePath)) {
        $content = htmlspecialchars(file_get_contents($basePath));

        echo '<form method = "POST">
        <textarea name = "filecontent">'. $content .'</textarea>
        <button> Save changes </button>
        </form>';
    }

    if (!empty($_POST['filecontent'])) {
        file_put_contents($basePath, htmlspecialchars_decode($_POST['filecontent']));
        header("Location:" . $_SERVER['REQUEST_URI']);
    }
?>

<!--Uploading files -->

<div class="upload_tools">
<h3>Upload files</h3>

<form action ="uploader.php" method="POST" enctype="multipart/form-data">
    <input type="file" multiple name="files[]">
    <button name="submit">Send</button>
</form>

</div>

<?php echo '<hr/>'; ?>

<!--Deleting catalogues and files--> 

<div class="delete_tools">
<h3>Delete files or catalogues</h3>
<form method="POST">

    <?php $deletePath = $basePath . (!empty($_GET['files']) ? '/' . $_GET['files'] : ''); ?>

    <input type="hidden" name="path" value="<?php echo $deletePath; ?>">
    <input type="hidden" name="action" value="delete">

    Would you like to delete this?: <?php echo $deletePath . '<br/>'; ?>
    <button>Delete</button>

</form>
</div>

<?php 
if(!empty($_POST['path']) && !empty($_POST['action']) && $_POST['action']=='delete') {
    if (is_dir($_POST['path'])) rmdir($_POST['path']);
    else if (is_file($_POST['path'])) unlink($_POST['path']);

    header("Location:/admin");
}

echo '<hr/>';
?>

<!--Creating catalogues and files--> 

<div class="create_tools">
    <h3>Create files or catalogues</h3>

    <form method="POST">
        <input type="hidden" name="action" value="create">

        <input type="text" name="name" placeholder="name" /><br/>
        <input checked type="radio" name="type" value="file" /> File <br/>
        <input type="radio" name="type" value="catalogue" /> Catalogue <br/>
        <button>Create</button>
    </form>
</div>

<?php 
    if (!empty($_POST['name']) && !empty($_POST['type']) && !empty($_POST['action']) && $_POST['action']=='create') {

        $createPath = $basePath . '/' . $_POST['name'];

        switch ($_POST['type']) {
            case 'file':
                $fd = fopen($createPath, 'w');
                fclose($fd);
            break;
            case 'catalogue':
                mkdir($createPath);
            break;
        }

        header("Location: /admin");
    }

        echo '<hr/>';
?>

<!--Renaming catalogue and files--> 

<!--<div class="rename_tools">
    <h3>Rename catalogues and files</h3>
    <form method="POST">

    <input type="hidden" name="path" value="<?php //echo $oldDirName; ?>">
    <input type="hidden" name="action" value="rename">
    Old directory name: <?php //echo $oldDirName; ?>
    <input type="text" name="name" placeholder="enter new directory name">
    <button>Submit</button>
    

    </form>
</div>-->

<?php

    //$oldDirName = dirname($basePath . '/' . $_POST['name']);
    //$oldFileName = basename($basePath );

    //$renameDir= rename($oldDirName, )
?>
    
</body>
</html>