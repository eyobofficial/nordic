<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="<?php echo $modal_id; ?>">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?php echo $modal_title; ?></h4>
      </div><!-- /.modal-header -->


      <div class="modal-body">
        <?php $this->load->view($modal_view); ?>
      </div><!-- /.modal-body -->


      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div><!-- /.modal-footer -->


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->