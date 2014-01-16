<?php
    require_once 'core/Init.php';

	if(Input::exists()) {
		if(true) {
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
					echo 'success';
				} else {
					echo '<div id="flashTop">Sorry, logging in failed!</div>';
				}

			} else {

				foreach ($validation->errors() as $error) {
					echo $error, "\n";
				}
                
			}
		}
	}

?>