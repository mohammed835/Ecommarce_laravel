<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
            // title	description	iamge	category	quantity	price	discount_price	

    protected $fillable= ['title'	,'description'	,'image'	,'category'	,'quantity'	,'price'	,'discount_price'];
    
}
