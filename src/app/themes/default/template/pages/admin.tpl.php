<?php

  $user = new User();

  if(!$user->isLoggedIn()) {
    Redirect::to('index');
  }

  if(!$user->hasPermission('admin')) {
    Redirect::to('index');
  }

  $siteContent = Config::getDBSiteContent('news');
  print_r($siteContent);

  if(Input::exists()) {
    if(Token::check(Input::get('token'))) {

      $validate = new Validate();
      $validation = $validate->check($_POST, array(
        'news_title' => array(
          'required' => true,
          'min' => 2
        ),
        'news_content' => array(
          'required' => true,
          'min' => 2
        )
      ));

      if($validation->passed()) {
        try {
          $Markdown_Parser = new Markdown;
          $contentMD = $Markdown_Parser->transform(Input::get('news_content')); 

          Config::updateDBSiteContent('news', array(
            'title' => Input::get('news_title'),
            'content' => $contentMD//,
            //'content' => Input::get('news_content')
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
        <section>
          <h3>Edit News</h3>
          <form class="standard-box blue" action="" method="post">
            <input type="text" name="news_title" id="news_title" placeholder="<?php echo $siteContent['title']; ?>" value="<?php echo $siteContent['title']; ?>">
            <textarea name="news_content" id="news_content" rows="6" value="<?php echo $siteContent['content']; ?>">
              <?php echo $siteContent['content']; ?>
            </textarea>
            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
            <input type="submit" value="Change">
          </form>
        </section>
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