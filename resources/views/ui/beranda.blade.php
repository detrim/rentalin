@extends('ui.main')
@extends('ui.layout.sidebarui')

@section('contentui')
    <div class="content-wrapper" style="margin-top: 0px" style="margin-bottom: 200px">
        <!-- Content Header (Page header) -->
        <br><br>
        <section class="content-header" style="margin-top: -20px">
            <hr>
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading"></h4>
                            <p>
                            <h4>Butuh barang rental, ke rentalin aja.</h4>
                            </p>
                            <p class="mb-0"></p>
                        </div>

                    </div>

                </div>
                <hr>
            </div><!-- /.container-fluid -->
        </section>





        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <span>
                                    <h3>{{ $mobil }}</h3>
                                    <h6>Tersedia</h6>
                                </span>

                                <h3> <b>Mobil</b></h3>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ url('ui-mobil') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <span>
                                    <h3>-/-</h3>
                                    <h6>Tersedia</h6>
                                </span>

                                <h3> <b>Motor</b></h3>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <span>
                                    <h3>-/-</h3>
                                    <h6>Tersedia</h6>
                                </span>

                                <h3> <b>Playstation</b></h3>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <span>
                                    <h3>-/-</h3>
                                    <h6>Tersedia</h6>
                                </span>

                                <h3> <b>Skuter</b></h3>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
            </div>
        </section>


        <!-- /.content -->
    </div>
@endsection
