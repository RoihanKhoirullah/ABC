<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;


class GaleriController extends Controller
{
   
    public function index()
    {
        $galeris = Galeri::all();
        return view('galeri.index' ,  compact('galeris'));
    }

  
    public function create()
    {
        return view('galeri.create');
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required',
        ]);
        
        $file = $request->foto;
        $namaFile = $file->getClientOriginalName();
        $file->move(public_path().'/foto', $namaFile);
        Galeri::create([
            "foto" => $namaFile,
        ]);

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('galeri.index')->with('success', 'Data Berhasil Tersimpan');
    }


  
    public function edit($id)
    {
        $galeris = Galeri::findOrFail($id);
        return view('galeri.edit', compact('galeris'));
    }

    public function update(Request $request, $id)
    {
        $galeris = Galeri::findOrFail($id);
        if($request->file('foto') != null && $request->hasFile('foto'))
        {
            $file = 'foto/'.$galeris->foto;
            if(is_file($file))
            {
                unlink($file);
            }
            $file = $request->file('foto');
            $filename = $file->getClientOriginalName();
            $request->file('foto')->move('foto/', $filename);
            $galeris->foto = $filename;
        }
        $galeris->save();
        
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('galeri.index')->with('success', 'Data berhasil di update');   
    }

  
    public function destroy($id)
    {
        $data = Galeri::findOrFail($id);
        $file = 'foto/'.$data->foto;
        if(is_file($file))
        {
            unlink($file);
        }
        $data->delete();
        
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('galeri.index')->with('success', 'Data Berhasil Dihapus');
    }
}
