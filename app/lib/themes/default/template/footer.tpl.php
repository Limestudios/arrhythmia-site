<!--<footer class=page-footer>
	<small>
		&copy; 2014 Liam Craver
	</small>
</footer><!-- /.page-footer -->
<?php 

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
<script>
$(document).ready(function() {
  $('div#flash').slideDown('slow').delay(2000).slideUp('slow');
  $('div#flashTop').slideDown('slow').delay(10000).slideUp('slow');
});
var scene = document.getElementById('scene');
var parallax = new Parallax(scene);
</script>