<?php
$user = new User();
if($user->isLoggedIn()) {
?>

<main role=main>
  
	<section class=index-title>
		<div class=row>
      <div class="large-12 small-12 columns">
        <ul id=scene class="scene" 
          data-calibrate-x="true"
          data-calibrate-y="true"
          data-invert-x="false"
          data-invert-y="false"
          data-limit-x="false"
          data-limit-y="10"
          data-scalar-x="8"
          data-scalar-y="8"
          data-friction-x="0.4"
          data-friction-y="0.4">  
          <li class=layer data-depth=0.00><img src=layer1.png>
          <li class=layer data-depth=0.20><img src=layer2.png>
          <li class=layer data-depth=0.40><img src=layer3.png>
          <li class=layer data-depth=0.60><img src=layer4.png>
          <li class=layer data-depth=0.80><img src=layer5.png>
          <li class=layer data-depth=1.00><img src=layer6.png>
        </ul>
      </div>
		</div>
	</section>
	
	<section class=index-news>
		<div class="row">
          <div class="large-5 small-12 columns">
            <h4 class=index-subtitle>News</h4>
          </div>
          <div class="large-5 small-12 columns">
            <h4 class=index-subtitle>Social Media</h4>
          </div>
		</div>
	</section>
	
	<section class=index-last>
		<div class=row>
          <div class="large-12 small-12 columns">
          
          </div>
		</div>
        <?php
            if(Session::exists('home')) {
	           echo '<p>' . Session::flash('home') . '</p>';
            }
        ?>
	</section>

</main>
<?php

	if($user->hasPermission('admin')) {
		echo '<p>You are an admin</p>';
	}

} else { ?>

    <div class="pure-u-1" id="main">
        <div class="header">
            <h1>Home</h1>
            <h2>Arrhythmia Site.</h2>
        </div>
        
        <div class="content">
            <h2>You need to <a href="login">login</a> or <a href="register">register</a>!</h2>
        </div>
    </div>
<?php
}
?>
</section>