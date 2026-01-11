<?php

   // Change Title Tag Version 1.5
   ob_start();
function ch_title($site,$title)
{
    $output = ob_get_contents();

    if (ob_get_length() > 0) {
        ob_end_clean();
    }

    $patterns = ["/<title>(.*?)<\/title>/"];

    $replacements = ["<title>$site | $title</title>"];

    $output = preg_replace($patterns, $replacements, $output);

    echo $output;
}

?>

