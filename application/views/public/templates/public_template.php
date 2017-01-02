<!-- Head -->
<?php $this->load->view('public/layout/head_view'); ?>

<!-- Header -->

<?php if(isset($page_title) && $page_title == 'home'): ?>
	<?php $this->load->view('public/layout/home_header_view'); ?>
<?php endif; ?>

<!-- Navigation -->
<?php $this->load->view('public/layout/nav_view'); ?>



<!-- Banner -->
<?php if(isset($page_title) && $page_title == 'home'): ?>
	<?php $this->load->view('public/layout/banner_view'); ?>
<?php endif; ?>


<!-- Main Body -->
<?php $this->load->view('public/layout/main_view'); ?>

<!-- Footer -->
<?php $this->load->view('public/layout/footer_view'); ?>

<!-- Tail -->
<?php $this->load->view('public/layout/tail_view'); ?>
