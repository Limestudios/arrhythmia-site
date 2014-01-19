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
<main class=main role=main>
  <section class="page-content page-special">
    <div class=wrapper>
      <form class="form-special sign-in" action="" method="post">
        <div class=form-special-wrapper>
          <h3>Sign In</h3>
          <input type=text name=Username id=Username placeholder=Username value="<?php echo escape(Input::get('username')); ?>" autocomplete=on>
          <input type=password name=Password id=Password placeholder=Password autocomplete=on>
          <!--<input type=checkbox name=Remember id=Remember><label>Remember Me</label>-->
          <input type=hidden name=token value="<?php echo Token::generate(); ?>">
        </div>
        <input class="form-special-button left-button" type=submit value="Sign In">
        <a class="form-special-button button-right" href=register>Register</a>
      </form><!-- /.sign-in-form -->
    </div><!-- /.wrapper -->
  </section><!-- /.page-content -->
</main>