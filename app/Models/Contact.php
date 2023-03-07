<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory, SoftDeletes;
    protected $table ='contacts';
    protected $fillable = [
        'type_of_inquiry',
        'name',
        'email',
        'contact_number',
        'message',
        'contact_img'
    ];


}
