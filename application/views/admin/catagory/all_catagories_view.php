<section class="col-sm-12">
	
	<article class="subsection">
		<!-- TITLE HEADER -->
		<header>
			<h2 class="h4 text-left actionTitle"><span class="fa fa-book"></span>&nbsp; Catagories</h1>
		</header>



		<div class="panel panel-warning panel-md">
			<div class="panel-heading">
				<strong>All Catagories</strong>

				<span class="pull-right">

					<!-- Button(link) trigger modal -->
					<a href="#" type="button" data-toggle="modal" data-target="#addLangsModal" title="Add New Catagory">
						<span class="fa fa-plus"></span> Add
					</a>

					<!-- modal -->
					<?php $this->load->view('admin/languages/modals/add_langs_modal'); ?>
					
				</span>
			</div>

			
			<div class="table-responsive">
				<table class="table table-striped table-hover listTable">
					<thead>
						<th scope="col">Title</th>
						<th scope="col">Event Count</th>
						<th scope="col" class="text-right">Edit</th>
					</thead>


					<tbody>
						<?php foreach($catagories as $catagory): ?>

						<?php
							$data = array(
										'catagory' => $catagory,
										'modal_id' => 'editModal' . $catagory->id
								);
						?>

						<!-- modal -->
						<?php $this->load->view('admin/languages/modals/edit_lang_modal', $data); ?>
						
						<tr>
							<td>
								<a href="<?php echo site_url('admin/catagories/id/' . $catagory->id); ?>" title="<?php echo $catagory->default_title; ?>">
								    <b><?php echo $catagory->default_title; ?></b>
								</a>
							</td>

							<td> - </td>
							<td class="text-right">

								<!-- Button(link) trigger modal -->
								<a href="#" type="button" data-toggle="modal" data-target="#<?php echo $data['modal_id']; ?>" title="Edit Language">
									<span class="fa fa-edit"></span> Edit
								</a>
							</td>
							
						</tr>
						</a>
						<?php endforeach; ?>
					</tbody>

				</table>
			</div><!-- /.table-resposive -->
		</div><!-- /.panel -->
	</article><!-- /.subsection -->
	



</section>