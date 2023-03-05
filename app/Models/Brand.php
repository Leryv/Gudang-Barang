<?php

namespace App\Models;

use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    use AutoNumberTrait;
    protected $table = 'brands';
    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'brand',
        'kode_brand'
    ];
    public function getAutoNumberOptions()
    {
        return [
            'kode_brand' => [
                'format' => function () {
                    return 'BRD/' . date('Ymd') . '/?';
                },
                'length' => 3
            ]
        ];
    }
}