<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @property integer $id
 * @property string $name
 * @property string $nik
 * @property string $address
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class KritikSaran extends Model
{
    use HasFactory;

    /**
    * @var array
    */
    protected $fillable = [ 'name', 'nik', 'address', 'content', 'created_at', 'updated_at', 'deleted_at' ];

    protected $table = 'kritik_saran';
}
