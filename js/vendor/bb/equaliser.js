function bb_equaliser() {
	jQuery('.bb-equaliser').css('height', 'auto');
    var height = 0;
    jQuery('.bb-equaliser').each(function() {
        height = Math.max(height, jQuery(this).height());
    });
    jQuery('.bb-equaliser').height(height);
}
jQuery(document).ready(function() {
	bb_equaliser();
});
jQuery(window).resize(function() {
	bb_equaliser();
});