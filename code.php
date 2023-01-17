<?php
session_start();
include 'inc/koneksi.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Csv;

if (isset($_POST['save_data'])) {
    $filename = $_FILES['import_file']['name'];
    $file_ext = pathinfo($filename, PATHINFO_EXTENSION);

    $allowed_ext = ['xls', 'csv', 'xlsx'];

    if (in_array($file_ext, $allowed_ext)) {
        $inputFileName = $_FILES['import_file']['tmp_name'];
        /** Load $inputFileName to a Spreadsheet object **/
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count = '0';

        foreach ($data as $row) {
            if ($count > 0) {
                $nik = '-';
                $nama = $row['1'];
                $tempat_lh = $row['2'];
                $tgl_lh = $row['3'];
                $jekel = $row['4'];
                $agama = $row['6'];
                $pekerjaan = $row['8'];
                $kawin = $row['9'];
                $alamat = $row['11'];
                $rt = $row['12'];
                $rw = $row['13'];
                $status = "Ada";
                $stunting = "Tidak";

                $importQuery = "INSERT INTO tb_pdd (nik,nama,tempat_lh,tgl_lh,jekel,desa,rt,rw,agama,kawin,pekerjaan,status,stunting) VALUES (
                '$nik','$nama','$tempat_lh','$tgl_lh','$jekel','$alamat','$rt','$rw','$agama','$kawin','$pekerjaan','$status','$stunting')";
                $result = mysqli_query($koneksi, $importQuery);
                $msg = true;
            } else {
                $count = '1';
            }
        }

        if (isset($msg)) {
            $_SESSION['message'] = "Import Data Sukses";
            header('Location: index.php?page=import-data');
            exit(0);
        } else {
            $_SESSION['message'] = "Import Data Gagal";
            header('Location: index.php?page=import-data');
            exit(0);
        }
    } else {
        $_SESSION['message'] = "Invalid File";
        header('Location: index.php?page=import-data');
        exit(0);
    }
}

if (isset($_POST['export_data'])) {
    $file_ext_name = $_POST['export_file_type'];
    $filename = 'data_watsor';

    $exportQuery = "SELECT * FROM tb_pdd";
    $result = mysqli_query($koneksi, $exportQuery);

    if (mysqli_num_rows($result) > 0) {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Id');
        $sheet->setCellValue('B1', 'NIK');
        $sheet->setCellValue('C1', 'Nama');
        $sheet->setCellValue('D1', 'Tempat Lahir');
        $sheet->setCellValue('E1', 'Tanggal Lahir');
        $sheet->setCellValue('F1', 'Jenis Kelamin');
        $sheet->setCellValue('G1', 'Alamat');
        $sheet->setCellValue('H1', 'RT');
        $sheet->setCellValue('I1', 'RW');
        $sheet->setCellValue('J1', 'Agama');
        $sheet->setCellValue('K1', 'Status Kawin');
        $sheet->setCellValue('L1', 'Pekerjaan');
        $sheet->setCellValue('M1', 'Status');
        $sheet->setCellValue('N1', 'Stunting');

        $rowCount = 2;
        foreach ($result as $data) {
            $sheet->setCellValue('A' . $rowCount, $data['id_pend']);
            $sheet->setCellValue('B' . $rowCount, $data['nik']);
            $sheet->setCellValue('C' . $rowCount, $data['nama']);
            $sheet->setCellValue('D' . $rowCount, $data['tempat_lh']);
            $sheet->setCellValue('E' . $rowCount, $data['tgl_lh']);
            $sheet->setCellValue('F' . $rowCount, $data['jekel']);
            $sheet->setCellValue('G' . $rowCount, $data['desa']);
            $sheet->setCellValue('H' . $rowCount, $data['rt']);
            $sheet->setCellValue('I' . $rowCount, $data['rw']);
            $sheet->setCellValue('J' . $rowCount, $data['agama']);
            $sheet->setCellValue('K' . $rowCount, $data['kawin']);
            $sheet->setCellValue('L' . $rowCount, $data['pekerjaan']);
            $sheet->setCellValue('M' . $rowCount, $data['status']);
            $sheet->setCellValue('N' . $rowCount, $data['stunting']);
            $rowCount++;
        }

        if ($file_ext_name == 'xlsx') {
            $writer = new Xlsx($spreadsheet);
            $finalFilename = $filename . '.xlsx';
        } elseif ($file_ext_name == 'xls') {
            $writer = new Xls($spreadsheet);
            $finalFilename = $filename . '.xls';
        } elseif ($file_ext_name == 'csv') {
            $writer = new Csv($spreadsheet);
            $finalFilename = $filename . '.csv';
        }

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . urlencode($finalFilename) . '"');
        $writer->save('php://output');
        // $writer->save($finalFilename);
    } else {
        $_SESSION['message'] = "Tidak Ada Data Yang Tersedia";
        header('Location: index.php?page=export-data');
        exit(0);
    }
}
