<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function home()
    {
        return view("home", ["key" => "home"]);
    }

    public function barang()
    {
        $barang = Barang::orderBy('id', 'desc') -> get();
        return view('barang', ['key' => 'barang', 'items' => $barang]);
    }

    public function formaddbarang()
    {
        return view("form-add", ["key" => "barang"]);
    }

    public function savebarang(Request $request)
    {
        $validatedData = $request->validate([
            'namabrg' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'bahan' => 'required|string|max:255',
            'jumlahbrg' => 'required|numeric',
            'merekBrg' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('public/fotos');
            $validatedData['foto'] = basename($fotoPath);
        }

        Barang::create($validatedData);

        return redirect()->back()->with('success', 'Barang berhasil ditambahkan!');
    }

    public function formeditbarang($id)
    {
        $barang = Barang :: findOrFail($id);
        dd($barang);
        return view("form-edit", ["key" => "barang"]);
    }

    public function updatebarang($id, Request $request)
    {
        $barang = Barang::findOrFail($id);
        
        $validatedData = $request->validate([
            'namabrg' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'bahan' => 'required|string|max:255',
            'jumlahbrg' => 'required|numeric',
            'merekBrg' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('public/fotos');
            $validatedData['foto'] = basename($fotoPath);
        }

        $barang->updatebarang($validatedData);

        return redirect()->back()->with('success', 'Barang berhasil diperbarui!');
    }

    public function deletebarang($id)
    {
        $barang = Barang::find($id);
        

        if ($barang->foto)
        {
            Storage::disk('public')->delete($barang->foto);
        }

        $barang->delete();
        return redirect('/barang') ->with ('alert', 'Data Berhasil Di Hapus');
    }

    public function login()
    {
        return view("login");
    }

    public function formedituser()
    {
        return view("formedituser", ["key" => ""]);
    }

    public function updateuser(Request $request)
    {
        if ($request -> password_baru = $request ->konfirmasi_password)
        {
            $user = Auth::user();

            $user -> password = bcrypt($request ->password_baru);
            $user -> save();

            return redirect("/user")-> with("info", "Password Berhasil di Ubah");
        }
        else
        {
            return redirect("/user")->with ("info", "Password Gagal di Ubah");
        }
    }
}