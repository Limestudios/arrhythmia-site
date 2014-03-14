<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
    <head>
        <title><?php print @$this->title; ?></title>
        <?php print $this->head; ?>
    </head>
    <body class=<?php print '"'.@$this->bodyStyling.'"'; ?>>
    	<?php print $this->navbar; ?>
        <?php print $this->content; ?>
        <footer>
            <?php print $this->footer; ?>
        </footer>
    </body>
</html>