@extends('layouts.default')
@section('content')
	<div class="padding">
  	<h1>User informations</h1>
  	<div class="ui error form segment">
  	{{ Form::open() }}
	<div class="ui large horizontal label">
		First name
  	</div>
	{{ Form::label('name', $user[0]->firstname) }}
  	<br/>
  	<br/>
	<div class="ui large horizontal label">
		Last name
	</div>
	{{ Form::label('surname', $user[0]->lastname)}}
  	<br/>
  	<br/>
	<div class="ui large horizontal label">
		E-mail
	</div>
  	{{ Form::label('email', $user[0]->email)}}
  	<br/>
 	<br/>
	<div class="ui large horizontal label">
	  	Job
	</div>
  	{{ Form::label('job', $user[0]->job) }}
  	<br/>
	<br/>
	<div class="ui large horizontal label">
		City
	</div>
  	{{ Form::label('city', $user[0]->city) }}
  	<br/>
 	<br/>
	<div class="ui large horizontal label">
		Adress
	</div>
  	{{ Form::label('address', $user[0]->address) }}
  	<br/>
	<br/>
	<div class="ui large horizontal label">
		Infos
	</div>
  	{{ Form::label('infos', $user[0]->infos) }}
  	{{ Form::close() }}
  	<a class="ui small green button right" href={{ "/user/".$user[0]->id."/edit" }}>Change informations</a>
  	</div>
  	</div>
@stop
