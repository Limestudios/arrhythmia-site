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

<div class="pure-u-1" id="main">
    <div class="header">
        <h1>Purchase!</h1>
        <h2>Buy yourself a copy of Arrhythmia.</h2>
    </div>

    <div class="content">
        <p><h2>Coming Soon!</h2></h2></p>
    </div>
</div>