<?php 
    $open = "category";
    require_once __DIR__ . '/../../autoload/autoload.php'; 
  
    $id = intval(getInput('id'));

    $EditCategory = $db->fetchID('category',$id);

    if(empty($EditCategory)){
        $_SESSION['success'] = "Dữ liệu không tồn tại";
        redirectAdmin("category/indext.php");
    }
    /**
     * kiêm tra xem danh mục có sản phẩm k
     */

     $is_product = $db -> fetchOne('product', " category_id = $id ");
    if($is_product == NULL){ 
        $num  = $db -> delete('category',$id);
        if($num >0){
            $_SESSION['success'] = "xóa thành công";
            redirectAdmin("category/indext.php");
        }
        else{
            $_SESSION['error'] = "Dữ liệu không tồn tại";
            redirectAdmin("category/indext.php");
        }
    }
    else{
        $_SESSION['error'] = "Danh mục có sản phẩm bạn không thể xóa    ";
        redirectAdmin("category/indext.php");
    }

?>
