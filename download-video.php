<?php
$file   = $_GET['id'];
$berkas = './rf-admin/application/lib/video/'.$file;

if (file_exists($berkas)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($berkas));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($berkas));
    ob_clean();
    flush();
    readfile($berkas);
    exit;
} else {
    echo "File Not Found";
}