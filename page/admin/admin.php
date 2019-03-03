<?php session_start();
if($_SESSION && $_SESSION['login'] == "admin"){
?>
<?php
require_once('../../db/config.php');
require_once('assets/header.php');
$db = new database();
?>
<!-- WARNING START CONTENT ------------------------------------------------- -->

<div class="content">
  <div class="content-font">
    <center>
      <h1>Data Admin</h1></center><hr>
      <a href="admin_form.php"><button class="button">Tambah Data</button></a><br><br>
      <table border="1" width="100%">
        <tr>
          <th>ID Admin</th>
          <th>Username</th>
          <th>Password</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Telepon</th>
          <th>Email</th>
          <th colspan="2">Action</th>
        </tr>
          <?php foreach ($db->tampil('admin') as $d) { ?>
            <tr style="text-align: center;">
              <td><?php echo $d['id_admin'] ?></td>
              <td><?php echo $d['username'] ?></td>
              <td><?php echo $d['password'] ?></td>
              <td><?php echo $d['firstname'] ?></td>
              <td><?php echo $d['lastname'] ?></td>
              <td><?php echo $d['telepon'] ?></td>
              <td><?php echo $d['email'] ?></td>
              <td>
                <form class="" action="admin_form.php" method="post">
                  <input type="hidden" name="id_admin" value="<?php echo $d['id_admin'] ?>">
                  <input type="hidden" name="table" value="Admin">
                  <input type="submit" name="edit" value="Edit" class="button button1">
                </form>
              </td>
              <td>
                <form class="" action="action/admin_act.php" method="post">
                  <input type="hidden" name="id_admin" value="<?php echo $d['id_admin'] ?>">
                  <input type="hidden" name="table" value="Admin">
                  <input type="submit" name="hapus" value="Hapus" class="button button2">
                </form>
              </td>
            </tr>
          <?php } ?>
      </table>

  </div>
</div>

<!-- WARNING END CONTENT ------------------------------------------------- -->
<?php
require_once('assets/footer.php');
?>
<?php }else{
  header("location: ../../index.php");
} ?>
