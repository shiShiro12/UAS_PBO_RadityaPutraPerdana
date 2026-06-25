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

    // Tahap 5 Overriding: Tambah biaya operasional flat Rp 100.000
    public function hitungTagihanSemester(): float {
        return $this->tarifUktNominal + 100000;
    }

    public function tampilkanSpesifikasiAkademik(): void {
        echo "Nama Wali: " . $this->namaWali . "<br>";
        echo "Golongan UKT: " . $this->golonganUkt . "<br>";
    }

    public function getQuerySelectWhere(): string {
        return "SELECT * FROM table_mahasiswa WHERE jenis_pembiayaan = 'Mandiri';";
    }

    public function getGolonganUkt(): string { return $this->golonganUkt; }
    public function getNamaWali(): string { return $this->namaWali; }
}