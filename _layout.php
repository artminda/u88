<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('www/includes/head'); ?>

</head>
<body>

<?php if (!$isMobile) $this->load->view('www/includes/header'); ?>

<?php $this->load->view('www/includes/menu'); ?>

<?php $this->load->view($layout[ 'sub_page' ]) ?>

<?php $this->load->view('www/includes/footer'); ?>

<?php $this->load->view('www/includes/help'); ?>

<?php $this->load->view('www/includes/mobile_footer'); ?>

<?php $this->load->view('www/includes/service_script'); ?>

</body>
</html>
