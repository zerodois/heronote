<?php

namespace heronote;

use Illuminate\Foundation\Auth\User as Authenticatable;
use SammyK\LaravelFacebookSdk\SyncableGraphNodeTrait;

class User extends Authenticatable
{
    use SyncableGraphNodeTrait;

    protected static $graph_node_field_aliases = [
        'id' => 'facebook_id',
        'name' => 'name',
        'email' => 'email',
    ];

    protected static $graph_node_fillable_fields = ['facebook_id', 'name', 'email'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function findByMail ($email) {
        return self::where('email', $email)->first();
    }

    public function notes() {
        return $this->belongsToMany('heronote\Note', 'note_user', 'user_id', 'note_name');
    }
}
