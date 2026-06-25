<?php
require_once 'Mahasiswa.php';

class MahasiswaPrestasi extends Mahasiswa {
    private string $namaInstansiBeasiswa;
    private float $minimalIpkSyarat;

    public function __construct(int $idMahasiswa, string $namaMahasiswa, string $nim, int $semester, float $tarifUktNominal, string $namaInstansiBeasiswa, float $minimalIpkSyarat) {
        parent::__construct($idMahasiswa, $namaMahasiswa, $nim, $semester, $tarifUktNominal);
        $this->namaInstansiBeasiswa = $namaInstansiBeasiswa;
        $this->minimalIpkSyarat = $minimalIpkSyarat;
    }

    // Tahap 5 Overriding: Potongan 75%, bayar 25% saja
    public function hitungTagihanSemester(): float {
        return $this->tarifUktNominal * 0.25;
    }

    public function tampilkanSpesifikasiAkademik(): void {
        echo "Instansi Beasiswa: " . $this->namaInstansiBeasiswa . "<br>";
        echo "Syarat Minimal IPK: " . number_format($this->minimalIpkSyarat, 2) . "<br>";
    }

    public function getQuerySelectWhere(): string {
        return "SELECT * FROM table_mahasiswa WHERE jenis_pembiayaan = 'Prestasi';";
    }

    public function getNamaInstansiBeasiswa(): string { return $this->namaInstansiBeasiswa; }
    public function getMinimalIpkSyarat(): float { return $this->minimalIpkSyarat; }
}