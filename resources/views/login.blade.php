<!DOCTYPE html>
<html>
<head>
	<title>Signin</title>
	@include('link')
</head>
<body>
<div class="login-page">
  <div class="form">

    

    <form class="login-form" action="{{ URL::to('loginStore') }}" method="post">
      {{ csrf_field() }}
      <input type="text" name="email" placeholder="email"/>
      <input type="password" name="password" placeholder="password"/>
      <button type="submit" class="btn btn-default">login</button>
      <p class="message">Not registered? <a href="{{ URL::to('signup') }}">Create an account</a></p>
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