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
					<tr>
						<td>Svenska</td>
						<td class="bold">SV</td>
						<td class="text-center"> - </td>
						<td class="text-right">
							<span class="fa fa-edit"> Edit</span>
						</td>

					</tr>
					

					<tr>
						<td>Danish</td>
						<td class="bold">DN</td>
						<td class="text-center"> - </td>
						<td class="text-right">
							<span class="fa fa-edit"> Edit</span>
						</td>

					</tr>
				</table>
			</div><!-- /.table-resposive -->
		</div><!-- /.panel -->
	</article><!-- /.subsection -->
	



</section>