<?php

namespace App\Models;

use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Enums\TransaksiStatus;

class Transaksi extends Model
{

    use HasFactory;

    use AutoNumberTrait;
    protected $table = 'transaksis';
    protected $fillable = [
        'user_id',
        'barang_id',
        'jumlah_permintaan',
        'status'
    ];
    protected $guarded = [
        'id'
    ];

    protected $casts = [
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getAutoNumberOptions()
    {
        return [
            'kode_transaksi' => [
                'format' => function () {
                    return 'TRS/' . date('Ymd') . '/?';
                },
                'length' => 3
            ]
        ];
    }

}