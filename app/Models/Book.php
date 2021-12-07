<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sewa;
use App\Models\User;

class Book extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function sewas()
    {
        return $this->hasMany(Sewa::class);
    }
}
