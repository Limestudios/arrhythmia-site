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
        <h3><a href=update rel=alternate>Update Profile</a></h3><br>
        <h3><a href=change-password rel=alternate>Change Password</a></h3>
      </div>
      <?php
        if($user->hasPermission('admin')) {
          echo '<div class="account-settings standard-box red error">
                  <p>You are an admin.</p>
                </div>';
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