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
					echo '<div id="flashTop">Sorry, logging in failed!</div>';
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
<main class="main coming-soon" role=main>
  <header class=page-header>
    <h1>Soon</h1>
    Arrhythmia has not officially been released yet.<br>
    Check back for more infomation.
  </header><!-- /.page-header -->
</main>