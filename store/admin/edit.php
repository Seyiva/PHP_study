<?php
  include '../elems/init.php' ;
  session_start() ;
  if (!empty($_SESSION['auth']) and $_SESSION['status'] == 'admin' ) {
    //открываем функцию и записываем $link , чтобы получать данные из БД
    function getProduct($link)
    {
      $title = 'admin edit page' ;

      if(isset($_GET['id'] )){
        $id = $_GET['id'] ;

        $query = "SELECT products.id, products.name, products.price,
                  products.quantity, products.path, products.category_id, categories.name as name_category FROM `products`
                  LEFT JOIN `categories` ON categories.id = products.category_id WHERE products.id='$id' ";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        $product = mysqli_fetch_assoc($result);

        if ($product) {
          $productExists = true ;

          if (isset($_POST['name']) and isset($_POST['price']) and isset($_POST['quantity'])
              and isset($_POST['category_id']) and isset($_POST['path'])) {
              $nameproduct = $_POST['name']  ;
              $price = $_POST['price'] ;
              $quantity = $_POST['quantity'] ;
              $path = $_POST['path'] ;
              $category_id = $_POST['category_id'] ;

              $productExists = true ;
          } else {
              $nameproduct = $product['name']  ;
              $price = $product['price'] ;
              $quantity = $product['quantity'] ;
              $path = $product['path'] ;
              $category_id = $product['category_id'] ;
          }

          ob_start() ;
          include 'elems/formEdition.php ' ;
          $content = ob_get_clean() ;
        } else {
          $content = ''; //если продукта с таким id нет , то $ возвращает пустую строку, или продукт не найден
        }
      }
        include "elems/layout.php" ;
    }
    function addProduct($link)
    {
        if (isset($_POST['name']) and isset($_POST['price']) and isset($_POST['quantity'])
            and isset($_POST['category_id']) and isset($_POST['path'])) {
              $nameproduct = mysqli_real_escape_string($link,$_POST['name']) ;
              $price = mysqli_real_escape_string($link,$_POST['price']) ;
              $quantity = mysqli_real_escape_string($link,$_POST['quantity']) ;
              $path = mysqli_real_escape_string($link,$_POST['path']) ;
              $category_id = mysqli_real_escape_string($link,$_POST['category_id']) ;

              if(isset($_GET['id'])) {
                $id = $_GET['id'] ;

                $query = "SELECT products.id, products.name, products.price,
                          products.quantity, products.path, products.category_id, categories.name as name_category FROM `products`
                          LEFT JOIN `categories` ON categories.id = products.category_id WHERE products.id='$id' ";
                $result = mysqli_query($link, $query) or die(mysqli_error($link));
                $product = mysqli_fetch_assoc($result);
                // редактировать продукт
                $query = "UPDATE `products` SET name = '$nameproduct', price = '$price', quantity = '$quantity',
                          path = '$path', category_id = '$category_id' WHERE id = $id";
                mysqli_query($link, $query) or die(mysqli_error($link));

                $_SESSION['message'] = [
                    'text' => "Product '{$product['name']}' edited successfully",
                    'status' => 'success'
              ] ;
              header("Location: /admin/goods.php") ; die() ;
            }
          } else {
            return '' ;
          }
    }
    addProduct($link);
    getProduct($link);

  } else {
      header('Location: ../login.php') ; die() ;
  }
