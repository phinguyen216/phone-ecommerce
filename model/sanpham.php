<?php
function insert_sanpham($name,$mota,$img,$price,$stock,$iddm){
  $sql = "INSERT INTO sanpham(name,mota,img,price,stock,iddm) values('$name','$mota','$img','$price',$stock,'$iddm')";
  pdo_execute($sql);
}
function loadall_sanpham($kyw = "", $iddm = 0) {
    $sql = "SELECT * FROM sanpham WHERE 1"; 
    
    if ($kyw != "") {
        $sql .= " AND name LIKE '%" . $kyw . "%'";
    }
    if ($iddm > 0) {
        $sql .= " AND iddm = '" . $iddm . "'";
    }
    
    $sql .= " ORDER BY id DESC";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

  function delete_sanpham($id){
    $sql = "DELETE FROM sanpham WHERE id=".$id;
    pdo_execute($sql);
  }
  
  function loadOne_sanpham($id){
    $sql = "SELECT * FROM sanpham WHERE id=".$id;
    $sp = pdo_query_one($sql);
    return $sp;
  }
  
  function update_sanpham($id, $name, $mota, $img, $price, $stock, $iddm) {
    if ($img != "") {
        $sql = "UPDATE sanpham SET name='$name', mota='$mota', img='$img', price='$price', stock='$stock', iddm='$iddm' WHERE id=".$id;
    } else {
        $sql = "UPDATE sanpham SET name='$name', mota='$mota', price='$price', stock='$stock', iddm='$iddm' WHERE id=".$id;
    }
    pdo_execute($sql);
}

?> 