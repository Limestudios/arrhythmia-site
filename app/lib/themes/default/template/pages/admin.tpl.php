<?php
  $user = new User();

  if(!$user->isLoggedIn()) {
    Redirect::to('index');
  }

  if(!$user->hasPermission('admin')) {
    Redirect::to('account');
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
      if($user->isLoggedIn() && $user->hasPermission('admin')) {
      ?>
      
      <div class="account-settings standard-box">
        <h3><a href=update rel=alternate>Update Profile</a></h3><br>
        <h3><a href=change-password rel=alternate>Change Password</a></h3><br>
        <h3><a href=admin-SiteContent rel=alternate>Edit / Update Site Content</a></h3>
      </div>
      <?php } ?>
    </div><!-- /.wrapper -->
  </section><!-- /.page-content -->
</main>