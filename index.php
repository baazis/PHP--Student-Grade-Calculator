<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/styles.css"/>
	</head>
<body>
	
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h2><b><u>Digital Assignment IWP</u></b></h3><br>
		<h3 class="text-primary"><b><u>PHP - Saurabh Grade Calculator</u></b></h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add student</button>
		<br /><br />
		<table class="table table-bordered">
			<thead class="alert-info">
				<tr>
					<th>Reg No.</th>
					<th>Name</th>
					<th>Cat_1</th>
					<th>Cat_2</th>
					<th>Assignment</th>
					<th>Quiz_1</th>
					<th>Quiz_2</th>
					<th>FAT</th>
					<th>Final Grade</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php
					require 'conn.php';
					

					$query = mysqli_query($conn, "SELECT * FROM `student`") or die(mysqli_error());
					while($fetch = mysqli_fetch_array($query)){
					
					$final = ($fetch['cat_1'] + $fetch['cat_2'] + $fetch['assign_1'] + $fetch['quiz_1'] + $fetch['quiz_2'] + $fetch['fat']) / 190;
					$final = $final*100;
				?>
				<tr>
					<td><?php echo $fetch['reg']?></td>
					<td><?php echo $fetch['name']?></td>
					<td><?php echo $fetch['cat_1']?></td>
					<td><?php echo $fetch['cat_2']?></td>
					<td><?php echo $fetch['assign_1']?></td>
					<td><?php echo $fetch['quiz_1']?></td>
					<td><?php echo $fetch['quiz_2']?></td>
					<td><?php echo $fetch['fat']?></td>
					<td><?php echo filter_var($final, FILTER_VALIDATE_INT) == false ? number_format($final,2) : number_format($final) ?></td>
					<?php
						if($final >=90){
							echo "<td style='background-color:green; color:#fff;'>S - Pass</td>";
						}else if($final >=80){
							echo "<td style='background-color:green; color:#fff;'>A - Pass</td>";
						}else if($final >=70){
							echo "<td style='background-color:green; color:#fff;'>B - Pass</td>";
						}else if($final >=60){
							echo "<td style='background-color:green; color:#fff;'>C - Pass</td>";
						}else if($final <60){
							echo "<td style='background-color:red; color:#fff;'>D- Fail</td>"; 
						}
					?>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
<div class="modal fade" id="form_modal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="save_student.php">
				<div class="modal-header">
					<h3 class="modal-title" >Add Student</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8">
					<div class="form-group">
							<label>Registration No</label>
							<input type="text" class="form-control" name="reg" required="required"/>
						</div>
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" name="name" required="required"/>
						</div>
						<div class="form-group">
							<label>Cat_1</label>
							<input type="number" min="0" max="30" class="form-control" name="cat_1" required="required"/>
						</div>
						<div class="form-group">
							<label>Cat_2</label>
							<input type="number" min="0" max="30" class="form-control" name="cat_2" required="required"/>
						</div>
						<div class="form-group">
							<label>Assignment_1</label>
							<input type="number" min="0" max="10" class="form-control" name="assign_1" required="required"/>
						</div>
						<div class="form-group">
							<label>Quiz_1</label>
							<input type="number" min="0" max="10" class="form-control" name="quiz_1" required="required"/>
						</div>
						<div class="form-group">
							<label>Quiz_2</label>
							<input type="number" min="0" max="10" class="form-control" name="quiz_2" required="required"/>
						</div>
						<div class="form-group">
							<label>FAT</label>
							<input type="number" min="0" max="100" class="form-control" name="fat" required="required"/>
						</div>
					</div>
				</div>
				<br style="clear:both;"/>
				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Close</button>
					<button class="btn btn-primary" name="save"><span class="glyphicon glyphicon-save"></span> save</button>
				</div>
			</form>
		</div>
	</div>
</div>	
<script src="js/jquery-3.2.1.min.js"></script>	
<script src="js/bootstrap.js"></script>	
</body>	
</html>