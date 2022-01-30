<?php
require_once  'session.php';
if($_SESSION){
    session_destroy();
    header("Location: /");
}