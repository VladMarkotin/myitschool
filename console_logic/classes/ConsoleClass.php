<?php


class ConsoleClass
{
    private $students = [
        "BE106" => [
            "Sergey_Dolgiy",
            "Eugeniy_Vasuk",
            "Evgeniy_Bartalevich",
            "Francis_Okorafor",
            "Alexander",
            "Ekaterina",
            "Sergey_Artuh",
            "Konstantin_Skumpiy",
            "Alexander_Zimin",
            "Sergey_Maksimyk",
            "Vladislav_Lybochko",
            "Artem_Pekarskiy",
        ]
    ];

    private $finalCommand = "";

    public function setCommand($command, array $args = [])
    {
        $finalCommand = "";
        $getParams = function($args) use($finalCommand){
            foreach ($args as $a){
                $finalCommand .= $a;
            }

            return $finalCommand;
        };
        $setCurrentDir = function ($args) use($getParams){
            $hwDir = ($getParams($args));
            $path = getcwd();
            $hwPath = (explode("\\",$hwDir)); //string
            chdir($path);
            chdir($hwPath[0]);
            for($i = 1; $i < count($hwPath); $i++){
                if(!is_dir($hwPath[$i])){
                    mkdir($hwPath[$i], 0777, true);
                }
                chdir($hwPath[$i]);
            }
        };

        switch ($command){
            case "git clone":
                $this->finalCommand = "git clone ".$getParams($args);
                break;
            case "cd":
                $setCurrentDir($args);//установили нужную дирректорию
                break;
            default: return "Ошибка!";
        }
    }

    public function execute()
    {
        //die(var_dump($this->finalCommand));
        $result = [];
        exec($this->finalCommand);

        return $result;
    }

    public function getStudents($group)
    {
        $html = "";
        foreach ($this->students[$group] as $s) {
            $html .= "<option>$s</option>";
        }

        return $html;
    }

    public function getDirList()
    {
        $currentDir = '.';
        $hw = scandir($currentDir);
        //die(var_dump($hw));
        $hw = array_filter($hw, function ($i) use ($hw){
            $filterValues = [".", "..", ".idea"];
            $dirs = [];
            if(!in_array($i, $filterValues)){
                $dirs[] = $i;
            }

            return $dirs;
        });
        $html = "";
        foreach($hw as $dir){
            $html .= "<option>$dir</option>";
        }

        return $html;
    }
}