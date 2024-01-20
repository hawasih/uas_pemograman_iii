<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Mata Kuliah</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>From Input</h1>

        <form action="process.php" method="post">
            <label for="nama">Nama Mahasiswa:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="nim">NIM Mahasiswa:</label>
            <input type="text" id="nim" name="nim" required>

            <label for="alamat">Alamat Mahasiswa:</label>
            <input type="text" id="alamat" name="alamat" required>

            <label for="jk">Jenis Kelamin:</label>
            <select id="jk" name="jk" required>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>

            <label for="status">Status Mahasiswa:</label>
            <select id="status" name="status" required>
                <option value="Aktif">Aktif</option>
                <option value="Drop Out">Drop Out</option>
            </select>

            <label for="matkul">Mata Kuliah:</label>
            <select id="matkul" name="matkul" required>
                <?php
                // Mengambil data mata kuliah dari database
                $conn = new mysqli("localhost", "root", "", "univ_uas_iii");

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $result = $conn->query("SELECT * FROM matkul");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id_matkul'] . "'>" . $row['nama'] . "</option>";
                }

                $conn->close();
                ?>
            </select>

            <label for="sks">Jumlah SKS:</label>
            <input type="number" id="sks" name="sks" required>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
