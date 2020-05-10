<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jadwal Dokter</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Nama Pasien</th>
                <th>Nama Dokter</th>
                <th>Tindakan</th>
                <th>Status</th>
                <th>Jam Masuk</th>
                <th>Jam Selesai</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($data as $op) {
            ?>
            <tr>
                <td><?php echo($op->pasien) ?></td>
                <td><?php echo($op->dokter) ?></td>
                <td><?php echo($op->tindakan) ?></td>
                <td><?php echo($op->status) ?></td>
                <td><?php echo($op->created_at) ?></td>
                <td><?php echo($op->jam_keluar) ?></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</body>

</html>