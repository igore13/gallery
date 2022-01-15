<?php

function generateThumbnail($sourceFile, $thumbnailWidth, $thumbnailHeight) {
    list($width, $height) = getimagesize($sourceFile);
    $pathinfo = pathinfo($sourceFile);

    $thumb = imagecreatetruecolor($thumbnailWidth, $thumbnailHeight);

    switch ($pathinfo['extension']) {
        case 'gif': $source = imagecreatefromgif($sourceFile); break;
        case 'jpg': $source = imagecreatefromjpeg($sourceFile); break;
        case 'png': $source = imagecreatefrompng($sourceFile); break;
        case 'webp': $source = imagecreatefromwebp($sourceFile); break;
        default: return '';  break;
    };

    imagecopyresampled($thumb, $source, 0, 0, 0, 0, $thumbnailWidth, $thumbnailHeight, $width, $height);

    $directory = $pathinfo['dirname'] . '/thumbnails/' . $pathinfo['filename'] . '.' . $pathinfo['extension'];

    switch ($pathinfo['extension']) {
        case 'gif': $source = imagegif($thumb, $directory, 100); break;
        case 'jpg': $source = imagejpeg($thumb, $directory, 100); break;
        case 'png': $source = imagepng($thumb, $directory, 100); break;
        case 'webp': $source = imagewebp($thumb, $directory, 100); break;
        default: return '';  break;
    };

    return $directory;
};

function checkThumbnailExist($sourceFile, $thumbnailWidth, $thumbnailHeight) {
    $pathinfo = pathinfo($sourceFile);
    $directory = $pathinfo['dirname'] . '/thumbnails/' . $pathinfo['filename'] . '.' . $pathinfo['extension'];
    if (file_exists($directory)) {
        return $directory;
    } else {
        return generateThumbnail($sourceFile, $thumbnailWidth, $thumbnailHeight);
    };
};
