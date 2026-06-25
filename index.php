<?php
// 1. Include semua class yang diperlukan
require_once 'Mahasiswa.php';
require_once 'MahasiswaMandiri.php';
require_once 'MahasiswaBidikmisi.php';
require_once 'MahasiswaPrestasi.php';

// 2. Koneksi ke Database (Sesuaikan username & password MySQL Anda)
$host     = "localhost";
$username = "root";
$password = "";
$database = "DB_UAS_PBO_TI1D_Raditya_Putra_Perdana";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}

// 3. Fungsi pembantu untuk instansiasi objek berdasarkan kategori
function ambilDataMahasiswa($pdo, $subclassObj, $jenis) {
    $listMahasiswa = [];
    $query = $subclassObj->getQuerySelectWhere();
    $stmt = $pdo->query($query);
    
    // Perbaikan utama: Menggunakan PDO::FETCH_ASSOC
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if ($jenis === 'Mandiri') {
            $listMahasiswa[] = new MahasiswaMandiri(
                $row['id_mahasiswa'], $row['nama_mahasiswa'], $row['nim'], 
                $row['semester'], (float)$row['tarif_ukt_nominal'], 
                $row['golongan_ukt'], $row['nama_wali']
            );
        } elseif ($jenis === 'Bidikmisi') {
            $listMahasiswa[] = new MahasiswaBidikmisi(
                $row['id_mahasiswa'], $row['nama_mahasiswa'], $row['nim'], 
                $row['semester'], 0.0, 
                $row['nomor_kip_kuliah'], (float)$row['dana_saku_subsidi']
            );
        } elseif ($jenis === 'Prestasi') {
            $listMahasiswa[] = new MahasiswaPrestasi(
                $row['id_mahasiswa'], $row['nama_mahasiswa'], $row['nim'], 
                $row['semester'], (float)$row['tarif_ukt_nominal'], 
                $row['nama_instansi_beasiswa'], (float)$row['minimal_ipk_syarat']
            );
        }
    }
    return $listMahasiswa;
}

// Dummy instansiasi awal hanya untuk memanggil method getQuerySelectWhere() secara dinamis
$dataMandiri   = ambilDataMahasiswa($pdo, new MahasiswaMandiri(0, '', '', 0, 0, '', ''), 'Mandiri');
$dataBidikmisi = ambilDataMahasiswa($pdo, new MahasiswaBidikmisi(0, '', '', 0, 0, '', 0), 'Bidikmisi');
$dataPrestasi  = ambilDataMahasiswa($pdo, new MahasiswaPrestasi(0, '', '', 0, 0, '', 0), 'Prestasi');
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Registrasi Pembayaran Kuliah Mahasiswa</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f4f6f9; color: #333; }
        h1 { text-align: center; color: #2c3e50; }
        h2 { margin-top: 40px; color: #2980b9; border-bottom: 2px solid #2980b9; padding-bottom: 8px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; background: #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        th, td { padding: 12px 15px; text-align: left; border: 1px solid #ddd; }
        th { background-color: #34495e; color: #fff; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .text-right { text-align: right; }
        .badge { padding: 5px 10px; background: #e74c3c; color: white; border-radius: 4px; font-size: 12px; }
        .badge-free { background: #2ecc71; }
    </style>
</head>
<body>

    <h1>SISTEM INFORMASI REGISTRASI PEMBAYARAN MAHASISWA</h1>
    <p style="text-align: center; font-weight: bold;">DB: DB_UAS_PBO_TI1D_Raditya_Putra_Perdana</p>

    <h2>1. Kategori Mahasiswa Mandiri</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Semester</th>
                <th>Tarif UKT Asli</th>
                <th>Spesifikasi Akademik (Atribut Anak)</th>
                <th>Total Tagihan Semester (Polimorfisme)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataMandiri as $mhs): ?>
            <tr>
                <td><?= $mhs->getIdMahasiswa(); ?></td>
                <td><?= $mhs->getNim(); ?></td>
                <td><strong><?= $mhs->getNamaMahasiswa(); ?></strong></td>
                <td><?= $mhs->getSemester(); ?></td>
                <td class="text-right">Rp <?= number_format($mhs->getTarifUktNominal(), 0, ',', '.'); ?></td>
                <td><?php $mhs->tampilkanSpesifikasiAkademik(); ?></td>
                <td class="text-right" style="font-weight: bold; color: #c0392b;">
                    Rp <?= number_format($mhs->hitungTagihanSemester(), 0, ',', '.'); ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>2. Kategori Mahasiswa Bidikmisi</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Semester</th>
                <th>Spesifikasi Akademik (Atribut Anak)</th>
                <th>Total Tagihan Semester (Polimorfisme)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataBidikmisi as $mhs): ?>
            <tr>
                <td><?= $mhs->getIdMahasiswa(); ?></td>
                <td><?= $mhs->getNim(); ?></td>
                <td><strong><?= $mhs->getNamaMahasiswa(); ?></strong></td>
                <td><?= $mhs->getSemester(); ?></td>
                <td><?php $mhs->tampilkanSpesifikasiAkademik(); ?></td>
                <td class="text-right" style="font-weight: bold; color: #27ae60;">
                    <span class="badge badge-free">Rp <?= number_format($mhs->hitungTagihanSemester(), 0, ',', '.'); ?> (Gratis Lunas)</span>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>3. Kategori Mahasiswa Prestasi</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Semester</th>
                <th>Tarif UKT Asli</th>
                <th>Spesifikasi Akademik (Atribut Anak)</th>
                <th>Total Tagihan Semester (Potongan 75%)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataPrestasi as $mhs): ?>
            <tr>
                <td><?= $mhs->getIdMahasiswa(); ?></td>
                <td><?= $mhs->getNim(); ?></td>
                <td><strong><?= $mhs->getNamaMahasiswa(); ?></strong></td>
                <td><?= $mhs->getSemester(); ?></td>
                <td class="text-right">Rp <?= number_format($mhs->getTarifUktNominal(), 0, ',', '.'); ?></td>
                <td><?php $mhs->tampilkanSpesifikasiAkademik(); ?></td>
                <td class="text-right" style="font-weight: bold; color: #2980b9;">
                    Rp <?= number_format($mhs->hitungTagihanSemester(), 0, ',', '.'); ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>