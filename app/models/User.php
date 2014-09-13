<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
class User extends Eloquent implements UserInterface, RemindableInterface {
  use UserTrait, RemindableTrait;

  public  $timestamps = false; // disable timestamps in db
  /**
  * The database table used by the model.
  *
  * @var string
  */
  protected $table = 'users';

  /**
  * The attributes excluded from the model's JSON form.
  *
  * @var array
  */
  protected $hidden = array('password', 'remember_token');


  public function updateFull(Array $attributes = array())
  {
    foreach($attributes as $key => $value)
      $this->{$key} = $value;
    return $this->save();
  }
  public function locations() {
    return $this->belongsToMany('Location', 'users_locations', 'user_id', 'location_id');
  }
}
