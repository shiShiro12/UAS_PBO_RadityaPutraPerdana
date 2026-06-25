<?php
require_once 'Mahasiswa.php';

class MahasiswaBidikmisi extends Mahasiswa {
    // Properti tambahan spesifik
    private string $nomorKipKuliah;
    private float $danaSakuSubsidi;

    // Constructor subclass
    public function __construct(int $idMahasiswa, string $namaMahasiswa, string $nim, int $semester, float $tarifUktNominal, string $nomorKipKuliah, float $danaSakuSubsidi) {
        parent::__construct($idMahasiswa, $namaMahasiswa, $nim, $semester, $tarifUktNominal);
        $this->nomorKipKuliah = $nomorKipKuliah;
        $this->danaSakuSubsidi = $danaSakuSubsidi;
    }

    // Implementasi method abstrak: Hitung tagihan (Bidikmisi digratiskan / 0)
    public function hitungTagihanSemester(): float {
        return 0.0;
    }

    // Implementasi method abstrak: Tampilkan spesifikasi akademik
    public function tampilkanSpesifikasiAkademik(): void {
        echo "Rincian Akademik Mahasiswa Bidikmisi:<br>";
        echo "No. KIP Kuliah: " . $this->nomorKipKuliah . "<br>";
        echo "Dana Saku Subsidi/Bulan: Rp " . number_format($this->danaSakuSubsidi, 0, ',', '.') . "<br>";
    }

    /**
     * Method untuk mendapatkan query SELECT-WHERE spesifik Mahasiswa Bidikmisi
     */
    public function getQuerySelectWhere(): string {
        return "SELECT id_mahasiswa, nama_mahasiswa, nim, semester, nomor_kip_kuliah, dana_saku_subsidi 
                FROM table_mahasiswa 
                WHERE jenis_pembiayaan = 'Bidikmisi';";
    }

    // Getter & Setter spesifik
    public function getNomorKipKuliah(): string { return $this->nomorKipKuliah; }
    public function getDanaSakuSubsidi(): float { return $this->danaSakuSubsidi; }
}