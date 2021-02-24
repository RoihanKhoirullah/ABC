<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tentang;

class TentangController extends Controller
{

    public function index()
    {
        $tentangs = Tentang::all();
        return view('tentang.index' ,  compact('tentangs'));
    }

    public function create()
    {
        return view('tentang.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required',
            'keterangan' => 'required',
        ]);
        
        $file = $request->foto;
        $namaFile = $file->getClientOriginalName();
        $file->move(public_path().'/foto', $namaFile);
        Tentang::create([
            "foto" => $namaFile,
            "keterangan" => $request->keterangan
        ]);

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('tentang.index')->with('success', 'Data Berhasil Tersimpan');
    }

    public function edit($id)
    {
        $tentangs = Tentang::findOrFail($id);
        return view('tentang.edit', compact('tentangs'));
    }

    public function update(Request $request, $id)
    {
        $tentangs = Tentang::findOrFail($id);
        if($request->file('foto') != null && $request->hasFile('foto'))
        {
            $file = 'foto/'.$tentangs->foto;
            if(is_file($file))
            {
                unlink($file);
            }
            $file = $request->file('foto');
            $filename = $file->getClientOriginalName();
            $request->file('foto')->move('foto/', $filename);
            $tentangs->foto = $filename;
        }
        $tentangs->keterangan = $request->keterangan;
        $tentangs->save();
        
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('tentang.index')->with('success', 'Data berhasil di update');   
    }

    public function destroy($id)
    {
        $data = Tentang::findOrFail($id);
        $file = 'foto/'.$data->foto;
        if(is_file($file))
        {
            unlink($file);
        }
        $data->delete();
        
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('tentang.index')->with('success', 'Data Berhasil Dihapus');
    }
}
