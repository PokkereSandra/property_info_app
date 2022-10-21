<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PropertyPart extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'type_id',
        'cadastral_designation',
        'area_ha',
        'measured_at',
    ];

    protected $table = 'property_parts';

    public function property():BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
}
