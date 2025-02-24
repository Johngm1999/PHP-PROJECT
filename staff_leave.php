<?php
require('top.inc.php');

if(isset($_POST['submit'])){
	$leave_id=mysqli_real_escape_string($con,$_POST['leave_id']);
	$leave_from=mysqli_real_escape_string($con,$_POST['leave_from']);
	$leave_to=mysqli_real_escape_string($con,$_POST['leave_to']);
	$employee_id=$_SESSION['USER_ID'];
	$leave_description=mysqli_real_escape_string($con,$_POST['leave_description']);
	$role=$_SESSION['ROLE'];
	$department_id=$_SESSION['DEPARTMENT_ID'];
	$employee_name=$_SESSION['USER_NAME'];
	$email=$_SESSION['EMAIL'];
	$alternate=mysqli_real_escape_string($con,$_POST['alternate']);
	$sql="insert into `hod_leave`(leave_id,leave_from,leave_to,employee_id,leave_description,leave_status,role,department_id,employee_name,email,alternate) values('$leave_id','$leave_from','$leave_to','$employee_id','$leave_description',1,'6',$department_id,'$employee_name','$email','$alternate')";
	mysqli_query($con,$sql);
	header('location:add_leave4.php');
	die();
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Leave Type</strong><small> Form</small></div>
                        <div class="card-body card-block">
                           <form method="post">
						   
								<div class="form-group">
									<label class=" form-control-label">Leave Type</label>
									<select name="leave_id" required class="form-control">
										<option value="">Select Leave</option>
										<?php
										$res=mysqli_query($con,"select * from leave_type order by leave_type desc");
										while($row=mysqli_fetch_assoc($res)){
											echo "<option value=".$row['id'].">".$row['leave_type']."</option>";
										}
										?>
									</select>
								</div>
							   <div class="form-group">
									<label class=" form-control-label">From Date</label>
									<input type="date" name="leave_from"  class="form-control" min="2021-02-25" required>
								</div>
								<div class="form-group">
									<label class=" form-control-label">To Date</label>
									<input type="date" name="leave_to" class="form-control" min="2021-02-25"required>
								</div>
								<div class="form-group">
									<label class=" form-control-label">Leave Description</label>
									<input type="text" name="leave_description" class="form-control" >
								</div>
								<div class="form-group">
									<label class=" form-control-label">Alterante</label>
									<textarea name="alternate" rows="4" cols="50" class="form-control"></textarea>
								</div>
								
								 <button  type="submit" name="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							  </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
                  
<?php
require('footer.inc.php');
?>