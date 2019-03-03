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
      <h1>Data Mengajar</h1></center><hr>
      <a href="mengajar_form.php"><button class="button">Tambah Data</button></a><br><br>
      <table border="1" width="100%">
        <tr>
          <th>ID Mengajar</th>
          <th>Kelas</th>
          <th>Jurusan</th>
          <th>Mapel</th>
          <th>Guru</th>
          <th colspan="2">Action</th>
        </tr>
          <?php foreach ($db->tampil_join4('mengajar','kelas','mengajar.id_kelas=kelas.id_kelas','jurusan','kelas.id_jurusan=jurusan.id_jurusan','mapel','mengajar.id_mapel=mapel.id_mapel','guru','mengajar.nip=guru.nip') as $d) { ?>
            <tr style="text-align: center;">
              <td><?php echo $d['id_mengajar'] ?></td>
              <td><?php echo $d['nama_kelas'] ?></td>
              <td><?php echo $d['nama_jurusan'] ?></td>
              <td><?php echo $d['nama_mapel'] ?></td>
              <td><?php echo $d['nama_guru'] ?></td>
              <td>
                <form class="" action="mengajar_form.php" method="post">
                  <input type="hidden" name="id_mengajar" value="<?php echo $d['id_mengajar'] ?>">
                  <input type="hidden" name="table" value="mengajar">
                  <input type="submit" name="edit" value="Edit" class="button button1">
                </form>
              </td>
              <td>
                <form class="" action="action/mengajar_act.php" method="post">
                  <input type="hidden" name="id_mengajar" value="<?php echo $d['id_mengajar'] ?>">
                  <input type="hidden" name="table" value="mengajar">
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
