<?php
function insert_cart($iduser, $id, $img, $name, $price, $soluong, $thanhtien, $idbill) {

    $sql_check = "SELECT * FROM cart 
                  WHERE iduser = $iduser AND name = '$name' AND idbill = 0";
    $sl = pdo_query_one($sql_check);

    if ($sl) {
        $sl_moi = $sl['soluong'] + $soluong;
        $thanhtien_moi = $price * $sl_moi;

        $sql_update = "UPDATE cart 
                       SET soluong = $sl_moi, thanhtien = $thanhtien_moi 
                       WHERE id = " . $sl['id'];
        pdo_execute($sql_update);

    } else {
        $sql_insert = "INSERT INTO cart 
            (iduser, idpro, img, name, price, soluong, thanhtien, idbill)
            VALUES ($iduser, $id, '$img', '$name', $price, $soluong, $thanhtien, $idbill)";

        pdo_execute($sql_insert);
    }
}

function load_cart_by_user($iduser) {
    $sql = "SELECT * FROM cart WHERE iduser = $iduser AND idbill = 0";
    return pdo_query($sql);
}

function load_cart_total($iduser) {
    $sql = "SELECT SUM(thanhtien) AS total FROM cart WHERE iduser = $iduser AND idbill = 0";
    return pdo_query_one($sql);
}

function delete_cart($id) {
    $sql = "DELETE FROM cart WHERE id = $id";
    return pdo_execute($sql);
}

function update_cart($id, $soluong) {
    $sql = "UPDATE cart SET soluong = $soluong WHERE id = $id";
    pdo_execute($sql);
}


function update_cart_quantity($id, $soluong, $thanhtien) {
    $sql = "UPDATE cart SET soluong = :soluong, thanhtien = :thanhtien WHERE id = :id";
    pdo_execute($sql, [
        'soluong' => $soluong,
        'thanhtien' => $thanhtien,
        'id' => $id
    ]);
}


?>
