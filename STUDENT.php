<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css"/>

  </head>
  <body>

<!--Add student-->
<div class="modal fade" id="studentAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="saveStudent">
      <div class="modal-body">

      	<div class="alert alert-warning d-none"></div> 

        <div class="mb-3">
        	<label for="">Name</label>
        	<input type="text" name="name" class="form-control"/>
        </div>
        <div class="mb-3">
        	<label for="">Email</label>
        	<input type="text" name="email" class="form-control"/>
        </div>
        <div class="mb-3">
        	<label for="">Phone</label>
        	<input type="text" name="phone" class="form-control"/>
        </div>
        <div class="mb-3">
        	<label for="">Course</label>
        	<input type="text" name="course" class="form-control"/> 
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Student</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!--Edit Student Modal-->
<div class="modal fade" id="studentEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="updateStudent">
      <div class="modal-body">

        <div class="alert alert-warning d-none"></div> 

<input type="hidden" name="student_id" id="student_id">
        <div class="mb-3">
          <label for="">Name</label>
          <input type="text" name="name" id="name" class="form-control"/>
        </div>
        <div class="mb-3">
          <label for="">Email</label>
          <input type="text" name="email" id="email" class="form-control"/>
        </div>
        <div class="mb-3">
          <label for="">Phone</label>
          <input type="text" name="phone" id="phone" class="form-control"/>
        </div>
        <div class="mb-3">
          <label for="">Course</label>
          <input type="text" name="course" id="course" class="form-control"/> 
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update Student</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- view student model-->
<div class="modal fade" id="studentViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">

        <div class="mb-3">
          <label for="">ID</label>
          <p id="view_id" class="form-control"></p>
        </div>

        <div class="mb-3">
          <label for="">Name</label>
          <p id="view_name" class="form-control"></p>
        </div>
        <div class="mb-3">
          <label for="">Email</label>
          <p id="view_email" class="form-control"></p>
        </div>
        <div class="mb-3">
          <label for="">Phone</label>
          <p id="view_phone" class="form-control"></p>
        </div>
        <div class="mb-3">
          <label for="">Course</label>
          <p id="view_course" class="form-control"></p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  	<div class="container">
  		<div class="row">
  			<div class="card">
  				<div class="card-header">
  					<h4> PHP Ajax CRUD without page reload using Bootstrap Modal

  					<button type="button=" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#studentAddModal">
  					Add Student
					</button>
				</h4>
			</div>
			
  				<div class="card-body">
  				
  			
  				<table id="myTable" class="table table-bordered table-striped">
  					<thead>
  						<tr>
  							<th>ID</th>
  							<th>Name</th>
  							<th>Email</th>
  							<th>Phone</th>
  							<th>Course</th>
  							<th>Action</th>
  						</tr>
  					</thead>
  					
  						<?php
  						require 'dbcon.php';
  						$query = "SELECT * FROM students";
  						$query_run = mysqli_query($con,$query);

  						if (mysqli_num_rows($query_run) > 0) 
  						{
  							foreach ($query_run as $student) 
  							{
  								?>
  								<tr>
  									<td> <?php echo $student['id'] ?></td>
  									<td> <?php echo $student['name'] ?></td>
  									<td> <?php echo $student['email'] ?></td>
  									<td> <?php echo $student['phone'] ?></td>
  									<td> <?php echo $student['course'] ?></td>
  								  <td> 
                    <button type="button" value="<?php echo $student['id'];?>" class="viewStudentBtn btn btn-info">View</button>

  									<button type="button" value="<?php echo $student['id'];?>" class="editStudentBtn btn btn-success">Edit</button>

  									<button type="button" value="<?php echo $student['id'];?>" class="deleteStudentBtn btn btn-danger">Delete</button>

                  </td>
  								</tr> 

  								<?php
  							}
  							
  						}
  					?>

  				</table>
  				</div>
  				</div> 
  			</div>
  		</div>
  	</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script>
	$(document).on('submit', '#saveStudent',function (e) {
		e.preventDefault();
        
		var formData = new FormData(this);
		formData.append("save_student",true)

		$.ajax({
			type: "POST",
			url:"code.php",
			data: formData,
			processData: false,
			contentType: false,
			success:function(response){
        console.log(response);
 				var res = jQuery.parseJSON(response);
 				if(res.status == 422) {
 					$('#errorMessage').removeClass('d-none');
 					$('#errorMessage').text(res.message);
 				}else if(res.status == 200){

 					$('#errorMessage').addClass('d-none');
 					$('#studentAddModal').modal('hide');
 					$('#saveStudent')[0].reset();

          alertify.set('notifier','position', 'top-right');
           alertify.success(res.message);

          //not to refresh the page
          $('#myTable').load(location.href + " #myTable");
 				
 			}
 		}
 				});
  });

  $(document).on("click", ".editStudentBtn", function () {
  var student_id = $(this).val();
  $.ajax({
    type: "GET",
    url: "code.php?student_id=" + student_id,
    success: function (response) {
      var res = jQuery.parseJSON(response);
      console.log(res);
      if (res.status == 422) {
        alert(res.message);
      } else if (res.status == 200) {
        console.log(res.data);
        $("#student_id").val(res.data['id']);
        $("#name").val(res.data['name']);
        $("#email").val(res.data['email']);
        $("#phone").val(res.data['phone']);
        $("#course").val(res.data['course']);

        $("#studentEditModal").modal("show");
      }
    },
  });
});

 //update
$(document).on('submit', '#updateStudent',function (e) {
    e.preventDefault();
        
    var formData = new FormData(this);
    formData.append("update_student",true)

    $.ajax({
      type: "POST",
      url:"code.php",
      data: formData,
      processData: false,
      contentType: false,
      success:function(response){
        console.log(response);

        var res = jQuery.parseJSON(response);
        if(res.status == 422) {
          $('#errorMessageUpdate').removeClass('d-none');
          $('#errorMessageUpdate').text(res.message);
          alert(res.message);
        }else if(res.status == 200){

          $('#errorMessageUpdate').addClass('d-none');

           alertify.set('notifier','position', 'top-right');
           alertify.success(res.message);

          $('#studentEditModal').modal('hide');
          $('#updateStudent')[0].reset();

          //not to refresh the page
          $('#myTable').load(location.href + " #myTable");
        
      }
    }
        });
  });

//view
$(document).on("click", ".viewStudentBtn", function () {
  var student_id = $(this).val();
  $.ajax({
    type: "GET",
    url: "code.php?student_id=" + student_id,
    success: function (response) {
      var res = jQuery.parseJSON(response);
      console.log(res);
      if (res.status == 422) {
        alert(res.message);
      } else if (res.status == 200) {
        console.log(res.data);
        $("#view_id").text(res.data['id']);
        $("#view_name").text(res.data['name']);
        $("#view_email").text(res.data['email']);
        $("#view_phone").text(res.data['phone']);
        $("#view_course").text(res.data['course']);

        $("#studentViewModal").modal("show");
      }
    },
  });
});

$(document).on('click', '.deleteStudentBtn', function(e){
  e.preventDefault();

  if(confirm('Are you sure you want to delete this data?'))
  {
    var student_id = $(this).val();
    $.ajax({
      type: "POST",
      url: "code.php",
      data:{
        'delete_student': true,
        'student_id':student_id
      },
      success:function (response){

          var res = jQuery.parseJSON(response);
          if (res.status == 500) {
          alert(res.message);
      }
      else
      {
        alert(res.message);

            alertify.set('notifier','position', 'top-right');
            alertify.success(res.message);

        $('#myTable').load(location.href + " #myTable");
      }
    }
    })
  }
});
			
	</script> 
  </body>
</html>
