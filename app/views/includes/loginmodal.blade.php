<div id="loginmodal" class="ui modal">
  <i class="close icon"></i>
  <div class="content">
    <div class="ui two column middle aligned relaxed grid basic segment" style="font-family: 'Rambla', sans-serif;">
      <div class="column">
        <div class="ui form segment">
          <div class="field">
            {{ Form::open(array('url' => '/user/login')) }}         
            <div class="ui left labeled icon input">
              {{ Form::text('email', Input::old('email'), array('placeholder' => 'Email')) }}
              <i class="user icon"></i>
              <div class="ui corner label">
                <i class="asterisk icon"></i>
              </div>
            </div>
          </div>
          <div class="field">
            <div class="ui left labeled icon input">
              {{ Form::password('password', array('placeholder' => 'Password')) }}
              <i class="lock icon"></i>
              <div class="ui corner label">
                <i class="asterisk icon"></i>
              </div>
            </div>
          </div>

          {{ Form::submit('Submit!', array('class'=>'ui blue submit button')) }}
          {{ Form::close() }}
        </div>
      </div>
      <div class="ui vertical divider">
        Or
      </div>
      <div class="center aligned column">
        <li style="list-style:none;margin-left:0;padding-left:0;">
          <ul>
          <a href='/user/loginFB'>
          {{Form::button('<i class="facebook icon"></i>facebook', array('class'=>'ui facebook button', 'style'=>'width: 100%'))}}
          </a>
          </ul>
          <ul>
            <div class="ui twitter button" style="width: 100%">
              <i class="twitter icon"></i>
              Twitter
            </div>
          </ul>
          <ul>
            <div class="ui google plus button" style="width: 100%">
              <i class="google plus icon"></i>
              Google+
            </div>          
          </ul>
          <ul>
            <a href='/user/create'>
              {{ Form::button('<i class="signup icon"></i> Sign up' ,['type' => 'submit', 'class' => 'medium green ui icon button', 'style' => 'width:100%'])  }}
            </a>
          </ul>
        </li>
      </div>
    </div>
  </div>
</div>