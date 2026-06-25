<?php
require_once 'Mahasiswa.php';

class MahasiswaMandiri extends Mahasiswa {
    private string $golonganUkt;
    private string $namaWali;

    public function __construct(int $idMahasiswa, string $namaMahasiswa, string $nim, int $semester, float $tarifUktNominal, string $golonganUkt, string $namaWali) {
        parent::__construct($idMahasiswa, $namaMahasiswa, $nim, $semester, $tarifUktNominal);
        $this->golonganUkt = $golonganUkt;
        $this->namaWali = $namaWali;
    }

    /**
     * OVERRIDING: Mahasiswa Mandiri
     * Total Tagihan = tarifUktNominal + 100000 (Biaya operasional flat)
     */
    public function hitungTagihanSemester(): float {
        return $this->tarifUktNominal + 100000;
    }

    public function tampilkanSpesifikasiAkademik(): void {
        echo "Rincian Akademik Mahasiswa Mandiri:<br>";
        echo "Nama Wali: " . $this->namaWali . "<br>";
        echo "Golongan UKT: " . $this->golonganUkt . "<br>";
    }

    public function getQuerySelectWhere(): string {
        return "SELECT id_mahasiswa, nama_mahasiswa, nim, semester, tarif_ukt_nominal, golongan_ukt, nama_wali 
                FROM table_mahasiswa 
                WHERE jenis_pembiayaan = 'Mandiri';";
    }
}