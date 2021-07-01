<?php
  function createLink($href, $anchor, $uri)
  {
    if ($href ==  $uri) {
      $class = ' class = "active" ' ;
    } else {
      $class = '' ;
    }

    if($href != '/') {
      $href = "/$href/" ;
    }

    echo "<a href=\"$href\"$class>$anchor</a> " ;
  }

  $query = "SELECT * FROM pages WHERE url != '404' ";
  $result = mysqli_query($link, $query) or die(mysqli_error($link));
  for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

  foreach ($data as $page) {
      createLink($page['url'], $page['title'], $uri) ;
  }

?>
