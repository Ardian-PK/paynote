<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cicilan;

class CicilanController extends Controller
{
    // Menampilkan All Data
    public function index()
    {
        $cicilan = Cicilan::getAll();
        return view('dashboard.cicilan.list', compact('cicilan'));
    }

    // Goto Add Data Page
    public function addPage()
    {
        $title = "Tambah Kategori";
        return view('dashboard.cicilan.add', compact('title'));
    }

    // Insert & Send Data to Model
    public function insert(Request $request)
    {
        $data = [
            'name_cicilan' => $request->name_cicilan
        ];

        Cicilan::insert($data);
        return redirect()->route('cicilan')->with('success', 'Data berhasil ditambahkan!');
        
    }
    

    // Go to Edit Data Page
    public function editPage($id)
    {
        $title = "Edit Cicilan";
        $cicilan = Cicilan::getById($id);
        return view('dashboard.cicilan.edit', compact('title', 'cicilan'));
    }

    // Update Data via Model
    public function update(Request $request, $id_cicilan)
    {
        $data = [
            'name_cicilan' => $request->name_cicilan
        ];

        Cicilan::updateData($id_cicilan, $data);
        return redirect()->route('cicilan')->with('success', 'Data berhasil diubah!');
    }

    // Delete Data
    public function delete($id)
    {
        Cicilan::deleteData($id);
        return redirect()->route('cicilan')->with('success', 'Data berhasil dihapus!');
    }
}