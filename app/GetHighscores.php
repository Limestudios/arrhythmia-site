<?php
    /*
     * Here we setup the a signup page
     * Showing an example of using a template within another template
     * here we put the signup form inside our main template
     */

    require_once 'lib/core/Init.php';

    $db = DB::getInstance();

    if(Input::exists()) {
        if(Input::get('secret_key') == Config::get('mysql/secret_key')) {
            $validate = new Validate();
            $validation = $validate->check($_POST, array(
                'beatmap' => array(
                    'required' => true
                ),
                'orderBy' => array(
                    'required' => true
                )
            ));

            if($validate->passed()) {

                $orderBy = Input::get('orderBy');
                
                if(!Input::get('amount')) {
                    $amount = 10;
                } else {
                    $amount = Input::get('amount');
                }

                if(!Input::get('order')) {
                    $order = 'ASC';
                } else {
                    $order = Input::get('order');
                }

                $scoresRaw = $db->getAmount('highscores', array('beatmap', '=', Input::get('beatmap')), $amount, $orderBy, $order);
                $scores = $scoresRaw->results();
                $count = $scoresRaw->count();
                $x = 0;

                echo '{';
                foreach ($scores as $value) {
                    if($count-1 == $x)
                        echo '"'.$x.'":{"user":"'.$value->user.'","score":"'.$value->score.'"}';
                    else
                        echo '"'.$x.'":{"user":"'.$value->user.'","score":"'.$value->score.'"},';

                    $x++;
                }
                echo '}';

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