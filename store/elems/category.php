<?php
  include 'elems/init.php' ;

  // Выбор категории
  $query = " SELECT * FROM `categories` " ;
  $result = mysqli_query($link, $query) or die(mysqli_error($link));
  for ($categories = []; $row = mysqli_fetch_assoc($result); $categories[] = $row);

?>
<p><b>Select category:</b></p>
<form action="" method="GET">
    <select name="category">
      <option value="">Все категории</option>
        <?php
            foreach ($categories as $category){
              if ($category['category_id'] == 0) { ?>
                <optgroup value="<?=$category['id']?>" label="<?=$category['name']?>">
                <?php foreach ($categories as $sub_category){
                    if($sub_category['category_id'] == $category['id'] ) {
                      if ($_GET['category'] == $sub_category['id']) { ?>
                          <option value="<?=$sub_category['id']?>" selected>
                            <?=$sub_category['name']?>
                          </option>
                <?php } else { ?>
                          <option value="<?=$sub_category['id']?>" >
                            <?=$sub_category['name']?>
                          </option>
                  <?php  }
                    } ?>
                </optgroup>
            <?php }
              }
            } ?>
    </select>
    <input value="Выбрать" type="submit">
</form>
