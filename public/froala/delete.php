<?php

//ROOT FOLDER
define('ROOT', str_replace('froala','',__DIR__));

// Get src.
$src = $_POST["src"];

// Check if file exists.
if (file_exists(ROOT . $src)) {
    // Delete file.
    unlink(ROOT. $src);
}