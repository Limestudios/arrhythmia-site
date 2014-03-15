<?php
  $siteContent = Config::getDBSiteContent('about');
?>

<main class="main coming-soon" role=main>
  <header class=page-header>
    <h1><?php echo $siteContent['titleRaw']; ?></h1>
  </header><!-- /.page-header -->
  <section class=page-content>
    <div class=wrapper>
      <div class="standard-box">
        <?php echo $siteContent['content']; ?>
      </div>
    </div>
  </section>
</main>