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
      <h1>Data Guru</h1></center><hr>
      <a href="guru_form.php"><button class="button">Tambah Data</button></a><br><br>
      <table border="1" width="100%">
        <tr>
          <th>NIP</th>
          <th>Password</th>
          <th>Nama Guru</th>
          <th>NUPTK</th>
          <th>Alamat</th>
          <th colspan="2">Action</th>
        </tr>
          <?php foreach ($db->tampil('guru') as $d) { ?>
            <tr style="text-align: center;">
              <td><?php echo $d['nip'] ?></td>
              <td><?php echo $d['password'] ?></td>
              <td><?php echo $d['nama_guru'] ?></td>
              <td><?php echo $d['nuptk'] ?></td>
              <td><?php echo $d['alamat'] ?></td>
              <td>
                <form class="" action="guru_form.php" method="post">
                  <input type="hidden" name="nip" value="<?php echo $d['nip'] ?>">
                  <input type="hidden" name="table" value="guru">
                  <input type="submit" name="edit" value="Edit" class="button button1">
                </form>
              </td>
              <td>
                <form class="" action="action/guru_act.php" method="post">
                  <input type="hidden" name="nip" value="<?php echo $d['nip'] ?>">
                  <input type="hidden" name="table" value="guru">
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
