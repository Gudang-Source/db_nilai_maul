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
      <h1>Data Siswa</h1></center><hr>
      <a href="siswa_form.php"><button class="button">Tambah Data</button></a><br><br>
      <table border="1" width="100%">
        <tr>
          <th>NIS</th>
          <th>Nama Siswa</th>
          <th>Alamat</th>
          <th>Kelas</th>
          <th>Jurusan</th>
          <th colspan="2">Action</th>
        </tr>
          <?php foreach ($db->tampil_join2('siswa','kelas','siswa.id_kelas=kelas.id_kelas','jurusan','kelas.id_jurusan=jurusan.id_jurusan') as $d) { ?>
            <tr style="text-align: center;">
              <td><?php echo $d['nis'] ?></td>
              <td><?php echo $d['nama_siswa'] ?></td>
              <td><?php echo $d['alamat'] ?></td>
              <td><?php echo $d['nama_kelas'] ?></td>
              <td><?php echo $d['nama_jurusan'] ?></td>
              <td>
                <form class="" action="siswa_form.php" method="post">
                  <input type="hidden" name="nis" value="<?php echo $d['nis'] ?>">
                  <input type="hidden" name="table" value="siswa">
                  <input type="submit" name="edit" value="Edit" class="button button1">
                </form>
              </td>
              <td>
                <form class="" action="action/siswa_act.php" method="post">
                  <input type="hidden" name="nis" value="<?php echo $d['nis'] ?>">
                  <input type="hidden" name="table" value="siswa">
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
