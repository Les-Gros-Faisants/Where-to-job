<?php

class Location extends Eloquent
{
  protected $table = 'locations';

  public function scopeGetLocation($query, $id = NULL)
  {
    if ($id)
      return $query->where('id', '=', $id);
    return $query;
  }
}

?>
