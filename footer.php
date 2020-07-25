<div class="modal fade" id="pModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content p-3">
     <span id="response">Processing...</span>
    </div>
  </div>
</div>
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="dist/js/bootstrap.bundle.min.js"></script>
<script>
function logout(){
    var obj = {logout: 'logout'};
        var url = 'controls/account.php';
        $.post({url:url,data:obj,success: function(response){
          onsuccesslogout();
      }})
}

function onsuccesslogout(){
    window.location = '.';
}
</script>
</body>
</html>
