<!-- mulai form -->
<div class="container-fluid">
  <div class="col-md-7 col-md-offset-2">
    <form class="form-horizontal" method="post" action="Roles_simpan.php">
      <legend>Form Input Roles </legend>
      <div class="form-group">
        <label for="NamaRoles" class="col-md-2">Nama Roles</label>
        <div class="col-md-7">
          <input required type="text" class="form-control" id="NamaRoles" placeholder="nama Roles" name="NamaRoles">
        </div>
      </div>
      <br>
      <div class="form-group">
        <div div class="col-md-7 col-md-offset-2">
          <input type="submit" class="btn btn-primary" name="simpan" value="simpan">
          <a class="btn btn-danger" href="index.php" role="button">Batal</a>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- akhir form -->