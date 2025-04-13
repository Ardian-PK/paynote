<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cicilan extends Model
{
    // Inisialisasi Table
    protected $table = 'cicilan';
    public $timestamps = false;

    // Mass Assignment
    protected $fillable = [
        'name_cicilan'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Generate ref_cicilan hanya jika belum diisi
            if (empty($model->ref_cicilan)) {
                do {
                    $ref = 'REF-' . strtoupper(Str::random(8));
                } while (self::where('ref_cicilan', $ref)->exists());

                $model->ref_cicilan = $ref;
            }
        });
    }

    // Get All Data
    public static function getAll()
    {
        return Cicilan::all();
    }

    // Get Data by ID
    public static function getById($id)
    {
        return Cicilan::where('id_cicilan', $id)->first();
    }
    
    
    
    // Insert Data
    public static function insert($data)
    {
        // menambahkan ref_cicilan
        if (!isset($data['ref_cicilan'])) {
            $data['ref_cicilan'] = 'REF-' . strtoupper(Str::random(8));
        }
        return Cicilan::create($data);
    }

    // Update Data
    public static function updateData($id_cicilan, $data)
    {
        return Cicilan::where('id_cicilan', $id_cicilan)->update($data);
    }

    // Delete Data
    public static function deleteData($id)
    {
        return Cicilan::where('id_cicilan', $id)->delete();
    }

    // Get Total Data
    public static function totalCicilan()
    {
        return Cicilan::count();
    }
}
