<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            width: 80%;
            margin: 20px auto;
        }

        form {
            margin-top: 20px;
        }

        form input {
            padding: 8px;
        }

        .form-wrap {
            padding-bottom: 10px;
        }
    </style>
</head>

<body>
    <a href="form_data_pegawai.php">Kembali</a><br><br>

    <h2>Tambah Pegawawi</h2>

    <form action="form_data_pegawai.php" method="POST">
        <div class="form-wrap">
            <label for="">Nama Pegawai</label>
            <input type="text" name="nama">
        </div>
        <div class="form-wrap">
            <label for="">NIK</label>
            <input type="text" name="nik">
        </div>
        <div class="form-wrap">
            <label for="">Alamat</label>
            <input type="text" name="alamat">
        </div>
        <button type="submit" name="action" value="create" onclick="return confirm('apakah anda ingin menambahkan data ini?')">tambah data</button>
    </form>

</body>

</html>