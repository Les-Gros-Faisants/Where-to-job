@extends('layouts.default')
@section('content')
<div class="padding">
    <?php
    // get all columns from user table
    $columns = Schema::getColumnListing('users');
    ?>
    <div style="max-width: 60%; margin: auto;">
        @if (isset($user) && (Auth::user()->id == $user[0]->id))
                EDIT  USER
{{ Form::model($user, array('route' => array('user.update', $user[0]->id))) }}
@else
                CREATE  USER
{{ Form::open(array('route' => 'user.store')) }}
@endif
        <?php unset($user); ?>
        <div class="ui error form segment">
            <div class="three fields">
                <div class="field">
                    {{ Form::label('First Name', 'First Name') }}
			 @if (isset($user) && (Auth::user()->id == $user[0]->id))
			{{ Form::text('firstname', null, array('placeholder'=>$user[0]->firstname)) }}
			@else
			{{ Form::text('firstname', null, array('placeholder'=>'First Name')) }}
			@endif
                </div>
                <div class="field">
                    {{ Form::label('Last Name', 'Last Name') }}
			 @if (isset($user) && (Auth::user()->id == $user[0]->id))
			{{ Form::text('lastname', null, array('placeholder'=>$user[0]->lastname)) }}
			@else
			{{ Form::text('lastname', null, array('placeholder'=>'Last Name')) }}
			@endif
                </div>
                <!-- 		<div class="field">
			{{ Form::label('Username', 'Username') }}
			@if (isset($user))
			{{ Form::text('Username', null, array('placeholder'=>$user[0]->username)) }}
@else
			{{ Form::text('Username', null, array('placeholder'=>'Username')) }}
			@endif
		</div> -->
            </div>
            <div class="two fields">
                <div class="field">
                    {{ Form::label('Password', 'Password') }}
			 @if (isset($user) && (Auth::user()->id == $user[0]->id))
			{{ Form::password('password', null, array('placeholder'=>$user[0]->password)) }}
			@else
			{{ Form::password('password', null, array('placeholder'=>'Password')) }}
			@endif
                </div>
                <div class="field">
                    {{ Form::label('Email', 'Email') }}
			 @if (isset($user) && (Auth::user()->id == $user[0]->id))
			{{ Form::email('email', $value = null, $attributes = array('placeholder'=>$user[0]->email)) }}
			@else
			{{ Form::email('email', $value = null, $attributes = array('placeholder'=>'Email')) }}
			@endif
                </div>
            </div>
            <div class="three fields">
                <div class="field">
                    {{ Form::label('Address', 'Address') }}
			@if (isset($user))
			{{ Form::text('address', null, array('placeholder'=>$user[0]->address)) }}
			@else
			{{ Form::text('address', null, array('placeholder'=>'Address')) }}
			@endif
                </div>
                <div class="field">
                    {{ Form::label('City', 'City') }}
			 @if (isset($user) && (Auth::user()->id == $user[0]->id))
			{{ Form::text('city', null, array('placeholder'=>$user[0]->city)) }}
			@else
			{{ Form::text('city', null, array('placeholder'=>'City')) }}
			@endif
                </div>
                <div class="field">
                    {{ Form::label('Job', 'Job') }}
			 @if (isset($user) && (Auth::user()->id == $user[0]->id))
			{{ Form::text('job', null, array('placeholder'=>$user[0]->job)) }}
			@else
			{{ Form::text('job', null, array('placeholder'=>'Job')) }}
			@endif
                </div>
            </div>
            <div class="field">
                {{ Form::label('Infos', 'Infos') }}
		 @if (isset($user) && (Auth::user()->id == $user[0]->id))
		{{ Form::textarea('infos', null, array('placeholder'=>$user[0]->infos)) }}
		@else
		{{ Form::textarea('infos', null, array('placeholder'=>'Infos')) }}
		@endif
            </div>
            <div class="field">
                {{ Form::label('Photo', 'Photo') }}
		{{ Form::file('photo', $attributes = array()) }}
            </div>
            {{ Form::submit('Submit', array('class'=>'ui blue submit button')) }}
        </div>
    </div>
</div>
{{ Form::close() }}
@stop