<?php
    $link = mysqli_connect("localhost", "root", "root");
    $link->set_charset("utf8");
    mysqli_select_db($link, "web1");
?>