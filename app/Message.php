<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Message
 *
 * @property int $id
 * @property string $body
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 * @property-read BelongsTo|Author $author
 *
 * @package App
 */
class Message extends Model
{
    use SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = [
        'body'
    ];

    /**
     * @var string[]
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * A message has an author.
     *
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
}
