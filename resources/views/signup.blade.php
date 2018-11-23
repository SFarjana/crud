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


      {{ csrf_field() }}


      <input type="text" name="name" placeholder="username" required="required"/>
      <input type="text" name="email" placeholder="email" required="required"/>
      <input type="text" name="address" placeholder="address" required="required"/>
      <input type="text" name="phone" placeholder="phone number" required="required"/>
      <input type="password" name="password" placeholder="password" required="required"/>
      <input type="password" name="confirmpassword" placeholder="confirm password" required="required"/>
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