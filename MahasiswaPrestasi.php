<?php
require_once 'Mahasiswa.php';

class MahasiswaPrestasi extends Mahasiswa {
    private string $nomorKipKuliah;
    private float $danaSakuSubsidi;

    public function __construct(int $idMahasiswa, string $namaMahasiswa, string $nim, int $semester, float $tarifUktNominal, string $nomorKipKuliah, float $danaSakuSubsidi) {
        parent::__construct($idMahasiswa, $namaMahasiswa, $nim, $semester, $tarifUktNominal);
        $this->nomorKipKuliah = $nomorKipKuliah;
        $this->danaSakuSubsidi = $danaSakuSubsidi;
    }

    /**
     * OVERRIDING: Mahasiswa Bidikmisi
     * Total Tagihan = 0 (Gratis penuh ditanggung negara via KIP-K)
     */
    public function hitungTagihanSemester(): float {
        return 0.0;
    }

    public function tampilkanSpesifikasiAkademik(): void {
        echo "Rincian Akademik Mahasiswa Bidikmisi:<br>";
        echo "No. KIP Kuliah: " . $this->nomorKipKuliah . "<br>";
        echo "Dana Saku Subsidi/Bulan: Rp " . number_format($this->danaSakuSubsidi, 0, ',', '.') . "<br>";
    }

    public function getQuerySelectWhere(): string {
        return "SELECT id_mahasiswa, nama_mahasiswa, nim, semester, nomor_kip_kuliah, dana_saku_subsidi 
                FROM table_mahasiswa 
                WHERE jenis_pembiayaan = 'Bidikmisi';";
    }
}