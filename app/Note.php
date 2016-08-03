<?php

namespace heronote;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
  protected $fillable = [ 'id', 'text' ];
}
