<?php

namespace Modules\Tenant\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Tenant\Database\Factories\DomainFactory;

class Domain extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    /**
     * Relationship of Domain with Tenant
     */
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    // protected static function newFactory(): DomainFactory
    // {
    //     // return DomainFactory::new();
    // }
}
