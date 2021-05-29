<?php

namespace Modules\Movie\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Modules\Movie\Models\Sliders
 *
 * @property int $id
 * @property string $name
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Movie\Models\Sliders newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Movie\Models\Sliders newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Movie\Models\Sliders query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Movie\Models\Sliders whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Movie\Models\Sliders whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Movie\Models\Sliders whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Movie\Models\Sliders whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\Movie\Models\Sliders whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Sliders extends Model
{
    protected $table = 'sliders';
    protected $fillable = [
        'name',
    ];
}
