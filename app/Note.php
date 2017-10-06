<?php

namespace heronote;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Note extends Model
{
	protected $primaryKey = ['name', 'user_id'];
	public $incrementing = false;
  protected $fillable = [ 'name', 'text', 'user_id' ];

  public static function show ($name, $email = false) {
  	$builder = self::where('name', $name);

    if (!$email)
      $builder = $builder->where('user_id', '0');
    else
      $builder = $builder->whereHas('user', function ($q) use ($email) {
        $q->where('email', $email);
      });

    return $builder->first();
  }

  public static function subnotes ( $folder, $email = false ) {
  	$builder = self::where('name', 'like', $folder.'%')
  		->where('name', '<>', $folder);

    if (!$email)
      $builder = $builder->where('user_id', '0');
    else
      $builder = $builder->whereHas('user', function ($q) use ($email) {
        $q->where('email', $email);
      });

    return $builder->get();
  }

  public function user () {
    return $this->belongsTo('heronote\User');
  }

  protected function setKeysForSaveQuery(Builder $query) {
    $keys = $this->getKeyName();
    if(!is_array($keys))
      return parent::setKeysForSaveQuery($query);

    foreach($keys as $keyName)
      $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));

    return $query;
  }

  protected function getKeyForSaveQuery($keyName = null) {
    if(is_null($keyName))
      $keyName = $this->getKeyName();

    if (isset($this->original[$keyName]))
      return $this->original[$keyName];

    return $this->getAttribute($keyName);
  }


  // public function users() {
  //   return $this->belongsToMany('heronote\User', 'note_user', 'note_name', 'user_id');
  // }
}
