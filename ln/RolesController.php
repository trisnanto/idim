<?php
  require_once '../class/Database.php';
	require_once 'Roles.php';

  if (isset($_POST['simpan'])) {
    $newRoles = new Roles($database);
    $newRoles->setNamaRole($_POST['NamaRole']);
    $newRoles->setKeterangan($_POST['Keterangan']);
    $newRoles->addRole();
    header ("location:form-add-role.php");
  }

?>