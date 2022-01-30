<?php if (empty($_GET['path'])) header("Location: $basePath?path=."); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload files</title>
    <link rel="stylesheet" href="/admin/css/style.css" />
</head>
<body>

<div class="explorer_tools">
    <form method="POST">
    <?php $path = $_GET['path'] . (!empty($_GET['file']) ? '/' . $_GET['file'] : ''); ?>
    
    <input type="hidden" name="path" value="<?php echo $path; ?>" />
    <input type="hidden" name="action" value="delete" />

    Address: <?php echo $path; ?>
    <button>Delete</button>
    </form>
</div>

<div class="explorer_tools">
    <form method="POST">
    <input type="hidden" name="action" value="create" />

    Create: 
    <input type="text" name="name" />
    <input checked type="radio" name="type" value="file" /> - File
    <input type="radio" name="type" value="directory" /> - Directory
    <button>Go</button>
    </form>
</div>

<?php
    function remove_dir($path) {
        if (is_file($path)) {
            unlink($path);
            return true;
        }

        if (is_dir($path)) {
            $dirList = scandir($path);

            unset($dirList[array_search('.', $dirList)]);
            unset($dirList[array_search('..', $dirList)]);

            if (count($dirList) == 0) {
                rmdir($path);
                return true;
            }

            foreach($dirList as $item) remove_dir($path . '/' . $item);
        }

        if (file_exists($_POST['path'])) remove_dir($_POST['path']);
        else return true;

        return false;
    };

    if (!empty($_POST['action']) &&
        !empty($_POST['path']) &&
        $_POST['action'] == 'delete'
    ) {
        // if (is_dir($_POST['path'])) rmdir($_POST['path']);
        // else if (is_file($_POST['path'])) unlink($_POST['path']);

        if (remove_dir($_POST['path'])) header("Location: $basePath?path=" . dirname($_POST['path']));
    }

    if (!empty($_POST['action']) &&
        !empty($_POST['type']) && 
        !empty($_POST['name']) && 
        $_POST['action'] == 'create'
    ) {
        $path = $_GET['path'] . '/' . $_POST['name'];
        
        switch ($_POST['type']) {
            case 'file':
                $file = fopen($path, 'w');
                fclose($file);
            break;
            case 'directory':
                mkdir($path);
            break;
        }

        header("Location: $basePath?path=" . $_GET['path']);
    }
    
    $basePath = "/admin/upload.php";

    if (is_file($_GET['path']))
        header("Location: $basePath?path=" . dirname($_GET['path']) . "&file=" . basename($_GET['path']));

    $dirArr = [];
    $fileArr = [];

    $dd = opendir($_GET['path']);

    while ($item = readdir($dd)) {
        $path = $_GET['path'] . '/' . $item;

        if ($item == '.') continue;

        if ($item == '..') {
            $pathArr = explode('/', $_GET['path']);
            $lastItem = array_pop($pathArr);

            if ($lastItem != '.' && $lastItem != '..') $path = implode('/', $pathArr);
        }

        if (is_dir($path)) array_push($dirArr, [$path, $item]);
        else array_push($fileArr, [$path, $item]);
    }

    sort($dirArr);
    sort($fileArr);

    $list = '';

    foreach($dirArr as $dir) {
        $list .= "<li><a href='/admin/upload.php?path=" . $dir[0] . "'>[ $dir[1] ]</a></li>";
    }

    foreach($fileArr as $file) {
        $list .= "<li><a href='/admin/upload.php?path=" . $file[0] . "'>$file[1]</a></li>";
    }

    if (!empty($list)) echo '<ul class="explorer_files">
    <li><a href="' . $basePath . '">[ . ] Home</a></li>
    ' . $list . '</ul>';
?>
    
</body>
</html>