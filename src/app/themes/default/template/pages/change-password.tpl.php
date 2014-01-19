<div class=page-header>
  <h1>Change Password</h1>
  Change the password currently associated with your account
</div>

<?php

	$user = new User();

	if(!$user->isLoggedIn()) {
		Redirect::to('index');
	}

	if(Input::exists()) {
		if(Token::check(Input::get('token'))) {

			$validate = new Validate();
			$validation = $validate->check($_POST, array(
				'password_current' => array(
					'required' => true,
					'min' => 6
				),
				'password_new' => array(
					'required' => true,
					'min' => 6
				),
				'password_new_again' => array(
					'required' => true,
					'min' => 6,
					'matches' => 'password_new'
				)
			));

			if($validation->passed()) {

				if(Hash::make(Input::get('password_current'), $user->data()->salt) !== $user->data()->password) {
					echo 'Your current password is wrong';
				} else {
					$salt = Hash::salt(32);
					$user->update(array(
						'password' => Hash::make(Input::get('password_new'), $salt),
						'salt' => $salt
					));

					Session::flash('home', 'Your password has been changed!');
					Redirect::to('index');				
				}
			} else {
				foreach ($validation->errors() as $error) {
					echo $error, '</br>';
				}
			}

		}
	}
?>

<section class=page-content>
  <div class=wrapper>
    <form class="standard-box blue" action="" method="post">
      <input type="password" name="password_current" id="password_current" placeholder="Current Password">
      <input type="password" name="password_new" id="password_new" placeholder="New Password">
      <input type="password" name="password_new_again" id="password_new_again" placeholder="Repeat New Password">
      <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
      <input type="submit" value="Change">
    </form>
  </div>
</section>