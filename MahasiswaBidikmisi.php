<?php
require_once 'Mahasiswa.php';

class MahasiswaBidikmisi extends Mahasiswa {
    private string $nomorKipKuliah;
    private float $danaSakuSubsidi;

    public function __construct(int $idMahasiswa, string $namaMahasiswa, string $nim, int $semester, float $tarifUktNominal, string $nomorKipKuliah, float $danaSakuSubsidi) {
        parent::__construct($idMahasiswa, $namaMahasiswa, $nim, $semester, $tarifUktNominal);
        $this->nomorKipKuliah = $nomorKipKuliah;
        $this->danaSakuSubsidi = $danaSakuSubsidi;
    }

    // Tahap 5 Overriding: Gratis lunas (0)
    public function hitungTagihanSemester(): float {
        return 0.0;
    }

    public function tampilkanSpesifikasiAkademik(): void {
        echo "No. KIP Kuliah: " . $this->nomorKipKuliah . "<br>";
        echo "Dana Saku Subsidi: Rp " . number_format($this->danaSakuSubsidi, 0, ',', '.') . "/bln<br>";
    }

    public function getQuerySelectWhere(): string {
        return "SELECT * FROM table_mahasiswa WHERE jenis_pembiayaan = 'Bidikmisi';";
    }

    public function getNomorKipKuliah(): string { return $this->nomorKipKuliah; }
    public function getDanaSakuSubsidi(): float { return $this->danaSakuSubsidi; }
}