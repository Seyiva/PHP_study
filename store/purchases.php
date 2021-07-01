<?php
  include 'elems/init.php' ;
  session_start() ;
  $title = 'my purchases';

  	if (!empty($_SESSION['auth'])) {
        $hey_user =  'Вы зашли как ' . $_SESSION['name_user'] . ' ' . $_SESSION['surname_user'] .
       "<div> <a href=\"logout.php\">logout</a> </br> </div>" ;

       $id_user = $_SESSION['id'] ;

       $query = " SELECT purchases.id as id_purchase, purchases.user_id, purchases.product_id,
                  purchases.date_purchase, products.id as id_product, products.name as name_product,
                  products.price, products.path, users.id as id_user, users.name as name_user  FROM `purchases`
                  LEFT JOIN `users` ON users.id = purchases.user_id
                  LEFT JOIN `products` ON products.id = purchases.product_id WHERE users.id = '$id_user' " ;
       $result = mysqli_query($link, $query) or die(mysqli_error($link));
       for($products = []; $row = mysqli_fetch_assoc($result); $products[] = $row);

        $content = '' ;
        foreach ($products as $product) {
           $content .= "<div class=\"child_for_flex\">
                  <div><img src= \"{$product['path']} \" width=\"200\" height=\"200\"></div>
                  <div>{$product['name_product']} </div>
                  <div>{$product['price']} dollars</div>
                  <div>{$product['date_purchase']}</div>
              </div>" ;
          }

    } else {

      $content = "<div><p> Видеть товары могут только зарегистрированные пользователи </p>
                  <a href=\"login.php\">login</a> OR
                  <a href=\"register.php\">register</a> </div>" ;
    }

  include "elems/layout.php" ;
