<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>
		<?php 
			//echo !isset($page_title) ?  ucwords($site_name) : ucwords($site_name) . " - " . ucwords($page_title) ; 
		?>

		<?php echo ucwords($site_name); ?>
		<?php
			if(isset($meta_title)){
				echo " - " . ucwords($meta_title);

			}elseif(isset($page_title)){
				echo " - " . ucwords($page_title);
			}else{
				echo " - " . ucwords($tagline);
			}
		?>
	</title>
	<meta http-equiv="X-UA-Compatabile" content="IE=Edge">
	<meta name="author" content="Eyob Tariku Sintaro">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/font-awesome.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/main.css'); ?>">
</head>
<body <?php if(isset($page_id)):?> id="<?php echo $page_id; ?>" <?php endif; ?> <?php if(isset($page_class)):?> class="<?php echo $page_class; ?>" <?php endif; ?> >
<div id="wrapper">