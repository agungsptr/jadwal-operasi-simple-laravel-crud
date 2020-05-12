<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jadwal Operasi</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <style>
        .vertical-center {
            margin: 0;
            position: absolute;
            top: 50%;
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }
    </style>
</head>

<body>
    <div class="bg-primary shadow text-light rounded-lg d-flex justify-content-center p-1 mb-3" style="height: 83px">
        <p class="display-4 m-0" id="datetime"></p>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-4" style="height: 638px;">
                <!-- <img src="/img/logo-rsia-ph.png" class="img-fluid vertical-center pr-3" alt="Responsive image"> -->
            </div>
            <div class="col-8">

                <!-- start slide -->
                <div id="slide-ph" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        for ($i = 0; $i < $data->lastPage(); $i++) {
                        ?>
                            <div class="carousel-item <?php echo ($data->onFirstPage() == true) ? 'active' : ''; ?>">
                                <table class="table table-bordered">
                                    <thead class="thead-light">
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
                                                <td><?php echo ($op->pasien) ?></td>
                                                <td><?php echo ($op->dokter) ?></td>
                                                <td><?php echo ($op->tindakan) ?></td>
                                                <td><?php echo ($op->status) ?></td>
                                                <td><?php echo ($op->created_at) ?></td>
                                                <td><?php echo ($op->jam_keluar) ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>z
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <!-- end slide -->
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="/js/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            const months = ['JAN', 'FEB', 'MAR', 'APR', 'MEI', 'JUN', 'JUL', 'AGU', 'SEP', 'OKT', 'NOV',
                'DES'
            ];
            const days = ['MINGGU', 'SENIN', 'SELASA', 'RABU', 'KAMIS', 'JUMAT', 'SABTU']
            setInterval(function() {
                var dt = new Date();
                $('#datetime').html(days[dt.getDay()] + ', ' + dt.getDate() + ' ' + months[dt
                        .getMonth()] + ' ' + dt
                    .getFullYear()
                );
            }, 1000);
        });
    </script>
</body>

</html>