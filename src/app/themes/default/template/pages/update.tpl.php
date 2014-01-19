
<div class=page-header>
  <h1>Update Name</h1>
  Change the name currently associated with your account
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
          'name' =>array(
            'required' => true,
            'min' => 2,
            'max' => 50
          )
        ));
        if($validation->passed()) {
          try {
            $user->update(array(
              'name' => Input::get('name')
            ));
  
            Session::flash('home', 'Your details have been updated.');
            Redirect::to('index');
          } catch(Exception $e) {
            die($e->getMessage());
          }
        } else {
          foreach ($validation->errors() as $error) {
            echo $error, '</br>';
          }
        }
      }
    }
  ?>

	<section class="page-content">
    <div class=wrapper>
      <form class="standard-box blue" action="" method="post">
        <input type=text name="name" value="<?php echo escape($user->data()->name); ?>">
        <input type=hidden name="token" value="<?php echo Token::generate(); ?>">
        <input type=submit value="Update">
      </form>
    </div>
  </section>

		</div>
	</div>
</div>