<?php
    /*
     * Here we setup the a signup page
     * Showing an example of using a template within another template
     * here we put the signup form inside our main template
     */
?>

    <form class="blue" action="GetHighscores.php" method="post">
      <input type="hidden" name="secret_key" value="OMGWTFBBQ">
      <input type="text" name="beatmap" value="BattleCube">
      <input type="text" name="amount" value="4">
      <input type="text" name="orderBy" value="score">
      <input type="text" name="order" value="DESC">
      <input type="submit" value="Change">
    </form>