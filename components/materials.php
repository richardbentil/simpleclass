<?php 

require_once('controls/upload.php'); 
?>
<section id="page">
<p class="sm-only"><a href="dashboard.php"><i class="fa fa-arrow-left"></i> Go back</a></p>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      
            <h1 class="h5">Materials</h5>
            <div class="btn-toolbar mb-2 mb-md-0">
            <?php if (isset($_SESSION['adminPassword'])) { ?>  
              <div class="btn-group mr-2">
                <button type="button" class="btn btn-sm btn-custom-outline" id="uploadMaterialToggle"> <i class="fa fa-plus"></i> Upload new</button>
              </div>
              <?php } ?>
            </div>
          </div> <?php //if (isset($_SESSION['mssg'])) {
            echo $msg;
            echo $msg2;
            echo $msg3;
            echo $msg4;
            echo $msg5;
            echo $msg6;
          //} ?>
          <form id="uploadForm" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <span class="col">
                     <label for="selectC"> Select Course</label>
                        <select name="course" id="selectC" class="form-control">
                        </select>
                    </span>
                    <span class="col">
                    <label for="selectSchool"> Select School</label>
                        <select name="school" id="selectSchool" class="form-control">
                        </select>
                    </span>
                  </div>
                <input type="text" value="<?php if (isset($_SESSION['adminPassword'])) {
                echo $msg = $_SESSION['userEmail'];
              } ?>" name="lecturer" hidden>
                
              <div class="form-group mt-3">
                <label for="material">File input</label>
                <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload" required>
              </div>
              <button type="submit" class="btn btn-primary" name="submit">Upload</button>
            <hr>
            </form>
            <div class="row" id="materialsTable">
            </div>
    </section>
    <script>
(function(){
  
//upload file form
$('#uploadForm').hide();
$('#uploadMaterialToggle').click(function(){
    $('#uploadForm').toggle();
});   
      //fetch courses
      var obj = {fetchC: 'fetchC'};
      var url = './controls/data/courses.php';
      $.post({url:url,data:obj,success: function(response){
        fetchC(response);  
      }})
      //fetch course school
      var url = './controls/data/courses.php';
      var obj = {fetchCourseSchool: 'fetchCourseSchool'};
      $.post({url:url,data:obj,success: function(response){
        fetchS(response);  
      }})

      //fetch materials
      var obj = {fetchMaterials: 'fetchMaterials'};
      var url = 'controls/data/materials.php';
      $.post({url:url,data:obj,success: function(response){
        onsuccessmaterial(response);
      }})

})()
      
function fetchS(response){
    var myObj = JSON.parse(response);
            var i = '', txt = '';
                for(i in myObj){
                  txt += '<option value="">--Select school--</option>';
                  txt += '<option value="' + myObj[i].school + '">' + myObj[i].school + '</option>';
                }
                $('#selectSchool').html(txt);
}

function fetchC(response){
    var myObj = JSON.parse(response);
            var i = '', txt = '';
                for(i in myObj){
                  txt += '<option value="">--Select course--</option>';
                  txt += '<option value="' + myObj[i].course_code + '">' + myObj[i].course_name + '</option>';
                }
                $('#selectC').html(txt);
}

function onsuccessmaterial(response){
        var myObj = JSON.parse(response);
    var i = '', txt = '';
    for(i in myObj){
        txt += '<div class="col-md-2 col-sm-3">'
        txt += '<div class="card">';
        txt += '<div class="card-body text-center">'
        txt += '<img src="./images/file.jpg" width="50" alt="">';   
        txt += '</div>'
        txt += '<div class="card-footer p-2">'
        txt += '<small>' + myObj[i].material_name + '</small> <a href="uploads/'+ myObj[i].material_name +'" download class="fa fa-download"></a>';
        txt += '</div>';
        txt += '</div>';
        txt += '</div>';
    }
    $('#materialsTable').html(txt);
}
    </script>