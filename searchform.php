<form action="<?php echo home_url( '/' ); ?>" class="search-form inline-search" method="get" role="search">
	<label>
		<span class="screen-reader-text"><?php _e( 'Search for:', 'crb' ); ?></span>
		<input type="text" title="<?php _e( 'Search for:', 'crb' ); ?>" name="s" value="" id="s" placeholder="<?php _e( 'Search &hellip;', 'crb' ); ?>" class="search__field" />
	</label>
	<button type="submit" class="search__btn btn btn--blue">
		<span class="inline-search__btn-img">Search</span>
	</button>
</form>

