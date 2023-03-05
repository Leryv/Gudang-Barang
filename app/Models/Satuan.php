<?php

namespace App\Models;

use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    use HasFactory;
    use AutoNumberTrait;

    protected $table = 'satuans';
    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'kode_satuan',
        'satuan'
    ];

    public function getAutoNumberOptions()
    {
        return [
            'kode_satuan' => [
                'format' => function () {
                    return 'STU/' . date('Ymd') . '/?';
                },
                'length' => 3
            ]
        ];
    }

}