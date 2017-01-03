<section class="col-sm-10">
	
	<!-- TITLE HEADER -->
	<header>
		<h2 class="h4 text-left actionTitle"><span class="fa fa-book"></span>&nbsp; Add Catagory</h1>
	</header>

	
	<?php if(!empty(validation_errors())): ?>
	<div class="panel panel-danger">
		<div class="panel-body">
			<?php echo validation_errors(); ?>
		</div>
	</div>
    <?php endif; ?>


	<!-- BODY (FORM) -->
	<?php echo form_open('admin/catagories/add', array('name' => 'add_cat', 'id' => 'addCat')); ?>
		<div class="form-group-container add-admin-container">
		<fieldset>
			<legend>New Event Catagory</legend>

			<!-- CATAGORY TITLE -->
			<div class="form-group">
				<label for="catName">Title: </label>
				<?php
					$input_attr = array(
								'name'        => 'cat_title',
								'id'          => 'catName',
								'class'       => 'form-control',
								'placeholder' => 'Example: Sport, Concert, Theatre',
								'value'       => set_value('cat_title')
						);

					echo form_input($input_attr);
				?>
			</div><!-- .form-group -->


			<!-- CATAGORY DESCRIPTION -->
			<div class="form-group">
				<label for="catDesc">Description: </label>
				<?php
					$textarea_attr = array(
								'name'        => 'cat_desc',
								'id'          => 'catDesc',
								'class'       => 'form-control',
								'value'       => set_value('cat_desc')
						);

					echo form_textarea($textarea_attr);
				?>
			</div><!-- .form-group -->


			<!-- DEFAULT PICTURE -->
			<div class="form-group">
				<label for="defaultPic">Default Picture: </label>
				<input type="file" name="default_pic" id="defaultPic">
			</div><!-- /.form-group -->

		
		</div><!-- .form-group-container -->



		<!-- SUBMIT INPUT BUTTON -->
		<div class="form-group">
			<?php
				$submit_attr = array(
							'name'  => 'submit',
							'id'    => 'submitForm',
							'class' => 'btn btn-success btn-block',
							'value' => 'Submit'
					);

				echo form_submit($submit_attr);
			?>
		</div><!-- .form-group -->


		</fieldset>
	<?php echo form_close(); ?>





</section><!-- /.col-sm-10 -->