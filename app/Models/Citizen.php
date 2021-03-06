<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property integer $document_id
 * @property string $name
 * @property string $nik
 * @property string $address
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Document $document
 * @property File[] $files
 */
class Citizen extends Model
{
    use SoftDeletes;

    static $PENDING = 0;
    static $PROGRESS = 1;
    static $DONE = 2;

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['document_id', 'name', 'nik', 'address', 'whatsapp_number', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function document()
    {
        return $this->belongsTo('App\Models\Document');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function files()
    {
        return $this->hasMany('App\Models\File');
    }
}
