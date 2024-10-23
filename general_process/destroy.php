<?php
session_start();

$sess = $_GET["sess"];

if ($sess == "des") {
    session_destroy();

    echo ("destroyed");
} else {
    echo ("Unkown Error");
}
