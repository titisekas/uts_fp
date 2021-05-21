<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Expr\List_;

class laptopController extends Controller
{
    public function list()
    {
        $hasil = DB::select('select * from laptop');
        return view('list-laptop', ['data' => $hasil]);
    }
    public function simpan(Request $req)
    {
        DB::insert(
            'insert into laptop (merk_laptop,seri_laptop, tahun_produksi) values (?, ?, ?)',
            [$req->merk_laptop, $req->seri_laptop, $req->tahun_produksi]
        );
        $hasil = DB::select('select * from laptop');
        return view('list-laptop', ['data' => $hasil]);
    }
    public function hapus($req)
    {
        Log::info('proses hapus dengan id=' . $req);
        DB::delete('delete from laptop where id = ?', [$req]);

        $hasil = DB::select('select * from laptop');
        return view('list-laptop', ['data' => $hasil]);
    }
    public function ubah($req)
    {
        $hasil = DB::select('select * from laptop where id = ?', [$req]);
        return view('form-ubah', ['data' => $hasil]);
    }
    public function rubah(Request $req)
    {
        Log::info('Hallo');
        Log::info($req);
        DB::update(
            'update laptop set ' .
                'merk_laptop=?, ' .
                'seri_laptop=?, ' .
                'tahun_produksi=? where id=? ',
            [
                $req->merk_laptop,
                $req->seri_laptop,
                $req->tahun_produksi,
                $req->id
            ]
        );
        $hasil = DB::select('select * from laptop');
        return view('list-laptop', ['data' => $hasil]);
    }
}
