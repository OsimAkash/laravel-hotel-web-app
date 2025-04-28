<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room; // Import Room Model

class RoomType extends Model
{
    use HasFactory;

    protected $table = 'type_rooms';

    protected $fillable = [
        'name',
        'foto',
        'price',
        'facilities',
        'information'
    ];

    // First define relation
    public function rooms()
    {
        return $this->hasMany(Room::class, 'type_id', 'id');
    }

    // Then filter available rooms
    public function getTotalRooms()
    {
        return $this->rooms()->where('status', '=', 'available');
    }
}
