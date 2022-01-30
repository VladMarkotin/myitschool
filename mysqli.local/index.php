<?php

echo "Mysqli: <br/>";
function Query1()
{
    $mysqli = mysqli_connect("localhost", "root", "root", "db_for_lessons");
    $result = mysqli_query($mysqli, "SELECT 'Мир, полный ' AS _msg FROM DUAL");
    $row = mysqli_fetch_assoc($result);
    echo $row['_msg'];

    $mysqli = new mysqli("localhost", "root", "root", "db_for_lessons");

    $result = $mysqli->query("SELECT 'выбора, чтобы угодить всем.' AS _msg FROM DUAL");
    $row = $result->fetch_assoc();
    echo $row['_msg'];
    mysqli_close($mysqli);
}

function Query2()
{
    $mysqli = mysqli_connect("localhost", "root", "root", "db_for_lessons");
    $result = mysqli_query($mysqli, "SELECT * FROM departments");
    if ($row = $result->fetch_assoc()) {
        echo $row['dept_no']. " " .$row['dept_name']."<br/>";
    }
    mysqli_close($mysqli);
}

function Query3()
{
    $mysqli = mysqli_connect("localhost", "root", "root", "db_for_lessons");
    $result = mysqli_query($mysqli, "SELECT * FROM employees e JOIN salaries s ON e.emp_no = s.emp_no");
    if ($row = $result->fetch_assoc()) {
        echo $row['first_name']. " " .$row['salary']."<br/>";
    }
    mysqli_close($mysqli);
}

//Query1();
Query3();