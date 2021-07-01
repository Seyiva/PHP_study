<?php
    include 'elems/init.php' ;

      $query = "SELECT `dateart`,`nameart`,`text` FROM articles WHERE id>0 ORDER BY dateart DESC";
      $result = mysqli_query($link, $query) or die(mysqli_error($link));
      for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
      //var_dump($data) ;

      $newArticle = '' ;
      foreach ($data as $elem) {
        $dateart = date('Y-m-d H:i:s', time());
        $dateart = explode(' ', $elem['dateart'] ) ;
        $year = explode('-', $dateart[0] ) ;
        $newArticle .= '<div class="note"> <p>'  ;
        $newArticle .=  '<span class="date">'.$year[2].'.'.$year[1].'.'. $year[0].' '.$dateart[1].' '. '</span>' ;
        $newArticle .= '<span class="name">'.$elem['nameart'].'</span>' ;
        $newArticle .=  '</p>'  ;
        $newArticle .= '<p>'.$elem['text'].'</p> </div>' ;
      }
