( function( blocks ) {
	var blockCategories = blocks.getCategories();
	blockCategories.unshift({ 'slug': 'thehanger', 'title': 'The Hanger Blocks'});
	blocks.setCategories(blockCategories);
})(
	window.wp.blocks
);