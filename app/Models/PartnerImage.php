<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PartnerImage extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'partner_images';
    protected $fillable = ['image','partner_id'];

    public function partnerImages()
    {
        return $this->belongsTo(Partner::class,'partner_id','id');
    }
}
