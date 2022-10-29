<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'prior', 'status', 'location_id', 'user_id', 'type_id', 'comment', 'closed_at', 'file_name', 'file_path'];

    // Relaciones uno a muchos inversa
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function location() {
        return $this->belongsTo(Location::class);
    }
    
}
