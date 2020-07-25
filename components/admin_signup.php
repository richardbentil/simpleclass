<link rel="stylesheet" href="dist/css/signin-dist.css">
<main role="main" id="page">
<div class="col-lg-3 col-md-6 col-sm-6 m-auto">
<form class="form-signin mt-5">
  <h3 class="h3-responsive text-center mb-3 font-weight-normal">Sign Up(Lecturer)</h3>
  <div id="response" class="text-danger text-center p-2"></div>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="text" id="inputPassword" class="form-control" placeholder="Password" required>  
  <div class="form-group mt-3">
    <select id="school" class="form-control mb-3">
      <option value="">--Select School--</option>
      <option value="KNUST">KNUST</option>
      <option value="UG">UG</option>
      <option value="UENR">UENR</option>
      <option value="UMT">UMT</option>
    </select>
  </div>
  <button onclick="signupAdmin()" class="btn btn-primary btn-block mt-2" type="button">Sign Up</button>
   <div class="mt-3 text-center">
    <p>Have an account? <a href=".?page=login"> Login</a></p>
    <p>Student? <a href=".?page=signup"> Signup</a></p>
   </div>
</form>
</div>
</main>
<script>
  function signupAdmin(){
    var email = $('#inputEmail').val();
    var password = $('#inputPassword').val();
    var school = $('#school').val();
    var inp = email == '' || password == '' || school == '';
    checkInp(inp);
    if (!inp) {
        var obj = {signupAdmin:1, email:email, password:password, school:school};
        var url = 'controls/account.php';
        $.post({url:url,data:obj,success: function(response){
          if (response.indexOf('admin signed up') >= 0){ 
                window.location = 'dashboard.php';
            }else{$('#response').html(response)}
        },dataType: 'text',time: 5000});
    }
  }
</script>
