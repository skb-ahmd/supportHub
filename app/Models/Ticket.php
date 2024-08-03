<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_number', 'customer_name', 'email', 'phone_number', 'problem_description', 'status', 'agent_id',
    ];

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
