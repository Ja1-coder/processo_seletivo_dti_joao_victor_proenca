<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['user_id', 'title', 'description', 'status'])]
class Task extends Model
{
    use HasFactory;

    /**
     * Relacionamento: Uma tarefa pertence a um usuário.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Conversão de tipos (Casts)
     */
    protected function casts(): array
    {
        return [
            'status' => 'integer',
        ];
    }
}
