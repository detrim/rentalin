<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;
use App\Models\Ui;
use PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

// use Barryvdh\DomPDF\Facade\Pdf;

class TransaksiMobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarik = Ui::all()->last();
        $role_id = $tarik->role_id;
        if ($role_id == null) {
            $role = '1';
        // dd($role);
        } else {
            $role = $role_id;
            // dd($role);
        }
        return view('mobil.transaksi.main', [
            'transaksimobil' => Ui::where('role_id', $role)->orderBY('id', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pdfexport(Request $request)
    {
        $tgl1 = $request->tgl_1;
        $tgl2 = $request->tgl_2;
        $status = $request->status;
        // $tarik = Ui::where('role_id', 1)->get();
        // $pendapatan = array_sum($tarik->total_dp);
        $pendapatan = DB::table('rentmobils')->select('rentmobils.total_dp')->sum('rentmobils.total_dp');
        // dd($tarik);
        // dd($pendapatan);

        $data = Ui::whereBetween('tgl_dp', [$tgl1, $tgl2])->where('status', 'like', "%" . $status . "%")->get();
        // view()->share('data', $data);
        // dd($data);
        // dd($tgl1, $tgl2);
        // return view('mobil.transaksi.pdf', compact('tgl1', 'tgl2', 'pendapatan'))->with('data', $data);
        $pdf=PDF::loadview('mobil.transaksi.pdf', compact('tgl1', 'tgl2', 'data', 'pendapatan'));
        return $pdf->download('laporan-mobil.pdf');
    }
    public function pdf(Request $request)
    {
        $data = Rental::all();
        view()->share('data', $data);
        $pdf=PDF::loadview('mobil.transaksi.pdf');
        return $pdf->download('data.pdf');
    }
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
