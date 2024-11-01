jQuery(document).ready(function () {
	function update_preview() {
		layout_style = jQuery('select[name="wordpress-facebook-like[layout_style]"]').val();
		show_faces = jQuery('input[name="wordpress-facebook-like[show_faces]"]:checked').val();
		width = jQuery('input[name="wordpress-facebook-like[width]"]').val();
		verb = jQuery('select[name="wordpress-facebook-like[verb]"]').val();
		font = jQuery('select[name="wordpress-facebook-like[font]"]').val();
		color_scheme = jQuery('select[name="wordpress-facebook-like[color_scheme]"]').val();
		preview_html = '<h3>Preview</h3>';
		preview_html += '<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fblog.gunnjerkens.com%2F2010%2F04%2Fmobile-social-connecting-the-dots%2F&amp;layout=' + layout_style + '&amp;show_faces=' + show_faces + '&amp;width=' + width + '&amp;action=' + verb + '&amp;font=' + font + '&amp;colorscheme=' + color_scheme + '" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:' + width + 'px; height:px"></iframe>';
		jQuery('#wordpress_facebook_like_preview').html(preview_html);		
	}
	
	jQuery('.wordpress_facebook_like_settings form input, .wordpress_facebook_like_settings form select').change(function () {
		update_preview();
	});
	
	jQuery('input[name="wordpress-facebook-like[width]"]').keyup(function () {
		update_preview();												
	});
	
	update_preview();
});