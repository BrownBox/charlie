function bb_equaliser() {
    jQuery('.bb-equaliser').css('height', 'auto');
    jQuery('.bb-equaliser-wrapper').each(function() {
    	var height = 0;
    	jQuery(this).find('.bb-equaliser').each(function() {
    		height = Math.max(height, jQuery(this).height());
    	});
    	jQuery(this).find('.bb-equaliser').height(height);
    });
}
jQuery(document).ready(function() {
    bb_equaliser();
});
jQuery(window).resize(function() {
    bb_equaliser();
});