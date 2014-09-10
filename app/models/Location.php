<?php

class Location extends Eloquent
{

	public  $timestamps = false; // disable timestamps in db

	protected $table = 'locations';
	protected $fillable = array('name', 'location', 'city', 'ambiance');

	public function scopeGetLocation($query, $id = NULL)
	{
		if ($id)
			return $query->where('id', '=', $id);
		return $query;
	}

	public function update(Array $attributes = array())
	{
		foreach($attributes as $key => $value)
			$this->{$key} = $value;
		return $this->save();
	}
}

?>
