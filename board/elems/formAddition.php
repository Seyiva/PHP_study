<?php
  include 'elems/init.php' ;

  $query = "SELECT * FROM rubric";
  $result = mysqli_query($link, $query);
  for($rubrics = []; $row = mysqli_fetch_assoc($result); $rubrics[] = $row);
?>
<form action="" method="POST">
  name user:<br>
  <input name="name" value="<?= $name ?>" placeholder="Your name" ><br><br>
  announce:<br>
  <input name="announce" value="<?= $announce ?>" placeholder="Your announce" ><br><br>
  details:<br>
  <textarea name="detail" cols="35" rows="20" placeholder="Type your detail in here"><?= $detail ?></textarea><br>
  select of rubric: <br>
    <select name="rubric">
        <?php
        echo "<option>Выбрать рубрику</option>"  ;
        foreach ($rubrics as $rubric){
            echo "<option value=\"{$rubric['id']}\">{$rubric['name']}</option>";
        }
        ?>
    </select>
    <input type="submit" value="Подать">
</form>
