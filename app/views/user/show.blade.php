@extends('layouts.default')
@section('content')
	<div class="padding">
  	<h1>User information</h1>
  	{{ Form::open() }}
	<div class="ui horizontal label">
		{{ Form::label('name', 'Name')}}
  	</div>
	{{ Form::label('name', 'Freddy') }}
  	<br/>
  	<br/>
	<div class="ui horizontal label">
	  	{{ Form::label('surname', 'Surname')}}
	</div>
	{{ Form::label('surname', 'Mercury')}}
  	<br/>
  	<br/>
	<div class="ui horizontal label">
		{{ Form::label('email', 'E-mail') }}
	</div>
  	{{ Form::label('email', 'freddy.mercury@email.com')}}
  	<br/>
  	<br/>
	<div class="ui horizontal label">
		{{ Form::label('phone', 'Phone')}}
	</div>
  	{{ Form::label('phone', '06.13.37.42.01') }}
  	<br/>
 	<br/>
	<div class="ui horizontal label">
	  	{{ Form::label('job', 'Job')}}
	</div>
  	{{ Form::label('job', 'Singer') }}
  	<br/>
	<br/>
	<div class="ui horizontal label">
		{{ Form::label('city', 'City')}}
	</div>
  	{{ Form::label('city', 'New York') }}
  	<br/>
 	<br/>
	<div class="ui horizontal label">
		{{ Form::label('adress', 'Adress')}}
	</div>
  	{{ Form::label('adress', '12 rue du quai') }}
  	<br/>
	<br/>
	<div class="ui horizontal label">
		{{ Form::label('infos', 'Infos')}}
	</div>
  	{{ Form::label('infos', 'Tu veux savoir hein ! eh bah tu sauras rien ! p\'tite pute !') }}
  	{{ Form::close() }}
  	@foreach($user as $var)
  	{{ $var }}
  	@endforeach
  	</div>
@stop
