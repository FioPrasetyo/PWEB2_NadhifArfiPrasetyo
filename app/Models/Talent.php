<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talent extends Model
{
    use HasFactory;
    protected $fillable = ['username','followers','notelfon','ratecard'];
    protected $table = 'talent';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
