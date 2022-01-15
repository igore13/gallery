<?php

include_once 'config.php';
include_once 'functions.php';

$listImages = [];
if (is_readable(targetDirectory) && is_dir(targetDirectory)) {
    $imagesFolder = opendir(targetDirectory);
    while($fichier = readdir($imagesFolder)) {
        if (is_dir($fichier) || !(in_array(pathinfo($fichier, PATHINFO_EXTENSION), allowedExtension))) {
            continue;
        }
        array_push($listImages, './img/' . $fichier);
    }
    closedir($imagesFolder);
};
