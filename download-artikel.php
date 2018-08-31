<?php
ob_start();
include 'rf-admin/application/controller/database.php'; 

$parameter          = $_GET['id'];
$q_artikel = $mysqli->query("SELECT tbl_artikel.*, tbl_user.nama_lengkap FROM tbl_artikel LEFT JOIN tbl_user ON tbl_artikel.id_penulis = tbl_user.id_user WHERE id_artikel= '$parameter'");
$array_artikel      = $q_artikel->fetch_array();

$judul = $array_artikel['judul_artikel'];

?>

<h3 style="text-align: center;"><?php echo $array_artikel['judul_artikel']; ?></h3>

<table>
    <tr>
        <td>Penulis </td>
        <td>:&nbsp;  <?php echo $array_artikel['nama_lengkap']; ?></td>
    </tr>
    <tr>
        <td>Uploaded</td>
        <td>:&nbsp;  <?php echo date('l, d F Y', strtotime($result_news['tanggal_upload'])); ?></td>
    </tr>
</table>

<hr>

<center>
    <img src="rf-admin/application/lib/images/<?php echo $array_artikel['gambar']; ?>" alt="">
</center>

<div class=" col-lg-12"><?php echo $array_artikel['isi_artikel']; ?></div>



<?php
$out = ob_get_contents();
ob_end_clean();
include 'rf-admin/application/helpers/mpdf60/mpdf.php';
$mpdf = new mPDF('c','A4-P','');
$mpdf->SetDisplayMode('fullpage');
$stylesheet = file_get_contents('rf-admin/application/helpers/mpdf60/mpdf.css');
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($out);
$mpdf->Output($judul.'.pdf', 'I');
  exit;
  echo "<script>window.close();</script>";
?>