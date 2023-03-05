<?php

namespace App\Models;

use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    use AutoNumberTrait;

    protected $table = 'kategoris';
    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'kategori'
    ];

    public function getAutoNumberOptions()
    {
        return [
            'kode_kategori' => [
                'format' => function () {
                    return 'KTG/' . date('Ymd') . '/?';
                },
                'length' => 3
            ]
        ];
    }

}