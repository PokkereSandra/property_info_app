<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Person extends Model
{
    use HasFactory;

    public const INDIVIDUAL = 1;
    public const ENTITY = 2;

    protected $fillable = [
        'name',
        'identification_number',
        'status',
    ];

    protected $table = 'persons';

    public function properties(): HasMany
    {
        return $this->hasMany(Property::class);
    }

    public static function getPersonStatuses():array
    {
        return [
            self::INDIVIDUAL => 'fiziska persona',
            self::ENTITY => 'juridiska persona',
        ];
    }
    public function getPersonStatus(int $status):string
    {
        return self::getPersonStatuses()[$status];
    }

    public function getPropertySum():float
    {
        $sum = 0;
        foreach ($this->properties as $property){
            $sum+=$property->sumOfPropertyParts();
        }
        return $sum;
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(function ($person) {
            $person->properties()->each(function ($property) {
                $property->delete();
            });

        });
    }
}
