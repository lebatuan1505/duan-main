<?php

    function select_hoadon($kyc, $sgia)
    {
        if ($kyc != "") {
            $sql = "select * from bill inner join user on bill.id_user = user.id_user where 1 and id_bill =" . $kyc;
        } else if ($sgia > 0) {
            $sql = "select * from bill inner join user on bill.id_user = user.id_user where 1 and tongbill >=" . $sgia;
        }else{
            $sql = "select * from bill inner join user on bill.id_user = user.id_user order by id_bill desc";
        }
        $listhd = pdo_query($sql);
        return $listhd;
    }   // lấy danh sánh hóa đơn

function loadBill(){
    $sql = "SELECT * FROM `bill` as bi
    INNER JOIN `user` as us 
    ON bi.id_user = us.id_user
    ORDER BY id_bill DESC";
    $resutl = pdo_query($sql);
    return $resutl;
} // lấy tất cả các bill    
function select_billhoadon(){
    $sql = "select * from cart order by id_cart desc";
    $listbhd = pdo_query($sql);
    return $listbhd;
}// lấy danh sách từ bảng
function capnhat_tthd($trangthain, $id_bill)
{
    $sql = "update bill set trangthai='" . $trangthain . "' where id_bill=" . $id_bill;
    pdo_execute($sql);
}// cập nhật trạng thái hóa đơn
function loadBill_admin($page,$soSp){
    if (empty($page) || $page == 0) {
        $page = 1;
    }

    $batdau = ($page - 1) * $soSp;
    // Sửa lại cách nối chuỗi trong truy vấn
    $sql = "SELECT * FROM `bill` as bi
    INNER JOIN `user` as us 
    ON bi.id_user = us.id_user
    WHERE id_bill 
    LIMIT ".$batdau.",".$soSp;
    $list = pdo_query($sql);
    return $list;
} // lấy danh sách hóa đơn
function  hien_thi_so_trang_order($total,$soSp){
    $product = count($total);
    $number = ceil($product / $soSp);
    $html = ""; 
    for($i=1; $i <= $number; $i++){
        $html .= ' <a class="page-link text-black" href="index.php?act=list-carts&page='.$i.'">'.$i.'</a>';
    }
    return $html;
}// hiển thị các liên kết phân trang dựa trên tổng số hóa đơn và số hóa đơn trên mỗi trang
function content($content){
    $sql = "SELECT * FROM `bill` as bi
    INNER JOIN `user` as us 
    ON bi.id_user = us.id_user WHERE id_bill = $content";
    $resutl = pdo_query($sql);
    return $resutl;
} //Hàm này lấy thông tin chi tiết của một hóa đơn dựa trên ID của hóa đơn
function hien_thi($total,$soSp){
    $product = count($total);
    $number = ceil($product / $soSp);
    $html = ""; 
    for($i=1; $i <= $number; $i++){
        $html .= ' <a class="page-link text-black" href="index.php?act=list-carts&page='.$i.'">'.$i.'</a>';
    }
    return $html;
} // Hàm này tương tự như hien_thi_so_trang_order nhưng có thể dành cho mục đích khác
?>