<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class FaqTranslation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'faq_id',
        'locale',
        'question',
        'answer',
    ];

    /**
     * The faq relationship method returns the FAQ associated with the translation.
     *
     * @return BelongsTo
     */
    public function faq(): BelongsTo
    {
        return $this->belongsTo(Faq::class);
    }
}
