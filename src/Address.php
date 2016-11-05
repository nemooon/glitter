<?php

namespace Nemooon\Glitter;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'primary',
        'name',
        'name_kana',
        'postal_code',
        'state_region',
        'address_line1',
        'address_line2',
        'address_line3',
        'phone_number',
    ];

    /**
     * ======================
     * Relationships
     * ======================
     */

    protected $customerModel = Customer::class;

    public function customer()
    {
        return $this->belongsTo($this->customerModel);
    }
}
