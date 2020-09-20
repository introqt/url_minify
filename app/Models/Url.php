<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Url
 *
 * @package App\Models
 */
class Url extends Model
{
    /** @var array */
    protected $guarded = ['id'];

    /** @var array */
    protected $dates = ['expires_at'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'short_url';
    }

    /**
     * Link is active for 10 days if no expiration date provided
     *
     * @param $value
     */
    public function setExpiresAtAttribute($value): void
    {
        $this->attributes['expires_at'] = $value ?? now()->addDays(10);
    }
}
