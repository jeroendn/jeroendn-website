<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * All projects for admins, only the publicly visible ones for everyone else, newest first.
     *
     * @return Collection<int, self>
     */
    public static function visibleToCurrentUser(): Collection
    {
        return self::query()
            ->when(!isAdmin(), fn ($query) => $query->where('show', true))
            ->orderByDesc('id')
            ->get();
    }
}
