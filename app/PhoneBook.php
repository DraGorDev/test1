<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class PhoneBook extends Model
{
  protected $table = "phone_users";
  public $timestamps = false;
  protected $fillable = array(
    'first_name',
    'last_name',
    'phone_number',
    'date'
  );
}
