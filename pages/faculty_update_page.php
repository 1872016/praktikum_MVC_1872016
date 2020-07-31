<form action="" method="post">
	<div class="form-group">
		<label for="txtId">Id</label>
		<input type="text" class="form-control" name="txtId" value=<?php echo '"'.$faculty->getId().'"'; ?> readonly>
		<label for="txtName">Name</label>
		<input type="text" class="form-control" name="txtName" value=<?php echo '"'.$faculty->getName().'"'; ?>>
		<label for="txtEstablish">Establish</label>
		<input type="text" class="form-control" name="txtEstablish" value=<?php echo '"'.$faculty->getEstablish().'"'; ?>>
	</div>
	<input type="submit" name="btnSubmit" class="btn btn-default">
</form>