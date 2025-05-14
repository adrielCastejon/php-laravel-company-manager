<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RolePermission extends Pivot
{
    use HasFactory;

    protected $table = 'role_permissions';

    protected $fillable = ['permission_id', 'role_id'];

    protected $casts = ['created_at' => 'datetime', 'updated_at' => 'datetime'];
}
