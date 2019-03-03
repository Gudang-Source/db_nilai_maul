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
      <h1>Data Mapel</h1></center><hr>
      <a href="mapel_form.php"><button class="button">Tambah Data</button></a><br><br>
      <table border="1" width="100%">
        <tr>
          <th>ID Mapel</th>
          <th>Nama Mapel</th>
          <th colspan="2">Action</th>
        </tr>
          <?php foreach ($db->tampil('mapel') as $d) { ?>
            <tr style="text-align: center;">
              <td><?php echo $d['id_mapel'] ?></td>
              <td><?php echo $d['nama_mapel'] ?></td>
              <td>
                <form class="" action="mapel_form.php" method="post">
                  <input type="hidden" name="id_mapel" value="<?php echo $d['id_mapel'] ?>">
                  <input type="hidden" name="table" value="mapel">
                  <input type="submit" name="edit" value="Edit" class="button button1">
                </form>
              </td>
              <td>
                <form class="" action="action/mapel_act.php" method="post">
                  <input type="hidden" name="id_mapel" value="<?php echo $d['id_mapel'] ?>">
                  <input type="hidden" name="table" value="mapel">
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
