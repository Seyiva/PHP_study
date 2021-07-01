<?php
  include 'elems/init.php' ;

  $query = "SELECT login FROM users";
  $result = mysqli_query($link, $query) or die(mysqli_error($link));
  for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
?>
<form action="" method="POST">
  theme:<br>
  <input name="theme" value="<?= $theme ?>" placeholder="Your theme" ><br><br>
  text:<br>
  <textarea name="note" cols="35" rows="20" placeholder="Type your detail in here"><?= $note ?></textarea><br>

  <input type="submit" value="Предложить тему">
</form>
