<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Message extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'content',
        'from_id',
        'to_id',
        'read_at',
        'create_at',
    ];

    protected $date = ['crate_at','read_at'];

    public $timestamps = false;

    public function from() {
        return $this->belongsTo(User::class, 'from_id');
    }
}
