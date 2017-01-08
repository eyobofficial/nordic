<section class="col-sm-12">
	
	<article class="subsection">
		<!-- TITLE HEADER -->
		<header>
			<h2 class="h4 text-left actionTitle"><span class="fa fa-globe"></span>&nbsp; Languages</h1>
		</header>



		<div class="panel panel-warning panel-md">
			<div class="panel-heading">
				<strong>All Languages</strong>

				<span class="pull-right">

					<!-- Button(link) trigger modal -->
					<a href="#" type="button" data-toggle="modal" data-target="#addLangsModal" title="Add New Language">
						<span class="fa fa-plus"></span> Add
					</a>

					<!-- modal -->
					<?php $this->load->view('admin/languages/modals/add_langs_modal'); ?>
					
				</span>
			</div>

			
			<div class="table-responsive">
				<table class="table table-striped table-hover listTable">
					<?php foreach($langs as $lang): ?>

					<?php
						$data = array(
									'lang'     => $lang,
									'modal_id' => 'editModal' . $lang->id
							);
					?>

					<!-- modal -->
					<?php $this->load->view('admin/languages/modals/edit_lang_modal', $data); ?>

					<tr>
						<td><?php echo $lang->name; ?></td>
						<td class="bold"><?php echo strtoupper($lang->abbr); ?></td>
						<td class="text-center"> - </td>
						<td class="text-right">

							<!-- Button(link) trigger modal -->
							<a href="#" type="button" data-toggle="modal" data-target="#<?php echo $data['modal_id']; ?>" title="Edit Language">
								<span class="fa fa-edit"></span> Edit
							</a>
						</td>
					</tr>
					<?php endforeach; ?>

				</table>
			</div><!-- /.table-resposive -->
		</div><!-- /.panel -->
	</article><!-- /.subsection -->
	



</section>