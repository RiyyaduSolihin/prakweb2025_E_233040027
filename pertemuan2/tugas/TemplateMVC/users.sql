CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100),
  posisi VARCHAR(50),
  nomor_punggung INT,
  negara VARCHAR(50)
);

INSERT INTO users (nama, posisi, nomor_punggung, negara) VALUES
('Mohamed Salah', 'Forward', 11, 'Mesir'),
('Virgil van Dijk', 'Defender', 4, 'Belanda'),

;
