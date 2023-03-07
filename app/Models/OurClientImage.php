<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OurClientImage extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'our_client_images';
    protected $fillable = [
        'image',
        'our_client_id'
    ];

    public function ourClient()
    {
        return $this->belongsTo(OurClient::class,'our_client_id','id');
    }
}
