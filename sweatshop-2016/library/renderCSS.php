<?php

/**
 * Created by PhpStorm.
 * User: kisgal21
 * Date: 8/7/18
 * Time: 11:41 AM
 *
 * Yes, using PHP to render inline CSS tags seems a bit dated.
 * However, there is no other way to get WordPress and CSS talking,
 * so I wrote this neat little class which should be called inside the HTML section it applies to
 * and can be customized very easily to allow of multiple instances.
 *
 * This saves loads of bandwidth, and still allows you to use background images as actual background images
 * instead of relying on object fit properties which will not degrade very gracefully for less supported browsers.
 *
 * -- GTK
 */
class renderCSS
{
	public function __construct () { }

	/**
	 * @param int $attachment_id ID of the attachment media element
	 * @param string $CSSClass
	 */
	public function getInlineSrcSet ($attachment_id, $CSSClass)
	{

		if (!is_numeric($attachment_id)) {
			$error = new WP_Error('missingint', __("must pass a valid image attachment id! Passed: '" . $attachment_id . "'", "bones"));

			if (WP_DEBUG) {
				echo '<pre>';
				print_r($attachment_id);
				echo "</pre>";

				echo $error->get_error_message();
			}

		} else {
			$medium = wp_get_attachment_image_src($attachment_id, 'medium')[0];
			$medium_large = wp_get_attachment_image_src($attachment_id, 'medium_large')[0];
			$large = wp_get_attachment_image_src($attachment_id, 'large')[0];
			$full = wp_get_attachment_image_src($attachment_id, 'full')[0];

			?>
			<style>
			.<?php echo $CSSClass ?> {
				background-image: url(<?php echo $medium ?>)
			}

			@media only screen and (min-width: 300px) {
				.<?php echo $CSSClass ?> {
					background-image: url(<?php echo $medium_large ?>)
				}
			}

			@media only screen and (min-width: 768px) {
				.<?php echo $CSSClass ?> {
					background-image: url(<?php echo $large ?>)
				}
			}

			@media only screen and (min-width: 1024px) {
				.<?php echo $CSSClass ?> {
					background-image: url(<?php echo $full?>)
				}
			}
			</style>
			<?php
		}
	}
}