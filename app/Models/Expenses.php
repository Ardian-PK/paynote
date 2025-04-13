<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Expenses extends Model
{
    // Inisialisasi Tabel
    protected $table = 'expenses';
    public $timestamps = false;

    // Fill Tabel
    protected $fillable = [
        'amount', 'description', 'date', 'id_cicilan', 'ref_expense', 'created_at', 'name_expense'
    ];

    //generate ref
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Generate ref_expense hanya jika belum diisi
            if (empty($model->ref_expense)) {
                do {
                    $ref = 'REF-' . strtoupper(Str::random(8));
                } while (self::where('ref_expense', $ref)->exists());

                $model->ref_expense = $ref;
            }
        });
    }

    
    // Get All Data
    public static function getAll()
    {
        return Expenses::all();
    }

    // Get Data by ID
    public static function getById($id)
    {
        return Expenses::where('id_expense', $id)->first();
    }

    // Insert Data
    public static function insert($data)
    {
        // Ambil amount dari $data
        $amount = $data['amount'];

        // tambahkan description ke tabel balance
        $description = "Pengeluaran";

        // tambahkan data ke tabel balance
        $balance = Balance::create([
            // Kurangi jumlah balance dengan amount dari $data
            'amount' => -1 * $amount,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // Jika penambahan data ke tabel balance berhasil
        if ($balance) {
            // Tambahkan data ke tabel Incomes
            $expense = Expenses::create($data);
            return $expense;
        }

        // Jika penambahan data ke tabel balance gagal, return false
        return false;
    }

    // Total Pengeluaran
    public static function totalExpenses()
    {
        // Ambil semua data dari model
        $expenses = Expenses::all();

        // Set variabel total_expenses
        $total_expenses = 0;

        // Looping data
        foreach ($expenses as $expense) {
            // Tambahkan amount ke variabel total_expenses
            $total_expenses += $expense->amount;
        }

        // Return total_expenses
        return $total_expenses;
    }
}
