<?php
require_once 'Mahasiswa.php';

class MahasiswaPrestasi extends Mahasiswa {
    // Properti tambahan spesifik
    private string $namaInstansiBeasiswa;
    private float $minimalIpkSyarat;

    // Constructor subclass
    public function __construct(int $idMahasiswa, string $namaMahasiswa, string $nim, int $semester, float $tarifUktNominal, string $namaInstansiBeasiswa, float $minimalIpkSyarat) {
        parent::__construct($idMahasiswa, $namaMahasiswa, $nim, $semester, $tarifUktNominal);
        $this->namaInstansiBeasiswa = $namaInstansiBeasiswa;
        $this->minimalIpkSyarat = $minimalIpkSyarat;
    }

    // Implementasi method abstrak: Hitung tagihan (Prestasi bayar sesuai sisa tarif pasca potongan instansi jika ada)
    public function hitungTagihanSemester(): float {
        return $this->tarifUktNominal; 
    }

    // Implementasi method abstrak: Tampilkan spesifikasi akademik
    public function tampilkanSpesifikasiAkademik(): void {
        echo "Rincian Akademik Mahasiswa Prestasi:<br>";
        echo "Instansi Pemberi Beasiswa: " . $this->namaInstansiBeasiswa . "<br>";
        echo "Minimal IPK Syarat: " . number_format($this->minimalIpkSyarat, 2) . "<br>";
    }

    /**
     * Method untuk mendapatkan query SELECT-WHERE spesifik Mahasiswa Prestasi
     */
    public function getQuerySelectWhere(): string {
        return "SELECT id_mahasiswa, nama_mahasiswa, nim, semester, tarif_ukt_nominal, nama_instansi_beasiswa, minimal_ipk_syarat 
                FROM table_mahasiswa 
                WHERE jenis_pembiayaan = 'Prestasi';";
    }

    // Getter & Setter spesifik
    public function getNamaInstansiBeasiswa(): string { return $this->namaInstansiBeasiswa; }
    public function getMinimalIpkSyarat(): float { return $this->minimalIpkSyarat; }
}