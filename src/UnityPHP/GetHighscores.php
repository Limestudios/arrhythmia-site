<?php
	require_once 'core/Init.php';
    
    $this->_db = DB::getInstance();

	if(Input::exists()) {
		if(Token::check(Input::get('token'))) {
			$validate = new Validate();
			$validation = $validate->check($_POST, array(
				'Keywords' => array(
					'required' => false,
					'min' => 2,
					'max' => 20
				)
			));

			if($validate->passed()) {
				
                $beatmapsArray = array();
                                
                $beatmapsA = $this->_db->get('beatmaps', array('Artist', 'LIKE', '%'. escape(Input::get("Keywords")) . '%'));
                foreach ($this->_db->results() as $beatmapA) {
                    array_push($beatmapsArray, $beatmapA->Name);
                }
                $beatmapsN = $this->_db->get('beatmaps', array('Name', 'LIKE', '%'. escape(Input::get("Keywords")) . '%'));
                foreach ($this->_db->results() as $beatmapN) {
                    array_push($beatmapsArray, $beatmapN->Name);
                }
                $beatmapsC = $this->_db->get('beatmaps', array('creator', 'LIKE', '%'. escape(Input::get("Keywords")) . '%'));
                foreach ($this->_db->results() as $beatmapC) {
                    array_push($beatmapsArray, $beatmapC->Name);
                }
                
                $beatmapsArray = array_unique($beatmapsArray);
                
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

<main class=main role=main>
  <section class=page-content>
    <div class=wrapper>
      <h1>Beatmaps</h1>
        <?php //var_dump($_SESSION); ?>
        <form class="pure-form pure-g" action="" method="post">
            <input class="pure-input-1" type="text" name="Keywords" id="Keywords" value="<?php echo escape(Input::get('Keywords')); ?>">
            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
            <button type="search" class="pure-button pure-button-primary">Search</button>
        </form>
        <?php
            if (isset($beatmapsArray)) {
                foreach($beatmapsArray as $beatmap) {
                    echo $beatmap . '<br>';
                }
            }
        ?>
    </div><!-- /.wrapper -->
  </section><!-- /.page-content -->
</main>