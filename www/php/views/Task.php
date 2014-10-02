<div class="item" id="<?= SecurityUtils::sanitizeAttribute($this->task->itemAttribute); ?>">
	<?php if($this->task->thumbed): ?>
		<img width="30" class="thumbed" src="/images/thumbed.png" /><br />
	<?php else: ?>
		<img width="30" class="thumb" src="/images/thumb.png" /><br />
	<?php endif;?>
	<span class="num_thumbs"><?= SecurityUtils::sanitize($this->task->num_thumbs); ?></span>
	<span class="user"><a href="/user/<?= SecurityUtils::sanitizeUrl($this->task->name); ?>"><?= $this->task->name?></a></span>
	<?= SecurityUtils::sanitize($this->task->description); ?>
</div>