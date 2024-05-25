<?php
    session_start();
    $_SESSION=[];
    session_destroy();
    header('location:/dia5/bienes');
?>