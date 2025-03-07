<?php
include '../model/pegawai.php';

$pegawai = new Pegawai;

if (isset($_POST['action'])) {
    if ($_POST['action'] === 'create') {
        $pegawai->create($_POST['nama'], $_POST['nik'], $_POST['alamat']);
    } else if ($_POST['action'] === 'update') {
        $pegawai->update($_POST['nama'], $_POST['nik'], $_POST['alamat'], $_POST['id']);
    } else if ($_POST['action'] === 'delete') {
        $pegawai->delete($_POST['id']);
    }
}

$data = $pegawai->get_data();

?>

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

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>

</head>

<body>
    <h1>Data Pegawai</h1>
    <br>
    <a href="form_entri_pegawai.php">Tambah data</a>
    <br><br>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama Pegawai</th>
            <th>NIK</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $data->fetch_assoc()) { ?>
            <tr>
                <th><?= $row['PEGAWAI_ID'] ?></th>
                <th><?= $row['NAMA_PEGAWAI'] ?></th>
                <th><?= $row['NIK'] ?></th>
                <th><?= $row['ALAMAT'] ?></th>
                <th>
                    <button>
                        <a href="form_edit_pegawai.php?id=<?= $row['PEGAWAI_ID'] ?>">Edit</a>
                    </button>
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?=$row['PEGAWAI_ID'] ?>">
                        <button type="submit" name="action" value="delete" onclick="return confirm('apakah anda ingin menghapus data ini?')">Delete</button>
                    </form>
                </th>
            </tr>
        <?php } ?>
    </table>
</body>

</html>