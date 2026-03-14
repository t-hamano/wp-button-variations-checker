<?php
/**
 * Plugin Name: WP Button Variations Checker
 * Description: Check button variations.
 * Requires at least: 7.0
 * Version: 1.1.0
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

	$button_states = array(
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

	$button_variations = array(
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

	$button_group_variations = array(
		array(
			'label'        => 'Small size',
			'group_class'  => 'button-group button-small',
			'active_class' => 'active',
		),
		array(
			'label'        => 'Compact size',
			'group_class'  => 'button-group button-compact',
			'active_class' => 'active',
		),
		array(
			'label'        => 'Large size',
			'group_class'  => 'button-group button-large',
			'active_class' => 'active',
		),
		array(
			'label'        => 'Hero size',
			'group_class'  => 'button-group button-hero',
			'active_class' => 'active',
		),
		array(
			'label'        => 'With Primary Button',
			'group_class'  => 'button-group',
			'active_class' => 'button-primary',
		),
	);
	?>
	<div class="wrap wp-core-ui">
		<h1>Button Variations Checker</h1>
		<?php foreach ( $background_colors as $background_color ) : ?>
			<h2>With <?php echo esc_html( $background_color['label'] ); ?> Background Color</h2>

			<h3>Button Variations</h3>
			<div style="background-color:<?php echo esc_attr( $background_color['color'] ); ?>;">
				<table class="wp-list-table widefat fixed table-view-list" style="background:transparent;">
					<thead>
						<tr>
							<th>Variation</th>
							<?php foreach ( $button_states as $button_state ) : ?>
								<th><?php echo esc_html( $button_state['label'] ); ?> state</th>
							<?php endforeach; ?>
						</tr>
					</thead>
					<tbody>
						<?php foreach ( $button_variations as $button_variation ) : ?>
							<tr>
								<td><?php echo esc_html( $button_variation['label'] ); ?></td>
								<?php foreach ( $button_states as $button_state ) : ?>
								<td><button type="button" class="<?php echo esc_attr( $button_variation['value'] ); ?> <?php echo esc_attr( $button_state['value'] ); ?>">Push Me</button></td>
								<?php endforeach; ?>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>

			<h3>Button Group Variations</h3>
			<div style="background-color:<?php echo esc_attr( $background_color['color'] ); ?>;">
				<table class="wp-list-table widefat fixed table-view-list" style="background:transparent;">
					<thead>
						<tr>
							<th>Variation</th>
							<th>Example</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ( $button_group_variations as $group_variation ) : ?>
							<tr>
								<td><?php echo esc_html( $group_variation['label'] ); ?></td>
								<td>
									<span class="<?php echo esc_attr( $group_variation['group_class'] ); ?>">
										<button type="button" class="button">Option A</button>
										<button type="button" class="button <?php echo esc_attr( $group_variation['active_class'] ); ?>">Option B</button>
										<button type="button" class="button">Option C</button>
									</span>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		<?php endforeach; ?>
	</div>
	<?php
}
