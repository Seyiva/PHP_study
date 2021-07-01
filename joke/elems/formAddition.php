<?php
  include 'elems/init.php' ;
  
  $query = "SELECT * FROM category";
  $result = mysqli_query($link, $query);
  for($categories = []; $row = mysqli_fetch_assoc($result); $categories[] = $row);
?>
<form action="" method="POST">
  name user:<br>
  <input name="name" value="<?= $name ?>" placeholder="Your name" ><br><br>
  text joke:<br>
  <textarea name="joke" cols="35" rows="20" placeholder="Type your joke in here"><?= $joke ?></textarea><br>
  select of category: <br>
    <select name="category">
        <?php
        foreach ($categories as $category){
            echo "<option value=\"{$category['id']}\">{$category['name']}</option>";
        }
        ?>
    </select>
    <input type="submit" value="Предложить">
</form>
