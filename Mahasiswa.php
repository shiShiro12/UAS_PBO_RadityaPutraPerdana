<?php

abstract class Mahasiswa {
    protected int $idMahasiswa;
    protected string $namaMahasiswa;
    protected string $nim;
    protected int $semester;
    protected float $tarifUktNominal; 

    public function __construct(int $idMahasiswa, string $namaMahasiswa, string $nim, int $semester, float $tarifUktNominal) {
        $this->idMahasiswa = idMahasiswa;
        $this->namaMahasiswa = $namaMahasiswa;
        $this->nim = $nim;
        $this->semester = $semester;
        $this->tarifUktNominal = $tarifUktNominal;
    }

    abstract public function hitungTagihanSemester(): float;

    abstract public function tampilkanSpesifikasiAkademik(): void;

    public function getIdMahasiswa(): int { return $this->idMahasiswa; }
    public function setIdMahasiswa(int $idMahasiswa): void { $this->idMahasiswa = $idMahasiswa; }

    public function getNamaMahasiswa(): string { return $this->namaMahasiswa; }
    public function setNamaMahasiswa(string $namaMahasiswa): void { $this->namaMahasiswa = $namaMahasiswa; }

    public function getNim(): string { return $this->nim; }
    public function setNim(string $nim): void { $this->nim = $nim; }

    public function getSemester(): int { return $this->semester; }
    public function setSemester(int $semester): void { $this->semester = $semester; }

    public function getTarifUktNominal(): float { return $this->tarifUktNominal; }
    public function setTarifUktNominal(float $tarifUktNominal): void { $this->tarifUktNominal = $tarifUktNominal; }
}