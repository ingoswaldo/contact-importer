<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'upload_file_id',
        'name',
        'email',
        'birthdate',
        'phone',
        'address',
        'credit_card',
        'franchise',
    ];

    protected $casts = [
        'birthdate' => 'datetime'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function uploadFile(): BelongsTo
    {
        return $this->belongsTo(UploadFile::class);
    }
}
