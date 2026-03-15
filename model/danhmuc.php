<?php
  function loadAll_danhmuc(){
    $sql = "select * from danhmuc";
    return pdo_query($sql);
  }
  function insert_danhmuc($name){
    $sql = "INSERT INTO danhmuc (name) VALUES ('$name')";
    pdo_execute($sql);
  }
  function delete_danhmuc($id){
    $sql = "DELETE FROM danhmuc WHERE id =" .$id;
    pdo_execute($sql);
  }
  function loadOne_danhmuc($id){
    $sql = "SELECT * FROM danhmuc WHERE id =" .$id;
    $dm = pdo_query_one($sql);
    return $dm;
  }
  function update_danhmuc($id,$name){
    $sql = "UPDATE danhmuc SET name = '$name' WHERE id =" .$id;
    pdo_execute($sql);
  } 
?>