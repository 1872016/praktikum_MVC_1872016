<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="txtId">Id</label>
		<input type="text" class="form-control" name="txtId" value=<?php echo '"'.$activity->getId().'"'; ?> readonly>
		<label for="txtTitle">Title</label>
		<input type="text" class="form-control" name="txtTitle" value=<?php echo '"'.$activity->getTitle().'"'; ?>>
		<label for="txtDescription">Description</label>
		<input type="text" class="form-control" name="txtDescription" value=<?php echo '"'.$activity->getDescription().'"'; ?>>
		<label for="txtPlace">Place</label>
		<input type="text" class="form-control" name="txtPlace" value=<?php echo '"'.$activity->getPlace().'"'; ?>>
		<label for="txtStartDate">Start Date</label>
		<input type="text" class="form-control" name="txtStartDate" value=<?php echo '"'.$activity->getStartDate().'"'; ?>>
		<label for="txtEndDate">End Date</label>
		<input type="text" class="form-control" name="txtEndDate" value=<?php echo '"'.$activity->getEndDate().'"'; ?>>
		<label for="fileDocPhoto">Doc Photo</label>
		<input type="file" class="form-control" name="fileDocPhoto">
		<label for="txtFacultyId">Faculty Id</label>
		<input type="text" class="form-control" name="txtFacultyId" value=<?php echo '"'.$activity->getFacultyId().'"'; ?>>
	</div>
	<input type="submit" name="btnSubmit" class="btn btn-primary">
</form>