<?php
/**
 * Postmatic processor Config template
 *
 * @package   Caldera_Forms_Postmatic
 * @author    Josh Pollock <Josh@CalderaWP.com>
 * @license   GPL-2.0+
 * @link
 * @copyright 2015 Josh Pollock for CalderaWP
 */

?>


<div class="caldera-config-group">
	<label for="email_address">
		<?php _e( 'Email Address', 'cf-postmatic' ); ?>
	</label>
	<div class="caldera-config-field">
		<input type="text" class="block-input field-config required magic-tag-enabled" id="email_address" name="{{_name}}[email_address]" value="{{email_address}}" required="true">
	</div>
</div>

<div class="caldera-config-group">
	<label for="first_name">
		<?php _e( 'First Name', 'cf-postmatic' ); ?>
	</label>
	<div class="caldera-config-field">
		<input type="text" class="block-input field-config magic-tag-enabled" id="first_name" name="{{_name}}[first_name]" value="{{first_name}}" >
	</div>
</div>

<div class="caldera-config-group">
	<label for="last_name">
		<?php _e( 'Last Name', 'cf-postmatic' ); ?>
	</label>
	<div class="caldera-config-field">
		<input type="text" type="text" class="block-input field-config magic-tag-enabled" id="last_name" name="{{_name}}[last_name]" value="{{last_name}}">
	</div>
</div>

<div class="caldera-config-group">
	<label for="success_message">
		<?php _e( 'Success Message', 'cf-postmatic' ); ?>
	</label>
	<div class="caldera-config-field">
		<input type="text"  class="block-input field-config magic-tag-enabled" id="success_message" name="{{_name}}[success_message]" value="{{success_message}}">
	</div>
	<p class="description">
		<?php _e( "Message to show on successful subscription. If empty, a generic message will be shown.", 'cf-postmatic' ); ?>
	</p>

</div>


