<?php
  include 'elems/init.php' ;
  session_start() ;
  $title = 'store online';

  	if (!empty($_SESSION['auth'])) {
        $hey_user =  'Вы зашли как ' . $_SESSION['name_user'] . ' ' . $_SESSION['surname_user'] .
       "<div> <a href=\"logout.php\">logout</a> </br> </div>" ;

       if($_SESSION['status'] == 'admin') {
           $link_admin = "<a href=\"/admin/index.php\"> admin </a> <br> " ;
         }

       if ( empty($_GET['category'])) {
         // Вывод всех товаров из БД
         $query = " SELECT products.id as id_product, products.name, products.price,
                    products.quantity, products.path, products.category_id FROM `products` " ;
         $result = mysqli_query($link, $query) or die(mysqli_error($link));
         for($products = []; $row = mysqli_fetch_assoc($result); $products[] = $row);

          $content = '' ;
          foreach ($products as $product) {
             $content .= "<div class=\"child_for_flex\">
                    <div><img src= \"{$product['path']} \" width=\"200\" height=\"200\"></div>
                    <div>{$product['name']} </div>
                    <div>{$product['price']} dollars</div>
                    <div><a href=\"?in_basket={$product['id_product']}\" type=\"submit\"> в корзину </a> </div>
                </div>" ;
            }

        } elseif ( !empty($_GET['category'])) {
            $output_category = $_GET['category'] ;

            // Вывод товаров по категории
            $query = " SELECT products.id as id_product, products.name, products.price,
                        products.quantity, products.path, products.category_id FROM `products`
                        WHERE  category_id = '$output_category'" ;
            $result = mysqli_query($link, $query) or die(mysqli_error($link));
            for($products = []; $row = mysqli_fetch_assoc($result); $products[] = $row);

            $content = '' ;
            foreach ($products as $product) {
               $content .= "<div class=\"child_for_flex\">
                      <div><img src= \"{$product['path']} \" width=\"200\" height=\"200\"></div>
                      <div>{$product['name']} </div>
                      <div>{$product['price']} dollars</div>
                      <div><a href=\"?in_basket={$product['id_product']}\" type=\"submit\"> в корзину </a> </div>
                  </div>" ;
              }
          }
          // чтобы не было ?category= в url
          if(isset($_GET['category']) and $_GET['category'] ==  '' ) {
            header('Location: index.php');
          }

         // дальше пишем функцию на добавление в корзину
        function addProduct($link) {
          if( isset($_GET['in_basket']) ){
             $id_product = $_GET['in_basket'];

             $id_user = $_SESSION['id'] ;

             $query = "SELECT products.id, products.name,products.price,products.quantity FROM `products`
                       WHERE id = '$id_product' " ; // получаем выбранный продукт
             $result = mysqli_query($link, $query) or die(mysqli_error($link));

             $query = "INSERT INTO baskets SET user_id='$id_user',  product_id = '$id_product' ";
             mysqli_query($link, $query) or die(mysqli_error($link));
             header('Location: index.php');
          }
        }
        addProduct($link) ;

    } else {

      $content = "<div><p> Видеть товары могут только зарегистрированные пользователи </p>
                  <a href=\"login.php\">login</a> OR
                  <a href=\"register.php\">register</a> </div>" ;
    }


  include "elems/layout.php" ;
