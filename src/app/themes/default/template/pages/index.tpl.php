<?php

if(Session::exists('home')) {
	echo '<p>' . Session::flash('home') . '</p>';
}

$user = new User();
if($user->isLoggedIn()) {
?>

<main role=main>

	<section class=index-title>
		<div class=row>
          <div class="large-12 small-12 columns">
            <h1>Arrhythmia</h1>
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
	</section>

</main>
<?php

	if($user->hasPermission('admin')) {
		echo '<p>You are an admin</p>';
	}

} else {
	echo '<section><p>You need to <a href="login">login</a> or <a href="register">register</a>!</p></section>';
}
?>
</section>