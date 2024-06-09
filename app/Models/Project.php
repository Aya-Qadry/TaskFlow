<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'due_date', 'client_id' , 'status' , 'logo'];

    public function user()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
}
