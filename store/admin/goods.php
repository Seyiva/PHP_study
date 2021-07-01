<?php
    include '../elems/init.php' ;
    session_start() ;
    if (!empty($_SESSION['auth']) and $_SESSION['status'] == 'admin' ) {

      $title = 'goods' ;
      // Получить все товары
      $query = " SELECT products.id, products.name as name_product, products.price,
                      products.quantity, products.path, products.category_id, categories.name as name_category FROM `products`
                      LEFT JOIN `categories` ON categories.id = products.category_id " ;

       $result = mysqli_query($link, $query) or die(mysqli_error($link));
       for($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

       $content = '<table>
             <tr>
               <th>name_product</th>
               <th>price</th>
               <th>quantity</th>
               <th>path for image</th>
               <th>number and name of category</th>
               <th>delete of product</th>
               <th>edit of product</th>
             </tr>' ;
       foreach ($data as $product) {
               $content .= " <tr>
                 <td>{$product['name_product']} </td>
                 <td>{$product['price']} </td>
                 <td>{$product['quantity']} </td>
                 <td>{$product['path']} </td>
                 <td>{$product['category_id']} products.category_id, {$product['name_category']} </td>
                 <td><a href=\"?delete={$product['id']}\">delete</a></td>
                 <td><a href=\"edit.php?id={$product['id']}\">edit</a></td>
               </tr>" ;
       }
       $content .= '</table>' ;

       function deleteProduct($link)
       {
           if(isset($_GET['delete'])) {
             $id = $_GET['delete'] ;
             $query = "DELETE FROM `products` WHERE id=$id";
             mysqli_query($link, $query) or die(mysqli_error($link));

             $_SESSION['message'] = [
               'text' => "Product deleted successfully",
               'status' => 'success'
             ] ;

           }
         }
       deleteProduct($link) ;

     include "elems/layout.php" ;
    }
