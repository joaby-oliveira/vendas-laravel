<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    use HasUuids;


    protected $table = 'sales';
    protected $primarykey = 'id';


    protected $fillable = [
        'product_name',
        'quantity',
        'price',
        'id_salesman',
    ];

    public function salesman()
    {
        return $this->belongsTo(Salesman::class);
    }
}
