<div class="wrap wordpress_facebook_like_settings">
<h2>Wordpress-Facebook-Like Settings</h2>
<form method="post" action="options.php">
<?php settings_fields( 'wordpress_facebook_like_settings' ); ?>
<?php $options = get_option('wordpress-facebook-like'); ?>
<h3>Facebook Settings</h3>
<table class="form-table">
<tr valign="top" class="options">
	<th scope="row">Layout Style</th>
    <td>
    	<select name="wordpress-facebook-like[layout_style]">
        	<option value="standard"<?php selected('standard', $options['layout_style']); ?>>standard</option>
            <option value="button_count"<?php selected('button_count', $options['layout_style']); ?>>button_count</option>
        </select>
    </td>
</tr>
<tr valign="top" class="options">
	<th scope="row">Show Faces</th>
    <td>
    <label>Yes <input name="wordpress-facebook-like[show_faces]" type="radio" value="yes"<?php checked('yes', $options['show_faces']); ?> /></label>
    <label>No <input name="wordpress-facebook-like[show_faces]" type="radio" value="no"<?php checked('no', $options['show_faces']); ?> /></label>
    </td>
</tr>
<tr valign="top" class="options">
	<th scope="row">Width</th>
    <td>
    <label><input name="wordpress-facebook-like[width]" type="text" value="<?php echo $options['width']; ?>" /></label>
    </td>
</tr>
<tr valign="top" class="options">
	<th scope="row">Verb to display</th>
    <td>
    	<select name="wordpress-facebook-like[verb]">
        	<option value="like"<?php selected('like', $options['verb']); ?>>like</option>
            <option value="recommend"<?php selected('recommend', $options['verb']); ?>>recommend</option>
        </select>
    </td>
</tr>
<tr valign="top" class="options">
	<th scope="row">Font</th>
    <td>
    	<select name="wordpress-facebook-like[font]">
        	<option value="arial"<?php selected('arial', $options['font']); ?>>arial</option>
        	<option value="lucida grande"<?php selected('lucida grande', $options['font']); ?>>lucida grande</option>
        	<option value="segoe ui"<?php selected('segoe ui', $options['font']); ?>>segoe ui</option>
        	<option value="tahoma"<?php selected('tahoma', $options['font']); ?>>tahoma</option>
        	<option value="trebuchet ms"<?php selected('trebuchet ms', $options['font']); ?>>trebuchet ms</option>
        	<option value="verdana"<?php selected('verdana', $options['font']); ?>>verdana</option>
        </select>
    </td>
</tr>
<tr valign="top" class="options">
	<th scope="row">Color Scheme</th>
    <td>
    	<select name="wordpress-facebook-like[color_scheme]">
        	<option value="light"<?php selected('light', $options['color_scheme']); ?>>light</option>
        	<option value="dark"<?php selected('dark', $options['color_scheme']); ?>>dark</option>
        </select>
    </td>
</tr>
</table>
<h3>Location Settings</h3>
<table class="form-table">
<tr valign="top" class="options">
<th scope="row">Where would you like this displayed?</th>
<td>
    <label>Above Post <input name="wordpress-facebook-like[position]" type="radio" value="above"<?php checked('above', $options['position']); ?> /></label>
    <label>Below Post <input name="wordpress-facebook-like[position]" type="radio" value="below"<?php checked('below', $options['position']); ?> /></label>
</td>
</tr>
<tr valign="top" class="options">
<th scope="row">Show on index page?</th>
<td>
    <label>Yes <input name="wordpress-facebook-like[index]" type="radio" value="yes"<?php checked('yes', $options['index']); ?> /></label>
    <label>No <input name="wordpress-facebook-like[index]" type="radio" value="no"<?php checked('no', $options['index']); ?> /></label>
</td>
</tr>
<tr valign="top" class="options">
<th scope="row">Show on individual page?</th>
<td>
    <label>Yes <input name="wordpress-facebook-like[page]" type="radio" value="yes"<?php checked('yes', $options['page']); ?> /></label>
    <label>No <input name="wordpress-facebook-like[page]" type="radio" value="no"<?php checked('no', $options['page']); ?> /></label>
</td>
</tr>
<tr valign="top" class="options">
<th scope="row">Show on individual post?</th>
<td>
    <label>Yes <input name="wordpress-facebook-like[post]" type="radio" value="yes"<?php checked('yes', $options['post']); ?> /></label>
    <label>No <input name="wordpress-facebook-like[post]" type="radio" value="no"<?php checked('no', $options['post']); ?> /></label>
</td>
</tr>
</table>
<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>
</form>
<div id="wordpress_facebook_like_preview"></div>
</div>