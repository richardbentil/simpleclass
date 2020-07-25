<section id="page">
<p class="sm-only"><a href="dashboard.php"><i class="fa fa-arrow-left"></i> Go back</a></p>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h5>Courses</h5>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
              <?php if (isset($_SESSION['adminPassword'])) { ?>  
                <button type="button" class="btn btn-sm btn-custom-outline" onclick="createCourseToggle()"> <i class="fa fa-plus"></i> Create Course</button>
              <?php }else{ ?>
                <button type="button" class="btn btn-sm btn-custom-outline" onclick="createCourseToggle()"> <i class="fa fa-plus"></i> Register for a Course</button>
              <?php } ?>
              </div>
            </div>
          </div>
          <form class="my-4" id="courseForm">
            <div id="response" class="pb-2"></div>
              <div class="row">
              <?php if (isset($_SESSION['adminPassword'])) { ?>  
                <div class="form-group col-md-3 col-sm-12">
                  <label for="corseName">Course Name</label>
                  <input type="text" id="courseName" class="form-control" placeholder="Course Name">
                </div>
                <div class="form-group col-md-3 col-sm-12">
                    <label for="corseCode">Course Code</label>
                    <input type="text" id="courseCode" class="form-control" placeholder="Course Code">
                </div>
                <div class="form-group col-md-3 col-sm-12">
                <label for="school">School</label>
                  <select id="school" class="form-control mb-3">
                    <option value="">--Select School--</option>
                    <option value="KNUST">KNUST</option>
                    <option value="UG">UG</option>
                    <option value="UENR">UENR</option>
                    <option value="UMT">UMT</option>
                  </select>
                </div>
                <div class="form-group col-md-3 col-sm-12">
                <label for="year">Select Year</label>
                  <select id="year" class="form-control mb-3">
                    <option value="">--Select Year--</option>
                    <option value="Year 1">Year 1</option>
                    <option value="Year 2">Year 2</option>
                    <option value="Year 3">Year 3</option>
                    <option value="Year 4">Year 4</option>
                  </select>
                </div>
                <div class="form-group col-md-3 col-sm-12">
                <label for="semester">Select Semester</label>
                  <select id="semester" class="form-control mb-3">
                    <option value="">--Select Semester--</option>
                    <option value="Semester 1">Semester 1</option>
                    <option value="Semester 2">Semester 2</option>
                  </select>
                </div>
                
                <input type="text" id="userEmail" class="form-control" value="<?php echo $_SESSION['userEmail']; ?>" hidden>
                <div class="col-md-12">
                  <button type="button" onclick="createCourse()" class="btn btn-primary">Create Course</button>
                </div>
                  <?php }else{ ?>
                  <div class="form-group col-md-6 col-sm-12">
                      Select Course
                        <select name="course" id="selectC" class="form-control">
                        </select>
                  </div>
                  <input type="text" id="userEmail" class="form-control" value="<?php echo $_SESSION['userPassword']; ?>" hidden>
                  <div>
                    <button type="button" onclick="regCourse()" class="btn btn-primary ml-3 mt-4">Create Course</button>
                  </div>
                  <?php } ?>
                  
              </div>
          </form>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                  <th>#</th>
                  <th>COURSE NAME</th>
                  <th>COURSE CODE</th>
                  <th>YEAR</th>
                  <th>SEMESTER</th>
                </tr>
                </thead>
              <tbody id="cour">
              </tbody>
            </table>
          </div>
</section>
<script>
(function(){
      $('#courseForm').hide(); 
      //fetch courses
      var obj = {fetchCourse: 'fetchCourse'};
      var url = './controls/data/courses.php';
      $.post({url:url,data:obj,success: function(response){
        courses(response);
        },dataType: 'text'});

        
      var obj = {fetchC: 'fetchC'};
      var url = './controls/data/courses.php';
      $.post({url:url,data:obj,success: function(response){
        fetchC(response);
        //console.log(response);
        },dataType: 'text'});
})()
     
function createCourseToggle(){
        $('#courseForm').toggle();
}

function courses(response){
  var myObj = JSON.parse(response);
      var i = '', txt = '';
          
        for(i in myObj){
                    txt += '<tr>';
                    txt += '<td></td>';
                    txt += '<td>' + myObj[i].course_name + '</td>';
                    txt += '<td>' + myObj[i].course_code + '</td>';
                    txt += '<td>' + myObj[i].year + '</td>';
                    txt += '<td>' + myObj[i].semester + '</td>';
                    txt += '<td style="display:none"><label class="co" for="' + myObj[i].course_code + '"><input type="radio" name="courses" id="' + myObj[i].course_code + '" value="' + myObj[i].course_code + '"><i class="fa fa-trash fa-lg"></i></label></td>';
                    txt += '</tr>';
        }
      $('#cour').html(txt);
}

function fetchC(response){
    var myObj = JSON.parse(response);
            var i = '', txt = '';
            txt += '<option value="">--Select course--</option>';
                for(i in myObj){
                  txt += '<option value="' + myObj[i].course_code + '">' + myObj[i].course_name + '</option>';
                }
                $('#selectC').html(txt);
}

function createCourse(){
          var courseName = $('#courseName').val();
          var courseCode = $('#courseCode').val();
          var email = $('#userEmail').val();
          var school = $('#school').val();
          var year = $('#year').val();
          var semester = $('#semester').val();
          var inp = courseName == '' || courseCode == '' || email == '' || school == '' || year == '' || semester == '';
          checkInp(inp);
          if (!inp) {
              var obj = {createCourse:1,courseName:courseName, courseCode:courseCode, email:email, school:school, year:year, semester:semester};
              //alert(obj);
              var url = 'controls/course.php';
              
      $.post({url:url,data:obj,success: function(response){
        //$('#response').html(response);
        if (response == 'Course has been created successfully') {
          location.reload();
        }else{
          $('#response').html(response);
        }
        },dataType: 'text'});
          }
}

function regCourse() {
        var courseCode = $('#selectC').val();
        var inp = courseCode == '';
        checkInp(inp);
        if (!inp) {
        var obj = {regCourse:'regCourse',courseCode:courseCode};
        var url = 'controls/course.php';
        $.post({url:url,data:obj,success: function(response){
          if (response == 'You have successfully registered for this course') {
          location.reload();
        }else{
          $('#response').html(response);
        }
          
        },dataType: 'text'});
      }
  
}

function deleteCourse(){
  var course = $('#courseCode').val();
  alert(course);
}

$('.co').click(function(e){
            e.preventDefault();
    var course = $('input[name="courses"]:checked').val();

        alert(course);
    
}); 
</script>
