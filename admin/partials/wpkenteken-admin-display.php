<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://windt.dev
 * @since      1.0.0
 *
 * @package    Wpkenteken
 * @subpackage Wpkenteken/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap">
	<h1><?php esc_html_e( 'WPKenteken Options' ); ?></h1>
	
	<div class="admin-page-form-wrapper">
		<form action="" method="post">
			<label for="RDW API Key">RDW Open Data API Key
				<input type="text">
			</label>
			<input type="submit" value="<?php esc_html_e( 'Submit' ); ?>">
		</form>
	</div>

</div>