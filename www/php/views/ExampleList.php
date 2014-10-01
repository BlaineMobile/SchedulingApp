<div id="items">
	<?php 
	foreach($this->items as $item): 
		$exampleItem = new View("ExampleItem");
		$exampleItem->itemName = $item;
		$exampleItem->render();
	endforeach; 
	?>
</div>