<?php
  $user = new User();

  if(!$user->isLoggedIn()) {
    Redirect::to('index');
  }

  if(!$user->hasPermission('admin')) {
    Redirect::to('index');
  }

  $siteContent = Config::getDBSiteContentAll();
  //print_r($siteContent);

  if(Input::exists()) {
    if(Token::check(Input::get('token'))) {

      $validate = new Validate();
      $validation = $validate->check($_POST, array(
        'titleRaw' => array(
          'required' => true,
          'min' => 2
        ),
        'contentRaw' => array(
          'required' => true,
          'min' => 2
        )
      ));

      if($validation->passed()) {
        try {
          $Markdown_Parser = new Markdown;
          $contentRaw = Input::get('contentRaw');
          $contentLink = Config::get('site/homeurl').'/app/themes/'.Config::get('site/theme');
          $contentMD = str_replace('[site/homeurl]', $contentLink, $contentRaw);
          $contentMD = $Markdown_Parser->defaultTransform($contentMD); 

          Config::updateDBSiteContent(Input::get('formName'), array(
            'titleRaw' => Input::get('titleRaw'),
            'content' => $contentMD,
            'contentRaw' => Input::get('contentRaw')
          ));

          Session::flash('home', 'Your details have been updated.');
          Redirect::to('admin');
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

<main class=main id=main role=main>
  
  <header class=page-header>
    <div class=wrapper>
      <h1>Profile Settings</h1>
    </div><!-- /.wapper -->
  </header><!-- /.page-header -->
  
  <section class=page-content>
    <div class=wrapper>
      <?php
        if(Session::exists('home')) {
         echo '<p>' . Session::flash('home') . '</p>';
        }

        $user = new User();
        if($user->isLoggedIn()) {
      ?>
      
      <div class="account-settings standard-box">
             //<?php var_dump($_SESSION); ?>
        <h3>Edit News</h3>
        <form class="blue" action="" method="post">
          <input type="text" name="titleRaw" id="titleRaw" placeholder="<?php echo $siteContent['news']['titleRaw']; ?>" value="<?php echo $siteContent['news']['titleRaw']; ?>">
          <textarea name="contentRaw" id="contentRaw" rows="6" value="<?php echo $siteContent['news']['contentRaw']; ?>"><?php echo $siteContent['news']['contentRaw']; ?></textarea>
          <section class=preview><?php echo $siteContent['news']['content']; ?></section>
          <input type="hidden" name="token" value="<?php echo $tokenGen = Token::generate(); ?>">
          <input type="hidden" name="formName" value="news">
          <input type="submit" value="Change">
        </form>
        <hr>
        <h3>Edit About</h3>
        <form class="blue" action="" method="post">
          <input type="text" name="titleRaw" id="titleRaw" placeholder="<?php echo $siteContent['about']['titleRaw']; ?>" value="<?php echo $siteContent['about']['titleRaw']; ?>">
          <textarea name="contentRaw" id="contentRaw" rows="6" value="<?php echo $siteContent['about']['contentRaw']; ?>"><?php echo $siteContent['about']['contentRaw']; ?></textarea>
          <section class=preview><?php echo $siteContent['about']['content']; ?></section>
          <input type="hidden" name="token" value="<?php echo $tokenGen; ?>">
          <input type="hidden" name="formName" value="about">
          <input type="submit" value="Change">
        </form>
      </div>

      <?php
        if(!$user->hasPermission('admin')) {
          Redirect::to('account');
        }
      } else {
      ?>
      <div class="account-settings standard-box red">
        <p>You need to either <a href=login class=line>sign in</a> or <a href=register class=line>register</a> an account.</p>
      </div>
      <?php
      }
      ?>
    </div><!-- /.wrapper -->
  </section><!-- /.page-content -->
  
</main>