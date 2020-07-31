<form action="" method="post">
	<div class="form-group">
		<label for="txtName">Faculty Name</label>
		<input type="text" class="form-control" id="txtName" name="txtName">
		<label for="txtEst">Establish</label>
		<input type="text" class="form-control" id="txtEst" name="txtEst">
	</div>
	<input type="submit" name="btnSubmit" class="btn btn-primary">
</form>
<br>	
<table id="myTable" class="display">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Establish</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
			/* @var $faculty Faculty*/
			foreach ($faculties as $faculty) {
				echo "<tr>";
				echo "<td>".$faculty->getId()."</td>";
				echo "<td>".$faculty->getName()."</td>";
				echo "<td>".$faculty->getEstablish()."</td>";
				echo '<td><button class="btn btn-info" onclick="updateFacultyValue(\''.$faculty->getId().'\')">Update</button><button class="btn btn-danger" onclick="deleteFacultyValue(\''.$faculty->getId().'\')">Delete</button></td>';
				echo "</tr>";
			}
			$link = null;
		?>
	</tbody>
</table>