<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property string $name
 * @property string $position
 * @property string $address
 * @property string $association_number
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Association extends Model
{
    use SoftDeletes;
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'position', 'address', 'association_number', 'created_at', 'updated_at', 'deleted_at'];

}
