<?php

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
                foreach ($beatmapsA->results() as $beatmapA) {
                    array_push($beatmapsArray, $beatmapA->Name);
                }
                $beatmapsN = $this->_db->get('beatmaps', array('Name', 'LIKE', '%'. escape(Input::get("Keywords")) . '%'));
                foreach ($beatmapsN->results() as $beatmapN) {
                    array_push($beatmapsArray, $beatmapN->Name);
                }
                $beatmapsC = $this->_db->get('beatmaps', array('creator', 'LIKE', '%'. escape(Input::get("Keywords")) . '%'));
                foreach ($beatmapsC->results() as $beatmapC) {
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

<div class="pure-u-1" id="main">
    <div class="header">
        <h1>Beatmaps!</h1>
        <h2>Search for Arrhythmia Beatmaps.</h2>
    </div>

    <div class="content">
        <form class="pure-form pure-g" action="" method="post">
            <div class="pure-u-1-2">
                <label for="Username">Keywords</label>
                <input class="pure-input-1" type="text" name="Keywords" id="Keywords" value="<?php echo escape(Input::get('Keywords')); ?>">
            </div>

            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
            
            <div class="pure-u-1-2">
                <button type="search" class="pure-button pure-button-primary">
                    Login
                </button>
            </div>
        </form>
        <?php
            if (isset($beatmapsArray)) {
                foreach($beatmapsArray as $beatmap) {
                    echo $beatmap . '<br>';
                }
            }
        ?>
    </div>
</div>