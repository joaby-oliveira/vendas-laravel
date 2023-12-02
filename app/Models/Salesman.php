<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salesman extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'salesman';
    protected $primarykey = 'uuid';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
