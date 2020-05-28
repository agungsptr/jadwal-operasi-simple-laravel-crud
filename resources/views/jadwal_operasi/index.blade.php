<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="refresh" content="60" />
    <title>Jadwal Operasi</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        .vertical-center {
            margin: 0;
            position: absolute;
            top: 50%;
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        h5 {
            margin: 0;
            padding: 0;
        }

        .elip {
            white-space: nowrap;
            overflow: hidden;
            width: 140px;
            text-overflow: ellipsis;
        }

        td {
            padding: 11px !important
        }

        p {
            margin: 0;
        }

    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row pb-3">
            <img src="img/header-edit.jpg" class="shadow" width="100%" alt="header">
        </div>
        <div class="row">
            <div class="col-4 pr-0">
                <div class="bg-primary shadow text-light rounded-lg d-flex justify-content-center mb-3"
                    style="height: 70px">
                    <p class="h1 mt-2 m-0" id="datetime"></p>
                </div>
                <!-- Slide -->
                <div id="slide-ph" class="carousel slide shadow" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        $dirname = "img/slide/";
                        $images = glob($dirname . "*.jpg");
                        $i = 0;
                        foreach ($images as $image) {
                        ?>
                        <div class="carousel-item <?php echo ($i == 0) ? 'active' : ''; ?>">
                            <img src="<?= $image ?>" class="w-100 h-100" alt="<?= $image ?>">
                        </div>
                        <?php
                            $i++;
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-8" id="data">
                <!-- start slide data -->
                <div id="slide-data" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner shadow">
                        @for ($i = 0; $i < count($list); $i++)
                        <div class="carousel-item {{ ($i == 0) ? 'active' : '' }}">
                            <table class="table table-striped table-bordered">
                                <thead class="thead-dark text-center">
                                    <tr>
                                        <th>Nama Pasien</th>
                                        <th>Nama Dokter</th>
                                        <th>Tindakan</th>
                                        <th>Status</th>
                                        <th>Masuk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list[$i] as $op)
                                    <tr>
                                        <td>
                                            <p class="elip"><strong>{{strtoupper($op->pasien)}}</strong></p>
                                        </td>
                                        <td>
                                            <p class="elip">{{strtoupper($op->dokter)}}</p>
                                        </td>
                                        <td>
                                            <p class="elip">{{strtoupper($op->tindakan)}}</p>
                                        </td>
                                        <td class="text-center">
                                            <h5>
                                                <span class="badge badge-pill badge-primary">                                                    
                                                    <p class="elip">{{strtoupper($op->status)}}</p>
                                                </span>
                                            </h5>
                                        </td>
                                        <td class="text-danger text-center">
                                            <h5><strong>{{substr($op->jam_masuk, 11, 5)}}</strong></h5>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
            <!-- end slide -->
        </div>
    </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="/js/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov',
                'DES'
            ];
            const days = ['MINGGU', 'SENIN', 'SELASA', 'RABU', 'KAMIS', 'JUMAT', 'SABTU']
            setInterval(function () {
                var dt = new Date();
                $('#datetime').html('Operasi ' + dt.getDate() + ' ' + months[dt
                        .getMonth()] + ' ' + dt
                    .getFullYear()
                );
            }, 1000);
        });

    </script>
</body>

</html>
