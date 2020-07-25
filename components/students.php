<section id="page">
<p><a href="dashboard.php"><i class="fa fa-arrow-left"></i> Go back</a></p>
        <h5>Students</h5>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>EMAIL</th>
                  <th>PROGRAM</th>
                </tr>
              </thead>
              <tbody id="studentsTable">
              </tbody>
            </table>
          </div>
</section>
<script>
//fetch students
var obj = {fetchStudents: 1};
var url = 'controls/account.php';
fetchData(obj,url);

function onsuccessstudent(myObj4){
    var i = '', txt = '';
    for(i in myObj4){
        txt += '<tr>';
        txt += '<td>#</td>';
        txt += '<td>' + myObj4[i].email + '</td>';
        txt += '<td>' + myObj4[i].class + '</td>';
        txt += '</tr>';
    }
    $('#studentsTable').html(txt);
}
</script>
