<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="txtTitle">Title</label>
		<input type="text" class="form-control" name="txtTitle">
		<label for="txtDescription">Description</label>
		<input type="text" class="form-control" name="txtDescription">
		<label for="txtPlace">Place</label>
		<input type="text" class="form-control" name="txtPlace">
		<label for="txtStartDate">Start Date</label>
		<input type="text" class="form-control" name="txtStartDate">
		<label for="txtEndDate">End Date</label>
		<input type="text" class="form-control" name="txtEndDate">
		<label for="fileDocPhoto">Doc Photo</label>
		<input type="file" class="form-control" name="fileDocPhoto">
		<label for="txtFacultyId">Faculty Id</label>
		<input type="text" class="form-control" name="txtFacultyId">
	</div>
	<input type="submit" name="btnSubmit" class="btn btn-primary">
</form>
<br>	
<table id="myTable" class="display">
	<thead>
		<tr>
			<th>Id</th>
			<th>Title</th>
			<th>Description</th>
			<th>Place</th>
			<th>Start Date</th>
			<th>End Date</th>
			<th>Doc Photo</th>
			<th>Faculty Id</th>
		</tr>
	</thead>
	<tbody>
		<?php
			/* @var $activity Activity*/
			foreach ($activities as $activity) {
				echo "<tr>";
				echo "<td>".$activity->getId()."</td>";
				echo "<td>".$activity->getTitle()."</td>";
				echo "<td>".$activity->getDescription()."</td>";
				echo "<td>".$activity->getPlace()."</td>";
				echo "<td>".$activity->getStartDate()."</td>";
				echo "<td>".$activity->getEndDate()."</td>";
				if ($activity->getDocPhoto() != null) {
					echo '<td>.<img alt="photo" src='.'"uploads/'.$activity->getDocPhoto().'"'.'></td>';
				}
				echo "<td>".$activity->getFacultyId()."</td>";
				echo '<td><button class="btn btn-info" onclick="updateActivityValue(\''.$activity->getId().'\')">Update</button><button class="btn btn-danger" onclick="deleteActivityValue(\''.$activity->getId().'\')">Delete</button></td>';
				echo "</tr>";
			}
		?>
	</tbody>
</table>