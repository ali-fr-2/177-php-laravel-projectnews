<?php

$request = 2;

switch ($request) {
    case '1':
        require "contact.php";
        break;
    case '2':
        require "about.php";
        break;
}
