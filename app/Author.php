<?php

namespace App;

use Carbon\Carbon;
use App\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Author
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 ** @property-read HasMany|Message $messages
 *
 * @package App
 */
class Author extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name'
    ];

    /**
     * @var string[]
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * An author has messages.
     *
     * @return HasMany
     */
    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }
}
