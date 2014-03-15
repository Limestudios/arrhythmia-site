
<?php
  $user = new User();
  if($user->isLoggedIn()) {
    } else { 
  ?>
  <section class=index-warning>
    <div class=wrapper>
      <small>
        <span>You aren't signed in.</span> 
        <a class=blue-link href="login">Sign in</a> <span>or</span> <a class=orange-link href="register">Register</a>
      </small>
    </div>
  </section>
  <?php
  }

  $this->_db = DB::getInstance();
  $this->_db->get('beatmaps', array("id", ">", "0"));
  $beatmapCount = $this->_db->count();

  //$this->_db = DB::getInstance();
  $this->_db->get('users_session', array("id", ">", "0"));
  $userCount = $this->_db->count();
  $this->_db->get('users', array("id", ">", "0"));
  $totalUserCount = $this->_db->count();
  
  // Current Version 
  $siteContent = Config::getDBSiteContent('development');
  $percentDone = $siteContent['percentDone'];
  $currentVersion = $siteContent['currentVersion'];
  $nextVersion = $siteContent['nextVersion'];
?>

<script>
  $(function() {
    // -- Total Beatmaps -- //
    var beatmapCount = "<?php echo $beatmapCount; ?>";

    $(".dialBeatmapCount").knob({
      'readOnly':true,
      'min': 0,
      'max': 100
    });
    $('.dialBeatmapCount').val(beatmapCount).trigger('change');
    
    // -- Total Users -- //
    var userCount = "<?php echo $userCount; ?>";
    var totalUserCount = "<?php echo $totalUserCount; ?>";
    
    $(".dialUserCount").knob({
      'readOnly':true,
      'min': 0,
      'max': totalUserCount
    });
    $('.dialUserCount').val(userCount).trigger('change');
  
    // -- Precent Done -- //
    var percentDone = "<?php echo $percentDone; ?>";
    
    $(".dialPercentDone").knob({
      'readOnly':true,
      'min': 0,
      'max': 100
    });
    $('.dialPercentDone').val(percentDone).trigger('change');
  });
</script>


<main role=main class="main index-page">
  <section class=index-title>
    <ul id=scene class="scene" 
      data-calibrate-x="true"
      data-calibrate-y="true"
      data-invert-x="false"
      data-invert-y="false"
      data-limit-x="false"
      data-limit-y="false"
      data-scalar-x="3"
      data-scalar-y="3"
      data-friction-x="0.4"
      data-friction-y="0.4">  
      <li class=layer data-depth=0.30><img src=<?php echo Config::get('site/homeurl').'/app/themes/'.Config::get('site/theme')?>/img/layer0.png>
      <li class=layer data-depth=0.40><img src=<?php echo Config::get('site/homeurl').'/app/themes/'.Config::get('site/theme')?>/img/layer1.png>
      <li class=layer data-depth=0.50><img src=<?php echo Config::get('site/homeurl').'/app/themes/'.Config::get('site/theme')?>/img/layer2.png>
      <li class=layer data-depth=0.10><img src=<?php echo Config::get('site/homeurl').'/app/themes/'.Config::get('site/theme')?>/img/layer3.png>
    </ul>
	</section>

  <section class="index-title">
  </section>
	
	<section class=index-info>
    <div class=wrapper>
      <h2>"Wouldn't it be cool to have game-play directly created by a song?"</h2>
      <p>
        <br>
          This question interested me so much that during my Friday coding jam session I 
        decided to try my hand at making such a game a reality. Thus Arrhythmia was born! 
        <br><br>
        Arrhythmia's gameplay is created by the community that plays it for the most part,
        with the only exception being the official beatmap pack that comes prebuilt into 
        the game. I wanted it to be a self sustaining community. When new music comes out 
        the community can turn the music into new beatmaps for other people to play with 
        the in game beatmap editor. Beatmaps consist of a folder holding a music file, an 
        album cover, and a beatmap file. All of these combine to create the gameplay 
        within the game. After they are made they then can be uploaded to our servers 
        to be downloaded by other Arrhythmia users using the in game downloader.
        <br><br>
        The point of Arrhtyhmia is to stay alive all the way through the song / beatmap 
        you choose. You loose a bit of your health every time you collide with an object 
        / projectile emitted from the cube in the center of the game screen.
      </p>
    </div>
	</section>
  
  <section class=index-news>
    <div class=wrapper>
        <section class="left">
          <!--<a class="twitter-timeline" data-dnt="true" href="https://twitter.com/ArrhythmiaGame" data-widget-id="425116611243040768" data-theme="dark" data-tweet-limit="4" data-chrome="noheader nofooter noscrollbar noborders transparent">Tweets by @ArrhythmiaGame</a>
          <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>-->
          <?php 
            $siteContent = Config::getDBSiteContent('news');
            echo '<p><h3>'.$siteContent['titleRaw'].'</h3></p>';
            echo '<hr>';
            echo '<b>'.$siteContent['date']['date'].'</b>';
            echo '<p>'.$siteContent['content'].'</p>';
          ?>
        </section>
        <section class="right">
        <p>Current Version : <?php echo $currentVersion; ?></p>
        <p>Next Version : <?php echo $nextVersion; ?></p>
        <p>Precent Done :</p>
          <input class="dialPercentDone" type="text" data-width="50%" data-thickness=".4" 
          data-fgColor="#00a2e8">
        </section>
    </div>
  </section>
	
	<section class=index-buy>
		<div class=wrapper>
      <h3>Purchase</h3>
		</div>
      <?php
          if(Session::exists('home')) {
           echo '<p>'.Session::flash('home') . '</p>';
          }
      ?>
	</section>
  
  <section class=index-beatmaps>
    <div class=wrapper>
      <h3>Beatmaps</h3>
      <!--<input class="dialBeatmapCount" type="text" data-width="100%" data-thickness=".4" 
      data-fgColor="#00a2e8">

      <h3>Users</h3>
      <input class="dialUserCount" type="text" data-width="100%" data-thickness=".4" 
      data-fgColor="#ff7f27">-->
    </div>
  </section>
</main>