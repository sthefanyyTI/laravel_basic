<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Salas extends Model
{
    use HasFactory;

    protected $table = 'salas';

    protected $fillable = [
        'name',
        'qty',
        'description',
        'image',
        'itens',
    ];

    protected $casts = [
        'itens' => 'array',  // converte automaticamente para array JSON
    ];

    protected $date = ['date'];

    //protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }
}

