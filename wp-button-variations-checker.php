<?php
/**
 * Plugin Name: WP Button Variations Checker
 * Description: Check button variations.
 * Requires at least: 7.0
 * Version: 1.0.0
 * Author: Aki Hamano
 * Author URI: https://github.com/t-hamano
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *
 * @author Aki Hamano
 * @license GPL-2.0+
 */

defined( 'ABSPATH' ) || exit;

function wp_button_variations_checker_add_menu_page() {
	add_menu_page(
		'Button Variations',
		'Button Variations',
		'manage_options',
		'wp-button-variations-checker',
		'wp_button_variations_checker_render_page',
		'dashicons-editor-table',
		61
	);
}
add_action( 'admin_menu', 'wp_button_variations_checker_add_menu_page' );

function wp_button_variations_checker_render_page() {
	$background_colors = array(
		array(
			'color' => '#f0f0f1',
			'label' => 'Gray',
		),
		array(
			'color' => '#ffffff',
			'label' => 'White',
		),
	);

	$states = array(
		array(
			'label' => 'Default',
			'value' => '',
		),
		array(
			'label' => 'Active',
			'value' => 'active',
		),
		array(
			'label' => 'Disabled',
			'value' => 'disabled',
		),
	);

	$variations = array(
		array(
			'label' => 'Default',
			'value' => 'button',
		),
		array(
			'label' => 'Default Small',
			'value' => 'button button-small',
		),
		array(
			'label' => 'Default Compact',
			'value' => 'button button-compact',
		),
		array(
			'label' => 'Default Large',
			'value' => 'button button-large',
		),
		array(
			'label' => 'Primary',
			'value' => 'button button-primary',
		),
		array(
			'label' => 'Primary Small',
			'value' => 'button button-primary button-small',
		),
		array(
			'label' => 'Primary Compact',
			'value' => 'button button-primary button-compact',
		),
		array(
			'label' => 'Primary Large',
			'value' => 'button button-primary button-large',
		),
		array(
			'label' => 'Primary Hero',
			'value' => 'button button-primary button-hero',
		),
		array(
			'label' => 'Secondary',
			'value' => 'button button-secondary',
		),
		array(
			'label' => 'Secondary Small',
			'value' => 'button button-secondary button-small',
		),
		array(
			'label' => 'Secondary Compact',
			'value' => 'button button-secondary button-compact',
		),
		array(
			'label' => 'Secondary Large',
			'value' => 'button button-secondary button-large',
		),
		array(
			'label' => 'Secondary Hero',
			'value' => 'button button-secondary button-hero',
		),
		array(
			'label' => 'Link',
			'value' => 'button-link',
		),
		array(
			'label' => 'Link + Button',
			'value' => 'button button-link',
		),
		array(
			'label' => 'Link + Delete',
			'value' => 'button-link button-link-delete',
		),
	);
	?>
	<div class="wrap wp-core-ui">
		<h1>Button Variations Checker</h1>
		<?php foreach ( $background_colors as $background_color ) : ?>
			<h2>With <?php echo esc_html( $background_color['label'] ); ?> Background Color</h2>
			<div style="background-color:<?php echo esc_attr( $background_color['color'] ); ?>;">
				<table class="wp-list-table widefat fixed table-view-list" style="background:transparent;">
					<thead>
						<tr>
							<th>Variation</th>
							<?php foreach ( $states as $state ) : ?>
								<th><?php echo esc_html( $state['label'] ); ?> state</th>
							<?php endforeach; ?>
						</tr>
					</thead>
					<tbody>
						<?php foreach ( $variations as $variation ) : ?>
							<tr>
								<td><?php echo esc_html( $variation['label'] ); ?></td>
								<?php foreach ( $states as $state ) : ?>
								<td><button type="button" class="<?php echo esc_attr( $variation['value'] ); ?> <?php echo esc_attr( $state['value'] ); ?>">Push Me</button></td>
								<?php endforeach; ?>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		<?php endforeach; ?>
	</div>
	<?php
}
