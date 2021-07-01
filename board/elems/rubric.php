<?php
  include 'elems/init.php' ;

  // Выбор рубрики
  $query = "SELECT * FROM rubric  " ;
  $result = mysqli_query($link, $query) or die(mysqli_error($link));
  for ($rubrics = []; $row = mysqli_fetch_assoc($result); $rubrics[] = $row);


?>
<p><b>Select rubric:</b></p>
<form action="" method="GET">
    <select name="rubric">
      <option value="">Все рубрики</option>
        <?php
        foreach ($rubrics as $rubric){
          if ($_GET['rubric'] == $rubric['id']) {
            echo "<option value=\"{$rubric['id']}\" selected>{$rubric['name']}</option>";
          } else {
            echo "<option value=\"{$rubric['id']}\" >{$rubric['name']}</option>";
          }
        }
        ?>
    </select>
    <input value="Выбрать" type="submit">
</form>
<?php
// после обратного переходы с выбранной рубрики или категории
// if (empty($_GET['rubric']) ) {
//   header('Location: /index.php') ; die() ;
// }  http://board/index.php?rubric=
