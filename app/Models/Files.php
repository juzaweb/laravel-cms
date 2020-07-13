<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Files
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property string $path
 * @property string $extension
 * @property int $size
 * @property int|null $folder_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Files newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Files newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Files query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Files whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Files whereExtension($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Files whereFolderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Files whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Files whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Files wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Files whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Files whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Files whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Files whereUserId($value)
 * @mixin \Eloquent
 */
class Files extends Model
{
    //
}
