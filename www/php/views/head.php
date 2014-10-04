<head>
	<meta charset="UTF-8">

	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" ></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

	<?php foreach($this->styles as $style): ?>
		<link rel='stylesheet' type='text/css' href="<?= '/style/'.$style.'.css'?>" />
	<?php endforeach; ?>

	<?php foreach($this->scripts as $script): ?>
		<script type="text/javascript" src="<?= '/scripts/'.$script.'.js'?>" ></script>

	<?php endforeach; ?>

	<title><?= $this->title ?></title>
</head>