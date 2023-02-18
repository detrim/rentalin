@extends('main')

@extends('layout.sidebar')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4>Dahboard</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Data</li>
                        </ol>
                    </div>
                </div>
                <hr>
            </div><!-- /.container-fluid -->
        </section>


        <?php $total_ppt = 0; ?>
        <?php foreach ($pendapatanpertahun as $ppt) {
            $total_ppt += $ppt->total_dp;
        } ?>


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h6> <b>Rp.
                                        {{ number_format($total_ppt, 0, ',', '.') }}</b> </h6>

                                <p>Total Pendapatan <br> Pertahun {{ date('Y') }}</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-rupiah-sign"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->

                    <?php $total_ppb = 0; ?>
                    <?php foreach ($pendapatanperbulan as $ppb) {
                        if (date('m', strtotime($ppb->created_at)) == date('m', strtotime($ppb->created_at))) {
                            $total_ppb += $ppb->total_dp;
                        }
                    } ?>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h6> <b>Rp.
                                        {{ number_format($total_ppb, 0, ',', '.') }}</b> </h6>

                                <p>Total Pendapatan <br> Perbulan {{ date('F') }}</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-rupiah-sign"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <?php $total_pb = 0; ?>
                    <?php foreach ($penyewaperbulan as $pb) {
                        $total_pb += $pb->role_id;
                    } ?>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <div class="inner">
                                    <h5> <b>{{ $total_pb }}</b> </h5>

                                    <p>Total Penyewa <br> Perbulan {{ date('F') }}</p>
                                </div>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                    <?php $total_pt = 0; ?>
                    <?php foreach ($penyewapertahun as $pt) {
                        $total_pt += $pt->role_id;
                    } ?>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <div class="inner">
                                    <h5> <b>{{ $total_pt }}</b> </h5>

                                    <p>Total Penyewa <br> Pertahun {{ date('Y') }}</p>
                                </div>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->


        <!-- Left col -->
        <section class=" content ">
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-lg-6">

                        <!-- chart -->
                        <!-- BAR CHART -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Pendapatan</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="myChart"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-lg-6">

                        <!-- chart -->
                        <!-- BAR CHART -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Penyewa</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="myChartdua"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                </div>
            </div>

        </section>

    </div>
@endsection
