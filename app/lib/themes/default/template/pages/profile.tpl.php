<main class="main profile-page" role=main>
  <header class=page-header>
    <div class=wrapper>
      <h1>Public Profile</h1>
      How everyone else sees your account
    </div><!-- /.wrapper -->
  </header><!-- /.page-header -->
  <section class=page-content>
    <div class=wrapper>
      <?php
      if(!$username = $this->value) {
        Redirect::to('index');
      } else {
        $user = new User($username);
        if(!$user->exists()) {
          Redirect::to(404);
        } else {
          $data = $user->data();
        }
      ?>
      <div class="profile-details standard-box">
        <h3><span>Your username</span> <?php echo escape($data->username); ?></h3><br>
        <h3><span>Your name</span> <?php echo escape($data->name); ?></h3><br>
        <h3><span>Your e&ndash;mail address</span> <?php echo escape($data->email); ?></h3>
      </div>
      <?php
        }
      ?>
    </div><!-- /.wrapper -->
  </section><!-- /.page-content -->
</main>