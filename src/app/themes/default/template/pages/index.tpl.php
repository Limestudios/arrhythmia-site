
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
	
	<section class=index-info>
    <div class=wrapper>
      <h3>The all-time best indies beat based game</h3>
      <p>Arrhythmia is an indie game. Arrhythmia is an indie game. Arrhythmia is an indie game. Arrhythmia is an indie game.</p>
    </div>
	</section>
  
  <section class=index-news>
    <div class=wrapper>
      <h3>News</h3>
        <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/ArrhythmiaGame" data-widget-id="425116611243040768" data-theme="dark" data-tweet-limit="4" data-chrome="noheader nofooter noscrollbar noborders transparent">Tweets by @ArrhythmiaGame</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>


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
    </div>
  </section>
  <?php
  $user = new User();
  if($user->isLoggedIn()) {
  ?>
  <?php
    if($user->hasPermission('admin')) {
      echo '<section class=index-warning>
              <div class=wrapper>
                <small>
                  <span>You are an admin</span>
                </small>
              </div> 
            </section>';
    }
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
  ?>
</main>