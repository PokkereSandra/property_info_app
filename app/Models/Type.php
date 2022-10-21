<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
    ];

    public function propertyPart(): HasMany
    {
        return $this->hasMany(PropertyPart::class);
    }

    public static function getTypes(): Collection
    {
        return Type::all();
    }

}
