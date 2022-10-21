<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Property extends Model
{
    use HasFactory;

    public const PURCHASE_AGREEMENT = 1;
    public const PAID = 2;
    public const REGISTERED = 3;
    public const SOLD = 4;

    protected $fillable = [
        'person_id',
        'title',
        'cadastral_number',
        'status',
    ];

    public function person():BelongsTo
    {
        return $this->belongsTo(Person::class);
    }

    public function propertyParts(): HasMany
    {
        return $this->hasMany(PropertyPart::class);
    }

    public function sumOfPropertyParts()
    {
        return $this->propertyParts()->sum('area_ha');
    }

    public static function getPropertyStatuses():array
    {
        return [
            self::PURCHASE_AGREEMENT => 'ir pirkšanas līgums',
            self::PAID => 'apmaksāts',
            self::REGISTERED => 'reģistrēts zemesgrāmatā',
            self::SOLD => 'pārdots',
        ];
    }

    public function getPropertyStatus(int $status):string
    {
        return self::getPropertyStatuses()[$status];
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(function ($property) {
            $property->propertyParts()->each(function ($propertyPart) {
                $propertyPart->delete();
            });

        });
    }
}
