<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function getCreated_AtAttribute($value)
    {
    	date_default_timezone_set("America/Chicago");
		$local_datetime = date($format, $timestamp);
    }

    public function getUpdated_AtAttribute($value)
    {
    	date_default_timezone_set("America/Chicago");
		$local_datetime = date($format, $timestamp);
    }
}
