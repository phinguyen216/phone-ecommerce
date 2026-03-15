<?php
function insert_taikhoan($username, $password,$email,$tel,$hoten){
    if (empty($username) || empty($password) || empty($email) || empty($tel) || empty($hoten)) {
        return false; 
    }
    $sql = "INSERT INTO taikhoan (username, password, email, tel, hoten) VALUES ('$username', '$password', '$email', '$tel', '$hoten')";
    pdo_execute($sql);
}

function checkuser($username, $password){
    $sql = "SELECT * FROM taikhoan WHERE username = '".$username."' AND password = '".$password."'";
    return pdo_query_one($sql);
}

function checkemail($email){
    $sql = "SELECT * FROM taikhoan WHERE email = '".$email."'";
    return pdo_query_one($sql);
}

function update_taikhoan($id, $username, $password, $email, $tel, $address,$hoten) {
    $sql = "UPDATE taikhoan SET username = '$username', password = '$password', email = '$email', tel = '$tel', address = '$address', hoten = '$hoten' WHERE id = $id";
    return pdo_query_one($sql);
}

function loadall_taikhoan(){
    $sql = "SELECT * FROM taikhoan ORDER BY id DESC";
    $listtk = pdo_query($sql);
    return $listtk;
}

function delete_taikhoan($id){
    $sql = "DELETE FROM taikhoan WHERE id=".$id;
    pdo_execute($sql);
  }
  
?>
