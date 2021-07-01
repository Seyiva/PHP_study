<?php
  include 'elems/init.php' ;

  // Выбор категории
  $query = "SELECT * FROM category  " ;
  $result = mysqli_query($link, $query) or die(mysqli_error($link));
  for ($categories = []; $row = mysqli_fetch_assoc($result); $categories[] = $row);


?>
<p><b>Select category:</b></p>
<form action="" method="GET">
    <select name="category">
        <option value="">Все категории</option>
        <?php
            foreach ($categories as $category){
                if ($_GET['category'] == $category['id']) {
                  echo "<option value=\"{$category['id']}\" selected>{$category['name']}</option>";
                } else {
                  echo "<option value=\"{$category['id']}\" >{$category['name']}</option>";
                }
            }
        ?>
    </select>
    <input value="Выбрать" type="submit">
</form>
