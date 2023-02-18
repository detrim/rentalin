<!DOCTYPE html>
<html lang="en">
<?php $total_j = 0; ?>
<?php $total_f = 0; ?>
<?php $total_ma = 0; ?>
<?php $total_a = 0; ?>
<?php $total_me = 0; ?>
<?php $total_jun = 0; ?>
<?php $total_jul = 0; ?>
<?php $total_agu = 0; ?>
<?php $total_s = 0; ?>
<?php $total_o = 0; ?>
<?php $total_n = 0; ?>
<?php $total_d = 0; ?>

<?php $p_j = 0; ?>
<?php $p_f = 0; ?>
<?php $p_ma = 0; ?>
<?php $p_a = 0; ?>
<?php $p_me = 0; ?>
<?php $p_jun = 0; ?>
<?php $p_jul = 0; ?>
<?php $p_agu = 0; ?>
<?php $p_s = 0; ?>
<?php $p_o = 0; ?>
<?php $p_n = 0; ?>
<?php $p_d = 0; ?>

<?php foreach ($data as $j) {
    if (date('m', strtotime($j->created_at)) == 1) {
        $total_j += $j->total_dp;
        $p_j += $j->role_id;
    } elseif (date('m', strtotime($j->created_at)) == 2) {
        $total_f += $j->total_dp;
        $p_f += $j->role_id;
    } elseif (date('m', strtotime($j->created_at)) == 3) {
        $total_ma += $j->total_dp;
        $p_ma += $j->role_id;
    } elseif (date('m', strtotime($j->created_at)) == 4) {
        $total_a += $j->total_dp;
        $p_a += $j->role_id;
    } elseif (date('m', strtotime($j->created_at)) == 5) {
        $total_me += $j->total_dp;
        $p_me += $j->role_id;
    } elseif (date('m', strtotime($j->created_at)) == 6) {
        $total_jun += $j->total_dp;
        $p_jun += $j->role_id;
    } elseif (date('m', strtotime($j->created_at)) == 7) {
        $total_jul += $j->total_dp;
        $p_jul += $j->role_id;
    } elseif (date('m', strtotime($j->created_at)) == 8) {
        $total_agu += $j->total_dp;
        $p_agu += $j->role_id;
    } elseif (date('m', strtotime($j->created_at)) == 9) {
        $total_s += $j->total_dp;
        $p_s += $j->role_id;
    } elseif (date('m', strtotime($j->created_at)) == 10) {
        $total_o += $j->total_dp;
        $p_o += $j->role_id;
    } elseif (date('m', strtotime($j->created_at)) == 11) {
        $total_n += $j->total_dp;
        $p_n += $j->role_id;
    } elseif (date('m', strtotime($j->created_at)) == 12) {
        $total_d += $j->total_dp;
        $p_d += $j->role_id;
    }
} ?>



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">

                    {{-- <form action="" class="d-inline" method="post">
                        @csrf
                        <button class="btn btn-danger btn-sm">
                            <i class="fas fa-power-off"></i>
                        </button>
                    </form> --}}
                    <a class="nav-link" href="{{ url('logout') }}" role="button"
                        onclick="javascript: return confirm('Logout ?')">
                        <i class="fas fa-power-off"></i>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="" class="brand-link">
                <img src="{{ asset('assets/img/Admin.png') }}" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <strong class="brand-text">Admin {{ $p_j }}, {{ $p_f }}, {{ $p_ma }},
                    {{ $p_a }},
                    {{ $p_me }}, {{ $p_jun }}, {{ $p_jul }},
                    {{ $p_agu }},
                    {{ $p_s }}, {{ $p_o }}, {{ $p_n }},
                    {{ $p_d }}</strong>

            </a>

            <!-- Sidebar -->
            @yield('sidebar')
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->

        @yield('content')

        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- Select2 -->
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js"
        integrity="sha512-v3ygConQmvH0QehvQa6gSvTE2VdBZ6wkLOlmK7Mcy2mZ0ZF9saNbbk19QeaoTHdWIEiTlWmrwAL4hS8ElnGFbA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- <script src="{{ asset('assets/js/dashboard.js') }}"></script> --}}

    {{-- <script src="{{ asset('assets/js/demo.js') }}"></script> --}}
    <!-- Page specific script -->
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                "buttons": ["copy", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    {{-- {{ $pendapatanpertahun }} --}}


    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                    'Oktober',
                    'November', 'Desember'
                ],
                datasets: [{
                    label: 'Pendapatan',
                    backgroundColor: 'rgba(143,206,0)',
                    borderColor: 'rgba(143,206,0)',
                    pointRadius: false,
                    pointColor: '#8FCE00',
                    pointStrokeColor: 'rgba(143,206,0)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(143,206,0)',

                    data: [{{ $total_j }}, {{ $total_f }}, {{ $total_ma }},
                        {{ $total_a }},
                        {{ $total_me }}, {{ $total_jun }}, {{ $total_jul }},
                        {{ $total_agu }},
                        {{ $total_s }}, {{ $total_o }}, {{ $total_n }},
                        {{ $total_d }}
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                locale: 'id-ID',
                scales: {
                    y: {
                        ticks: {
                            callback: (
                                value,
                                index,
                                values
                            ) => {
                                return new Intl.NumberFormat('id-ID', {
                                    style: 'currency',
                                    currency: 'IDR',
                                    maximumSignificanDigits: 3
                                }).format(value);
                            }
                        },
                        beginAtZero: true
                    },

                }
            }
        });
    </script>

    <script>
        const ctxx = document.getElementById('myChartdua');

        new Chart(ctxx, {
            type: 'bar',
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                    'Oktober',
                    'November', 'Desember'
                ],
                datasets: [{
                    label: 'Penyewa',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',

                    data: [{{ $p_j }}, {{ $p_f }}, {{ $p_ma }},
                        {{ $p_a }},
                        {{ $p_me }}, {{ $p_jun }}, {{ $p_jul }},
                        {{ $p_agu }},
                        {{ $p_s }}, {{ $p_o }}, {{ $p_n }},
                        {{ $p_d }}
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                locale: 'id-ID',
                scales: {
                    y: {
                        ticks: {
                            callback: (
                                value,
                                index,
                                values
                            ) => {
                                return new Intl.NumberFormat('id-ID', {
                                    maximumSignificanDigits: 3
                                }).format(value);
                            }
                        },
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.nwnp').mask("00.000.000.0-000.000");
            $('.hp').mask('0000-0000-0000');
            $('.nip').mask('00000000 000000 000');
        });
    </script>

    <script>
        function previewImgCreate() {

            const sampul = document.querySelector('#photos');
            const imgPreview = document.querySelector('.img-preview');

            const fileSampul = new FileReader();
            fileSampul.readAsDataURL(sampul.files[0]);

            fileSampul.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>


    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/fontawesome.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js"
        integrity="sha512-2bMhOkE/ACz21dJT8zBOMgMecNxx0d37NND803ExktKiKdSzdwn+L7i9fdccw/3V06gM/DBWKbYmQvKMdAA9Nw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>
