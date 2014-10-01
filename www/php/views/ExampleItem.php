<div class="item" id="<?= SecurityUtils::sanitizeAttribute($this->itemName->itemAttribute); ?>">
	<?php if($this->itemName->thumbed): ?>
		<img width="30" class="thumbed" src="/images/thumbed.png" /><br />
	<?php else: ?>
		<img width="30" class="thumb" src="/images/thumb.png" /><br />
	<?php endif;?>
	<span class="num_thumbs"><?= SecurityUtils::sanitize($this->itemName->num_thumbs); ?></span>
	<span class="user"><a href="/user/<?= SecurityUtils::sanitizeUrl($this->itemName->name); ?>"><?= $this->itemName->name?></a></span>
	<?= SecurityUtils::sanitize($this->itemName->description); ?>
</div>