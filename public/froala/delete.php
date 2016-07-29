<?php

//ROOT FOLDER
define('ROOT', str_replace('froala','',__DIR__));
define('URI', '/PHP-Mini-MVC-Framework/public/');

// Get src.
$src = str_replace(URI,'',$_POST["src"]);

// Check if file exists.
if (file_exists(ROOT . $src)) {
    // Delete file.
    unlink(ROOT . $src);
}