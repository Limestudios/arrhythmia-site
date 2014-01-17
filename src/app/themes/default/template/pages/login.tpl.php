<?php

	if(Input::exists()) {
		if(Token::check(Input::get('token'))) {
			$validate = new Validate();
			$validation = $validate->check($_POST, array(
				'Username' => array(
					'required' => true,
					'min' => 2,
					'max' => 20
				),
				'Password' => array(
					'required' => true,
					'min' => 6
				)
			));

			if($validate->passed()) {
				$user = new User();

				$remember = (Input::get('Remember') === 'on') ? true : false;
				$login = $user->login(Input::get('Username'), Input::get('Password'), $remember);

				if($login) {
					Redirect::to('index');
				} else {
					echo '<div id=flashTop>Sign in failed</div>';
				}
        
			} else {

				echo '<div id="flashTop">';

				foreach ($validation->errors() as $error) {
					echo $error, "<br>";
				}

				echo '</div>';
			}
		}
	}

?>

<main class="pure-u-1" id=main class=main role=main>
    
  <!--<header class=page-header>
    <h1>Login Fool!</h1>
    <h2>Enter your account's information.</h2>
  </header><!-- /.page-header -->

  <section class=page-content>
    <form class="pure-form pure-g" action="" method="post">
        <div class="pure-u-1-2">
            <label for="Username">Username</label>
            <input class="pure-input-1" type="text" name="Username" id="Username" value="<?php echo escape(Input::get('username')); ?>">
        </div>

        <div class="pure-u-1-2">
            <label for="Password">Password</label>
            <input class="pure-input-1" type="password" name="Password" id="Password" autocomplete="off">
        </div>

        <div class="pure-u-1-2">
            <label for="Remember" class="pure-checkbox">
                <input type="checkbox" name="Remember" id="Remember"> Remember Me
            </label>
        </div>

        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
        
        <div class="pure-u-1-2">
            <button type="submit" class="pure-button pure-button-primary">
                Login
            </button>
        </div>
    </form>
  </section><!-- /.page-content -->
  
</main>