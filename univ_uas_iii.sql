-- Buat database
CREATE DATABASE univ_uas_iii;

-- Gunakan database
USE univ_uas_iii;

-- Buat table mahasiswa
CREATE TABLE mahasiswa (
  id_mhs INT NOT NULL AUTO_INCREMENT,
  nama VARCHAR(50) NOT NULL,
  alamat VARCHAR(100) NOT NULL,
  nim VARCHAR(10) NOT NULL,
  jk CHAR(1) NOT NULL,
  status VARCHAR(20) NOT NULL,
  id_sks INT,
  PRIMARY KEY (id_mhs)
);

-- Buat table sks
CREATE TABLE sks (
  id_sks INT NOT NULL AUTO_INCREMENT,
  jm_sks INT NOT NULL,
  PRIMARY KEY (id_sks)
);

-- Buat table matkul
CREATE TABLE matkul (
  id_matkul INT NOT NULL AUTO_INCREMENT,
  id_sks INT NOT NULL,
  nama VARCHAR(50) NOT NULL,
  PRIMARY KEY (id_matkul),
  FOREIGN KEY (id_sks) REFERENCES sks (id_sks)
);

-- Isi data table mahasiswa
INSERT INTO mahasiswa (nama, alamat, nim, jk, status, id_sks) VALUES
('Andi', 'Jalan Mawar No. 12', '123456789', 'L', 'Aktif', 1),
('Nenden', 'Jalan Melati No. 13', '987654321', 'P', 'Aktif', 2);

-- Isi data table sks
INSERT INTO sks (jm_sks) VALUES
(3),
(3);

-- Isi data table matkul
INSERT INTO matkul (id_sks, nama) VALUES
(1, 'Matematika'),
(2, 'Bahasa Inggris');

-- Query untuk menampilkan data mahasiswa dan jumlah SKS
SELECT a.nama AS mahasiswa, b.jm_sks
FROM mahasiswa a
JOIN sks b ON a.id_sks = b.id_sks;

-- Query untuk menampilkan data mahasiswa, mata kuliah, dan jumlah SKS
SELECT
    mahasiswa.nama AS mahasiswa,
    matkul.nama AS matkul,
    sks.jm_sks AS sks
FROM
    mahasiswa
JOIN
    matkul ON mahasiswa.id_sks = matkul.id_sks
JOIN
    sks ON matkul.id_sks = sks.id_sks;

-- Query untuk menampilkan nama andi, alamat, jk,Status
SELECT nama, alamat, jk, status
FROM mahasiswa
WHERE nama = 'andi';

