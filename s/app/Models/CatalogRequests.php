<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogRequests extends Model
{
    use HasFactory;

    const CREATED_AT = 'dateadded';
    const UPDATED_AT = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address1',
        'address2',
        'city',
        'state',
        'zip',
        'phone',
        'email',
        'comments',
        'truck',
        'tough',
        'drydock',
        'bannerblank',
        'ingroundpool',
        'industrial',
        'fabricsample',
        'searchengine',
        'goodwords',
        'badwords'
    ];


}
