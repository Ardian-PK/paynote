<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incomes;
use App\Models\Balance;
use App\Models\Cicilan;

class IncomesController extends Controller
{
    // Menampilkan Semua Data
    public function index()
    {
        $incomes = Incomes::getAll(); // Ambil semua data pemasukan
        $cicilan = Cicilan::getAll(); // Ambil semua data cicilan
        return view('dashboard.incomes.list', compact('incomes', 'cicilan'));
    }

    // Goto Add Data Page
    public function addPage()
    {
        $title = "Tambah Data Pemasukan";
        $cicilan = Cicilan::getAll(); // Ambil semua data cicilan
        return view('dashboard.incomes.add', compact('title', 'cicilan'));
    }

    // Insert Data
    public function insert(Request $request)
    {
        
        // Masukkan catatan pendapatan baru ke dalam database.
        $income = Incomes::insert([
            'amount'        => $request->amount,
            'description'   => $request->description,
            'date'          => $request->date,
            'name_income'   => $request->name_income,
            'created_at'    => now(),
        ]);

        // Notifikasi
        if ($income) {
            return redirect()->route('incomes')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->route('incomes')->with('error', 'Data Gagal Ditambahkan');
        }
    }

    // Delete Data
    public function delete($id)
    {
        // Hapus data pendapatan berdasarkan id
        $income = Incomes::deleteData($id);

        // Notifikasi
        if ($income) {
            return redirect()->route('incomes')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('incomes')->with('error', 'Data Gagal Dihapus');
        }
    }
}
