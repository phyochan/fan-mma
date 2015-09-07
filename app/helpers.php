<?php
/**
 * Created by PhpStorm.
 * User: phyochan
 * Date: 8/25/2015
 * Time: 11:35 AM
 */

function human_filesize($bytes, $decimals = 2)
 {
     $size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB'];
 $factor = floor((strlen($bytes) - 1) / 3);

 return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) .
     @$size[$factor];


 }

 /**
16 * Is the mime type an image
17 */
 function is_image($mimeType)
 {
     return starts_with($mimeType, 'image/');
 }