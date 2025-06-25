<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ChatRoom extends Model
{
    protected $fillable = [
        'category_room_id',
        'users',
        'created_at',
        'updated_at'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(CategoryRoom::class);
    }

    // Relacionamento Many-to-Many com usuários
    public function usersList(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'users_has_chat_rooms', 'chat_rooms_id', 'users_id');
    }
}
