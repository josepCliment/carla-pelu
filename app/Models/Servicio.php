<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description'
    ];
    protected $attributtes = [
        'name',
        'price',
        'description'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at',
        'created_at'
    ];


    public function tickets()
    {
        return $this->belongsToMany(Ticket::class, TicketServicio::class, 'servicio_id')
            ->withPivot(['discount', 'user_id', 'ticket_id', 'servicio_id']);
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'ticket_servicio')
            ->withPivot(['discount', 'user_id', 'ticket_id', 'servicio_id']);
    }
}
