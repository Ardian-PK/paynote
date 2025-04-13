<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expenses;
use App\Models\Cicilan;

class ExpensesController extends Controller
{
    // Halaman List Pengeluaran
    public function index()
    {
        $expenses = Expenses::getAll();
        $cicilan = Cicilan::getAll();
        return view('dashboard.expenses.list', compact('expenses', 'cicilan'));
    }

    // Halaman Tambah Pengeluaran
    public function addPage()
    {
        $cicilan = Cicilan::getAll();
        return view('dashboard.expenses.add', compact('cicilan'));
    }

    // Tambah Pengeluaran
    public function insert(Request $request)
    {
        // Insert data ke table
        $expense = Expenses::insert([
            'amount'        => $request->amount,
            'description'   => $request->description,
            'date'          => $request->date,
            'name_expense'   => $request->name_expense,
            'created_at'    => date('Y-m-d H:i:s')
        ]);

        // Cek jika berhasil
        if ($expense) {
            return redirect('/expenses')->with(['success' => $request->description . 'Telah ditambahkan']);
        } else {
            return redirect('/expenses')->with(['error' => 'Terjadi kesalahan']);
        }    
    }
}
