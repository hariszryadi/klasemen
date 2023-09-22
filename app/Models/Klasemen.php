<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klasemen extends Model
{
    use HasFactory;

    protected $table = 'klasemen';

    protected $fillable = ['klub_id', 'bermain', 'menang', 'seri', 'kalah', 'gol_masuk', 'gol_kebobolan', 'poin'];

    public function klub() {
        return $this->belongsTo(Klub::class, 'klub_id');
    }
}
