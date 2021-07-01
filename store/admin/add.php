<?php
    include '../elems/init.php' ;
    session_start() ;
    if (!empty($_SESSION['auth']) and $_SESSION['status'] == 'admin' ) {

      function getProduct($info = '') {
        $title = 'adding new product' ;

        if (isset($_POST['name']) and isset($_POST['price']) and isset($_POST['quantity'])
            and isset($_POST['category_id']) and isset($_POST['path'])) {
            $nameproduct = $_POST['name']  ;
            $price = $_POST['price'] ;
            $quantity = $_POST['quantity'] ;
            $path = $_POST['path'] ;
            $category_id = $_POST['category_id'] ;
          } else {
            $nameproduct = '' ;
            $price = '' ;
            $quantity = '' ;
            $path = '' ;
            $category_id = '' ;
          }


        ob_start() ;
        include 'elems/formEdition.php ' ;
        $content = ob_get_clean() ;
        include "elems/layout.php" ;
    }

    function addProduct($link)
    {
        if ( isset($_POST['name']) and isset($_POST['price']) and isset($_POST['quantity'])
            and isset($_POST['category_id']) and isset($_POST['path']) ) {
            $nameproduct = mysqli_real_escape_string($link,$_POST['name']) ;
            $price = mysqli_real_escape_string($link,$_POST['price']) ;
            $quantity = mysqli_real_escape_string($link,$_POST['quantity']) ;
            $path = mysqli_real_escape_string($link,$_POST['path']) ;
            $category_id = mysqli_real_escape_string($link,$_POST['category_id']) ;

            $query = "SELECT COUNT(*) as count FROM `products` WHERE `name` = '$nameproduct' ";
            $result = mysqli_query($link, $query) or die(mysqli_error($link));
            $isProduct = mysqli_fetch_assoc($result)['count'];

            if($isProduct) {
              $_SESSION['message'] = [
                'text' => 'Product with this name already exists!',
                'status' => 'error'
              ] ;

            } else {
              $query = "INSERT INTO `products` (`name`, `price`, `quantity`, `path`, `category_id`)
                        VALUES ('$nameproduct','$price','$quantity','$path','$category_id') ";
              mysqli_query($link, $query) or die(mysqli_error($link));

              $_SESSION['message'] = [
                  'text' => 'Product added successfully!',
                  'status' => 'success'
                ] ;

              header('Location: /admin/goods.php') ; die() ;
            }
        } else {
          return '' ;
        }
      }
      $info = addProduct($link) ;
      getProduct($info) ;

    } else {
        header('Location: ../login.php') ; die() ;
    }
