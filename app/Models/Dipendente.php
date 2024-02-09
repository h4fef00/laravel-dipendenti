<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dipendente extends Model
{
    use HasFactory;
    protected $table = 'dipendenti';
    protected $primaryKey = 'id';
    protected $dates = [
        "created_at",
        "updated_at"
    ];
    protected $fillable = [
        "name",
        "surname",
        "email"
    ];
}
