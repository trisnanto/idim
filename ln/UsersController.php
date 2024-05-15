<?php
  require_once '../class/Database.php';
	require_once 'User.php';

  if (isset($_POST['simpan'])) {
    $newUser = new User($database);
    $newUser->setUsername($_POST['Username']);
    $newUser->setPassword($_POST['Password']);
    $newUser->setNamaDepan($_POST['NamaDepan']);
    $newUser->setNamaBelakang($_POST['NamaBelakang']);
    $newUser->setAlamat($_POST['Alamat']);
    $newUser->setHp($_POST['Hp']);
    $newUser->setIdRole($_POST['IdRole']);
    $newUser->addUser();
    header ("location:form-add-user.php");
  } else if (isset($_POST['edit'])) {
    $newUser = new User($database);
    $newUser->setIdUser($_POST['IdUser']);
    $newUser->setUsername($_POST['Username']);
    $newUser->setPassword($_POST['Password']);
    $newUser->setNamaDepan($_POST['NamaDepan']);
    $newUser->setNamaBelakang($_POST['NamaBelakang']);
    $newUser->setAlamat($_POST['Alamat']);
    $newUser->setHp($_POST['Hp']);
    $newUser->setIdRole($_POST['IdRole']);
    $newUser->updateUser();
    header ("location:form-add-user.php");
  }

?>