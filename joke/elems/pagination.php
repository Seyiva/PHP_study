<?php
  include 'elems/init.php' ;

?>

<div>
 <nav>
   <ul class="pagination">
     <?php
     if($page > 1 ) {
        $prev = $page - 1 ;
        if(!empty($_GET['category'])) {
          $forPrev = " <li><a href=\"?category={$_GET['category']}&page=$prev\"  aria-label=\"Previous\">
              <span aria-hidden=\"true\">&laquo;</span></a></li> " ;
        }  else {
          $forPrev = " <li><a href=\"?page=$prev\"  aria-label=\"Previous\">
              <span aria-hidden=\"true\">&laquo;</span></a></li> " ;
        }
        echo $forPrev ;
    } else {
      $forPrev = " <li class=\"disabled\">
        <a href=\"?page=1\"  aria-label=\"Previous\">
          <span aria-hidden=\"true\">&laquo;</span>
        </a>
      </li> " ;
      echo $forPrev ;
    }

     for ($i = 1; $i <= $pagesCount; $i++) {
       if ($page == $i) {
         $class =  " class=\"active\" " ;
       } else {
         $class = '' ;
       }
       if(!empty($_GET['category'])) {
         echo "<li $class><a href=\"?category={$_GET['category']}&page=$i\">$i</a></li>" ;
       } else {
         echo "<li $class><a href=\"?page=$i\">$i</a></li>" ;
       }

     }

     if ($page == $pagesCount ) {
       $forNext = " <li class=\"disabled\"><a href=\"?page=$pagesCount\" aria-label=\"Next\">
           <span aria-hidden=\"true\">&raquo;</span></a></li>  " ;
       echo $forNext;
     }

     if ($page < $pagesCount) {
         $next = $page + 1 ;
         if(!empty($_GET['category'])) {
           $forNext = " <li><a href=\"?category={$_GET['category']}&page=$next\" aria-label=\"Next\">
               <span aria-hidden=\"true\">&raquo;</span></a></li> " ;
         } else {
           $forNext = " <li><a href=\"?page=$next\" aria-label=\"Next\">
               <span aria-hidden=\"true\">&raquo;</span></a></li> " ;
         }
         echo $forNext  ;
     }
    ?>
   </ul>
 </nav>
