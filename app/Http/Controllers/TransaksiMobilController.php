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
        $role_id =  DB::table('rentmobils')->select('role_id')->get();
        // dd($role_id);
        $satu = "1";
        if ($role_id == null) {
            $role = null;
        // dd($role);
        } else {
            $role = $satu;
            // dd($role);
        }

        $dd = "%";
        $transaksimobil =Ui::where('role_id', $role)->orderBY('id', 'desc')->first();
        if (empty($transaksimobil)) {
            $transaksimobil =UI::all();
            return view('mobil.transaksi.main', compact('dd', 'transaksimobil'));
        } else {
            $transaksimobil =Ui::where('role_id', $role)->orderBY('id', 'desc')->get();
            return view('mobil.transaksi.main', compact('dd', 'transaksimobil'));
        }
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

        $pendapatan = DB::table('rentmobils')->select('rentmobils.total_dp')->sum('rentmobils.total_dp');
        $data = Ui::whereBetween('tgl_dp', [$tgl1, $tgl2])->where('status', 'like', "%" . $status . "%")->get();
        $pdf=PDF::loadview('mobil.transaksi.pdf', compact('tgl1', 'tgl2', 'data', 'pendapatan'));
        return $pdf->download('laporan-mobil.pdf');

        // if ($status == null) {
        //     $pendapatan = DB::table('rentmobils')->select('rentmobils.total_dp')->sum('rentmobils.total_dp');
        //     $data = Ui::whereBetween('tgl_dp', [$tgl1, $tgl2])->where('status', 'not like', "%" . $status . "%")->get();
        //     $pdf=PDF::loadview('mobil.transaksi.pdf', compact('tgl1', 'tgl2', 'data', 'pendapatan'));
        //     return $pdf->download('laporan-mobil.pdf');
        // } else {
        // }

        // // $tarik = Ui::where('role_id', 1)->get();
        // // $pendapatan = array_sum($tarik->total_dp);
        // $pendapatan = DB::table('rentmobils')->select('rentmobils.total_dp')->sum('rentmobils.total_dp');
        // // dd($tarik);
        // // dd($pendapatan);

        // $data = Ui::whereBetween('tgl_dp', [$tgl1, $tgl2])->where('status', 'like', "%" . $status . "%")->get();
        // // view()->share('data', $data);
        // // dd($data);
        // // dd($tgl1, $tgl2);
        // // return view('mobil.transaksi.pdf', compact('tgl1', 'tgl2', 'pendapatan'))->with('data', $data);
        // $pdf=PDF::loadview('mobil.transaksi.pdf', compact('tgl1', 'tgl2', 'data', 'pendapatan'));
        // return $pdf->download('laporan-mobil.pdf');
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
    public function show($faktur, $id)
    {
        // $transaksi =Ui::where('faktur', $faktur)->get();
        $dd = "%";
        $transaksi = DB::table('rentmobils')->join('rekenings', 'rentmobils.rk', '=', 'rekenings.rk')->join('invoices', 'rentmobils.faktur', '=', 'invoices.faktur')->select('rentmobils.*', 'rekenings.rk', 'rekenings.nama_rk', 'rekenings.nama', 'rekenings.icon', 'invoices.invoice')->where('rentmobils.faktur', $faktur)->limit(1)->orderByDesc('id')->get();

        // dd($detailTransaksi);
        return view('mobil.transaksi.show', compact('dd', 'transaksi'));
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
    public function print($faktur, $id)
    {
        // dd($faktur);
        // $rkk = Rekening::orderBY('id', 'desc')->get();
        $users = DB::table('rentmobils')->join('mobils', 'rentmobils.kode', '=', 'mobils.kode')->join('invoices', 'rentmobils.faktur', '=', 'invoices.faktur')->join('rekenings', 'rentmobils.rk', '=', 'rekenings.rk')->select('rentmobils.*', 'mobils.kode', 'mobils.nama_mobil', 'mobils.warna', 'mobils.nopol', 'mobils.harga_sewa', 'mobils.status', 'mobils.photos', 'invoices.invoice', 'invoices.faktur', 'rekenings.rk', 'rekenings.nama_rk', 'rekenings.icon')->where('rentmobils.faktur', $faktur)->limit(1)->orderByDesc('id')->get();
        $rek = DB::table('rentmobils')->join('rekenings', 'rentmobils.rk', '=', 'rekenings.rk')->select('rentmobils.id', 'rekenings.rk', 'rekenings.nama_rk', 'rekenings.nama', 'rekenings.icon')->where('rentmobils.faktur', $faktur)->limit(1)->orderByDesc('id')->get();
        // dd($users, $rek);

        // return view('ui.mobil.uinextbukti', compact('rkk'))->with('users', $users);
        return view('mobil.transaksi.print', compact('rek'))->with('users', $users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sewa(Request $request, $faktur, $id)
    {
        $cek_faktur = $request->no_faktur;
        // $cek_total_dp = $request->total_dp;
        // dd($cek_faktur, $cek_total_dp);
        $dd = "%";
        $validatedData = $request->validate([
            'status' => 'required',
            'total_dp' => 'required',
            ]);

        Ui::where('faktur', $cek_faktur)->update($validatedData);

        return redirect('transaksi-mobil/'.$faktur. $dd.'/detail');
    }
    public function dikembalikan(Request $request, $faktur, $id)
    {
        $cek_faktur = $request->no_faktur;
        $cek_kode = $request->no_kode;
        $cek_status = "Tersedia";
        // dd($cek_faktur, $cek_total_dp);
        $dd = "%";
        $validatedData = $request->validate([
            'status' => 'required',
            'total_dp' => 'required',
            ]);

        DB::table('mobils')->where('kode', $cek_kode)->update([
            'status' => $cek_status,
            ]);

        Ui::where('faktur', $cek_faktur)->update($validatedData);

        return redirect('transaksi-mobil/'.$faktur. $dd.'/detail');
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