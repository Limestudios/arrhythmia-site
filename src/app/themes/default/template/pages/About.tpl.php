<?php
  $siteContent = Config::getDBSiteContent('news');
?>

<main class="main coming-soon" role=main>
  <header class=page-header>
    <h1><?php echo $siteContent['title']; ?></h1>
    <?php echo $siteContent['content']; ?>
  </header><!-- /.page-header -->
</main>