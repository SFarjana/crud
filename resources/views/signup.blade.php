<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	@include('link')
</head>
<body>

<div class="login-page">
  <div class="form">

    <form class="login-form" action="{{ URL::to('signupStore') }}" method="post">

      
    @if($errors->any())
        @foreach($errors->all() as $error)
        <div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Oh snap!</strong> {{ $error }}
             
          </div>

        @endforeach

      @endif
      {{ csrf_field() }}


      <input type="text" name="name" placeholder="username"/>
      <input type="text" name="email" placeholder="email"/>
      <input type="text" name="address" placeholder="address"/>
      <input type="text" name="phone" placeholder="phone number"/>
      <input type="password" name="password" placeholder="password"/>
      <input type="password" name="confirmpassword" placeholder="confirm password"/>
      <button type="submit" class="btn btn-default">Sign Up</button>
      <p class="message">Already have an account? <a href="{{ URL::to('login') }}">Login here</a></p>
    </form>
  </div>
</div>
<script type="text/javascript">
	$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>
</body>
</html>