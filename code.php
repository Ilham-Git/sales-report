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
    $db = $_POST['import_to'];

    $allowed_ext = ['xls', 'csv', 'xlsx'];

    if (in_array($file_ext, $allowed_ext)) {
        $inputFileName = $_FILES['import_file']['tmp_name'];
        /** Load $inputFileName to a Spreadsheet object **/
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
        $data = $spreadsheet->getActiveSheet()->toArray();

        foreach ($data as $row) {
            if ($row != null) {
                if ($db == "Toko") {
                    $nama_toko = $row['1'];
                    $wilayah = $row['2'];

                    $importQuery = "INSERT INTO tb_toko (nama_toko, wilayah) VALUES ('$nama_toko','$wilayah')";
                    $result = mysqli_query($koneksi, $importQuery);
                    $msg = true;
                }
                if ($db == "Ankutan") {
                    $sopir = $row['1'];
                    $plat = $row['2'];
                    $angkut = $row['3'];

                    $importQuery = "INSERT INTO tb_angkut (sopir, plat, wilayah_angkut) VALUES ('$sopir','$plat','$angkut')";
                    $result = mysqli_query($koneksi, $importQuery);
                    $msg = true;
                }
            } else {
                $msg = false;
                break;
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
    $db = $_POST['export_from'];
    $filename = 'Data_' . $db . '_' . date('Y-m-d_H-i-s');

    if ($db == "Pesanan") {
        $exportQuery = "SELECT * from tb_pesanan as p 
                    inner join tb_toko as t on p.id_toko=t.id_toko 
                    inner join tb_angkut as a on p.id_angkut=a.id_angkut 
                    where id_pesan IS NOT NULL";
    } elseif ($db == "Toko") {
        $exportQuery = "SELECT * FROM tb_toko WHERE id_toko IS NOT NULL";
    } elseif ($db == "Angkutan") {
        $exportQuery = "SELECT * FROM tb_angkut WHERE id_angkut IS NOT NULL";
    } else {
        $_SESSION['message'] = "Tidak Ada Data Yang Tersedia";
    }

    $result = mysqli_query($koneksi, $exportQuery);

    if (mysqli_num_rows($result) > 0) {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $rowCount = 2;
        $no = 1;

        if ($db == "Pesanan") {
            $sheet->setCellValue('A1', 'No');
            $sheet->setCellValue('B1', 'Nama Toko');
            $sheet->setCellValue('C1', 'Tanggal Kirim');
            $sheet->setCellValue('D1', 'Tanggal Terima');
            $sheet->setCellValue('E1', 'No SPJ');
            $sheet->setCellValue('F1', 'No SO');
            $sheet->setCellValue('G1', 'Sopir');
            $sheet->setCellValue('H1', 'Plat');
            $sheet->setCellValue('I1', 'Angkut');
            $sheet->setCellValue('J1', 'Zak 40kg');
            $sheet->setCellValue('K1', 'Zak 50kg');
            $sheet->setCellValue('L1', 'Harga 40kg');
            $sheet->setCellValue('M1', 'Harga 50kg');
            $sheet->setCellValue('N1', 'Total Harga 40kg');
            $sheet->setCellValue('O1', 'Total Harga 50kg');
            $sheet->setCellValue('P1', 'Total Harga');
            $sheet->setCellValue('Q1', 'Wilayah');

            foreach ($result as $data) {
                $sheet->setCellValue('A' . $rowCount, $no++);
                $sheet->setCellValue('B' . $rowCount, $data['nama_toko']);
                $sheet->setCellValue('C' . $rowCount, $data['kirim']);
                $sheet->setCellValue('D' . $rowCount, $data['terima']);
                $sheet->setCellValue('E' . $rowCount, $data['noSPJ']);
                $sheet->setCellValue('F' . $rowCount, $data['noSO']);
                $sheet->setCellValue('G' . $rowCount, $data['sopir']);
                $sheet->setCellValue('H' . $rowCount, $data['plat']);
                $sheet->setCellValue('I' . $rowCount, $data['angkut']);
                $sheet->setCellValue('J' . $rowCount, $data['zak_40']);
                $sheet->setCellValue('K' . $rowCount, $data['zak_50']);
                $sheet->setCellValue('L' . $rowCount, $data['harga_40']);
                $sheet->setCellValue('M' . $rowCount, $data['harga_50']);
                $sheet->setCellValue('N' . $rowCount, $data['total_40']);
                $sheet->setCellValue('O' . $rowCount, $data['total_50']);
                $sheet->setCellValue('P' . $rowCount, $data['total']);
                $sheet->setCellValue('Q' . $rowCount, $data['wilayah']);
                $rowCount++;
            }
        } elseif ($db == "Toko") {
            $sheet->setCellValue('A1', 'NO');
            $sheet->setCellValue('B1', 'Nama Toko');
            $sheet->setCellValue('C1', 'Wilayah');

            foreach ($result as $data) {
                $sheet->setCellValue('A' . $rowCount, $no++);
                $sheet->setCellValue('B' . $rowCount, $data['nama_toko']);
                $sheet->setCellValue('C' . $rowCount, $data['wilayah']);
                $rowCount++;
            }
        } elseif ($db == "Angkutan") {
            $sheet->setCellValue('A1', 'NO');
            $sheet->setCellValue('B1', 'Sopir');
            $sheet->setCellValue('C1', 'Plat');
            $sheet->setCellValue('D1', 'Wilayah');

            foreach ($result as $data) {
                $sheet->setCellValue('A' . $rowCount, $no++);
                $sheet->setCellValue('B' . $rowCount, $data['sopir']);
                $sheet->setCellValue('C' . $rowCount, $data['plat']);
                $sheet->setCellValue('D' . $rowCount, $data['wilayah_angkut']);
                $rowCount++;
            }
        } else {
            $_SESSION['message'] = "Tidak Ada Data Yang Tersedia";
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
