<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
  protected $table = 'contact';

  protected $fillable =
  [
    'nama', 'telepon', 'email', 'alamat','facebook', 'instagram', 'github', 'twitter', 'youtube'
  ];
}
