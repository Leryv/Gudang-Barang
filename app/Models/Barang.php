<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Satuan;
use App\Models\Kategori;
use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use AutoNumberTrait;

    use HasFactory;

    protected $table = 'barangs';
    protected $guarded = [
        "id"
    ];

    protected $fillable = [
        'nama_barang',
        'harga',
        'kategori_id',
        'brand_id',
        'satuan_id',
        'stock'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }

    public function getAutoNumberOptions()
    {
        return [
            'no_reg' => [
                'format' => function () {
                    return 'BRG/' . date('Ymd') . '/?';
                },
                'length' => 3
            ]
        ];
    }


}