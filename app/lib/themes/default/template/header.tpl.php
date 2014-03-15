<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php

# Load all of the selected theme's CSS files
$dirCSS = Config::get('site/url').'lib/themes/'.Config::get('site/theme').'/css';
$fpCSS = opendir($dirCSS);
while ($fileCSS = readdir($fpCSS)) {
        if (strpos($fileCSS, '.css',1))
            $resultsCSS[] = $fileCSS;
    }
closedir($fpCSS);

foreach ($resultsCSS as $resultCSS) {
    echo '<link rel="stylesheet" href="'.Config::get('site/homeurl').'/'.$dirCSS.'/'.$resultCSS.'">';
}
 
# Load all of the selected theme's javascript files
    $dirJS = 'lib/themes/default/js';
    $fpJS = opendir($dirJS);
    while ($fileJS = readdir($fpJS)) {
            if (strpos($fileJS, '.js',1))
                $resultsJS[] = $fileJS;
        }
    closedir($fpJS);

    foreach ($resultsJS as $resultJS) {
        echo '<script src="'.Config::get('site/homeurl').'/'.$dirJS.'/'.$resultJS.'"></script>';
    }

?>