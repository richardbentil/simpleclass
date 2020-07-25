
<link rel="stylesheet" href="dist/css/signin-dist.css">
<div class="col-lg-3 col-md-6 col-sm-6 m-auto" id="page">
    <form class="form-signin mt-5">
      <img class="mb-4" src="." alt="" width="72" height="72">
      <h3 class="h3-responsive text-center mb-3 font-weight-normal">Sign In</h3>
      <div id="response" class="text-danger text-center p-2"></div>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>  
      <button onclick="login()" class="btn btn-primary btn-block" type="button">Sign In</button>
      <div class="mt-3 text-center">
          <p>New user? <a href=".?page=signup"> Sign up</a></p>
      </div>
    </form>
</div>
<script>
  function login(){
    var email = $('#inputEmail').val();
    var password = $('#inputPassword').val();
    var inp = email == '' || password == '';
    checkInp(inp);
    if (!inp) {
        var obj = {login:1,email:email, password:password};
        var url = 'controls/account.php';
        $.post({url:url,data:obj,success: function(response){
          if (response.indexOf('admin loged in') >= 0){ 
                window.location = 'dashboard.php';
            }else if(response.indexOf('user loged in') >= 0){
              window.location = 'dashboard.php';
            }
            else{$('#response').html(response)}
        },dataType: 'text',time: 5000});
    }
  }

  /* 
  function success(response){      
          if (response.indexOf('admin loged in') >= 0){ 
                window.location = 'dashboard.php';
            }else if(response.indexOf('user loged in') >= 0){
              window.location = 'dashboard.php';
            }
            else{$('#response').html(response)}
        
    }
        var obj = {login:1,email:email, password:password};
        var url = 'controls/account.php';
        post(url,obj); */
</script>

