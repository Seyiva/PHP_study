<?php
  include 'elems/init.php' ;
  session_start() ;
  $title = 'my basket';

  	if (!empty($_SESSION['auth'])) {
        $hey_user =  'Вы зашли как ' . $_SESSION['name_user'] . ' ' . $_SESSION['surname_user'] .
       "<div> <a href=\"logout.php\">logout</a> </br> </div>" ;

       $query = " SELECT users.id as id_user, users.name, users.surname, products.id as id_product,
                  products.name as name_product, products.price, products.path, baskets.id as id_basket  FROM `baskets`
                  LEFT JOIN `products` ON baskets.product_id = products.id
                  LEFT JOIN `users` ON baskets.user_id = users.id " ;
       $result = mysqli_query($link, $query) or die(mysqli_error($link));
       for($products = []; $row = mysqli_fetch_assoc($result); $products[] = $row);

        $content = '' ;
        foreach ($products as $product) {
           $content .= "<div class=\"child_for_flex\">
                  <div><img src= \"{$product['path']} \" width=\"200\" height=\"200\"></div>
                  <div>{$product['name_product']} </div>
                  <div>{$product['price']} dollars</div>
              </div>" ;
          }

        $order = "<a href=\"\">pay for goods<a>" ;

        // можно было бы еще создать функцию оплаты товара добавляя в таблицу уже купленых товаров `purchases`
    } else {

      $content = "<div><p> Видеть товары могут только зарегистрированные пользователи </p>
                  <a href=\"login.php\">login</a> OR
                  <a href=\"register.php\">register</a> </div>" ;
    }

  include "elems/layout.php" ;
