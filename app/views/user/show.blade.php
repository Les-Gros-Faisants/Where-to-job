@extends('layouts.default')
@section('content')
	<div class="padding">
  	<h1>User information</h1>
  	<div class="ui error form segment">
  	{{ Form::open() }}
	<div class="ui horizontal label">
		First name
  	</div>
	{{ Form::label('name', $user[0]->firstname) }}
  	<br/>
  	<br/>
	<div class="ui horizontal label">
		Last name
	</div>
	{{ Form::label('surname', $user[0]->lastname)}}
  	<br/>
  	<br/>
	<div class="ui horizontal label">
		E-mail
	</div>
  	{{ Form::label('email', $user[0]->email)}}
  	<br/>
 	<br/>
	<div class="ui horizontal label">
	  	Job
	</div>
  	{{ Form::label('job', $user[0]->job) }}
  	<br/>
	<br/>
	<div class="ui horizontal label">
		City
	</div>
  	{{ Form::label('city', $user[0]->city) }}
  	<br/>
 	<br/>
	<div class="ui horizontal label">
		Adress
	</div>
  	{{ Form::label('address', $user[0]->address) }}
  	<br/>
	<br/>
	<div class="ui horizontal label">
		Infos
	</div>
  	{{ Form::label('infos', $user[0]->infos) }}
  	{{ Form::close() }}
  	</div>
  	</div>
@stop
