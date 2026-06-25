<?php
require_once 'Mahasiswa.php';

class MahasiswaMandiri extends Mahasiswa {
    // Properti tambahan spesifik
    private string $golonganUkt;
    private string $namaWali;

    // Constructor subclass
    public function __construct(int $idMahasiswa, string $namaMahasiswa, string $nim, int $semester, float $tarifUktNominal, string $golonganUkt, string $namaWali) {
        // Memanggil constructor dari abstract class induk
        parent::__construct($idMahasiswa, $namaMahasiswa, $nim, $semester, $tarifUktNominal);
        $this->golonganUkt = $golonganUkt;
        $this->namaWali = $namaWali;
    }

    // Implementasi method abstrak: Hitung tagihan (Mandiri bayar penuh sesuai tarif)
    public function hitungTagihanSemester(): float {
        return $this->tarifUktNominal;
    }

    // Implementasi method abstrak: Tampilkan spesifikasi akademik
    public function tampilkanSpesifikasiAkademik(): void {
        echo "Rincian Akademik Mahasiswa Mandiri:<br>";
        echo "Nama Wali: " . $this->namaWali . "<br>";
        echo "Golongan UKT: " . $this->golonganUkt . "<br>";
    }

    /**
     * Method untuk mendapatkan query SELECT-WHERE spesifik Mahasiswa Mandiri
     */
    public function getQuerySelectWhere(): string {
        return "SELECT id_mahasiswa, nama_mahasiswa, nim, semester, tarif_ukt_nominal, golongan_ukt, nama_wali 
                FROM table_mahasiswa 
                WHERE jenis_pembiayaan = 'Mandiri';";
    }

    // Getter & Setter spesifik
    public function getGolonganUkt(): string { return $this->golonganUkt; }
    public function getNamaWali(): string { return $this->namaWali; }
}