<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;
    protected $guarded = [''];

    /**
     * Get the departement that owns the Employer
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function departement() {
        return $this->belongsTo(Departement::class);
    }
}
