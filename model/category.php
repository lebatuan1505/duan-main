<?php
require_once 'pdo.php';

function addCategory($name){
    $sql = "INSERT INTO `danhmuc`(`name_dm`) VALUES ('$name')";
    pdo_execute($sql);
} // thêm danh mục mới
function delete($id_dm){
    $sql="DELETE FROM `danhmuc` WHERE id_dm=$id_dm";
    pdo_query_one($sql);
}//xóa 1 danh mục theo id
function loadAll(){
    $sql="SELECT * FROM `danhmuc`";
    $listCat = pdo_query($sql);
    return $listCat;
}//tải tất cả danh mục từ bảng danh mục 
function LoadById($id_dm){
    $sql="SELECT * FROM `danhmuc` WHERE id_dm = $id_dm";
    $info = pdo_query($sql);
    return $info;
}// tải danh mục dựa theo id
function update_category($id_dm ,$name){
$sql = "UPDATE `danhmuc` SET `name_dm`='$name' WHERE id_dm = $id_dm";
pdo_execute($sql);
}// cập nhật danh mục dựa trên id
function   updateCategory($id_dm,$name){
    $sql= "UPDATE `danhmuc` SET `name_dm`='$name' WHERE id_dm = $id_dm";
    pdo_execute($sql);
}// cập nhật tên danh mục dựa trên id
function nameById($id_dm){
    $sql= "SELECT name_dm FROM `danhmuc` WHERE id_dm = $id_dm ";
    $name = pdo_query_one($sql);
    return $name;
}// lấy tên danh mục dựa trên id

function check_dm($name_dm){
    $sql="SELECT name_dm FROM danhmuc WHERE name_dm = '$name_dm'";
    return pdo_query_one($sql);
}//kiểm tra sự tồn tại của danh mục


?>