<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function allJoinFacade()
    {
    $kampus = "Universitas Multi Data Palembang";
    $result = DB::select('select mahasiswas.*, prodis.nama as nama_prodi from prodis, mahasiswas where prodis.id = mahasiswas.prodi_id');
    return view('prodi.index', ['allmahasiswaprodi' => $result, 'kampus' => $kampus]);
    }

    public function create()
    {
        return view('prodi.create');
    }

    public function allJoinElq()
    {
        $prodis = Prodi::with('mahasiswa')->get();
        foreach ($prodi as $prodi){
            echo "<h3>{$prodi->$nama}</h3>";
            echo "<hr>Mahasiswa : ";
            foreach ($prodi->mahasiswa as $mhs){
                echo $mhs->nama_mahasiswa .",";
            }
            echo "<hr>";
        }
    }

    public function store(Request $request)
    {
       // dump($request);
        // echo $request->nama;

        $validate = $request->validate([
            'nama' => 'required|min:5|max:20',
        ]);
       // dump($validate);
       // echo $validate['nama'];

       $prodi = new prodi();
       $prodi->nama = $validateData['nama'];
       $prodi->save();

       $request->session()->flash('info',"data prodi $prodi->nama berhasil disimpan ke database");
       return redirect()->route('prdi.create');
    }
}
