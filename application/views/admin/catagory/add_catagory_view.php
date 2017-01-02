<section class="col-sm-10">
	
	<!-- TITLE HEADER -->
	<header>
		<h2 class="h4 text-left actionTitle"><span class="fa fa-book"></span> Add Catagory</h1>
	</header>



	<!-- BODY (FORM) -->
	<form action="admin/admin/catagory/add" method="POST">
		<div class="form-group-container add-admin-container">
		<fieldset>
			<legend>New Event Catagory</legend>

			<!-- CATAGORY TITLE -->
			<div class="form-group">
				<label for="catagoryNAME">Title: </label>
				<input type="text" name="catagory_title" id="catagoryName" class="form-control" value="" placeholder="Example: Sport, Concert, Theatre">
			</div><!-- .form-group -->


			<!-- CATAGORY DESCRIPTION -->
			<div class="form-group">
				<label for="catDesc">Description: </label>
				<textarea name="cat_desc" id="catDesc" cols="30" rows="10" class="form-control"></textarea>
			</div><!-- .form-group -->


			<!-- DEFAULT PICTURE -->
			<div class="form-group">
				<label for="defaultPic">Default Picture: </label>
				<input type="file" name="default_pic" id="defaultPic" class="form-control">
			</div><!-- /.form-group -->

		</fieldset>
		</div><!-- .form-group-container -->

		<div class="form-group">
			<input type="submit" name="submit" value="submit" class="btn btn-success btn-block">
		</div><!-- .form-group -->


	</form>





</section><!-- /.col-sm-10 -->