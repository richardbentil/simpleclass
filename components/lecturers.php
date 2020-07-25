<section>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h5">Lecturers</h5>
            <div class="btn-toolbar mb-2 mb-md-0">
            </div>
          </div>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>NAME</th>
                  <th>DEPARTMENT</th>
                  <th>NO. OF COURSES</th>
                  <th>MATERIALS UPLOADED</th>
                </tr>
              </thead>
              <tbody id="lecturersTable">
               
              </tbody>
            </table>
          </div>
</section>
<script>
  //fetch lecturers
var obj = {fetchLecturer: 1};
var url = 'controls/account.php';
fetchData(obj,url);
function onsuccesslecturers(myObj3){
    var i = '', txt = '';
    for(i in myObj3){
        txt += '<tr>';
        txt += '<td>#</td>';
        txt += '<td>' + myObj3[i].lecturer_name + '</td>';
        txt += '<td>' + myObj3[i].department + '</td>';
        txt += '<td>' + myObj3[i].courses + '</td>';
        txt += '<td>' + myObj3[i].materials + '</td>';
        txt += '</tr>';
    }
    $('#lecturersTable').html(txt);
}
</script>