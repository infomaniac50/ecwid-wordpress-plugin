<?php

class Ecwid_Help_Page {
	public function __construct() {
		add_action('admin_post_ecwid_contact_us', array( $this, 'submit_contact_us') );
	}

	public function submit_contact_us() {
		if ( !current_user_can('administrator') || !wp_verify_nonce($_POST['wp-nonce'], 'ecwid_contact_us') ) {
			wp_redirect('admin.php?page=ecwid-help');
			wp_die();
		}

		$to = get_option( 'ecwid_support_email' );

		$body_lines = array();
		if ( get_ecwid_store_id() != ECWID_DEMO_STORE_ID ) {
			$body_lines[] = 'Store ID: ' . get_ecwid_store_id();
		}
		$body_lines[] = 'Store URL: ' . ecwid_get_store_page_url();
		$body_lines[] = 'Wp theme: ' . ecwid_get_theme_name();
		$body_lines[] = 'Ecwid plugin version: ' . get_option('ecwid_plugin_version');
		$body_lines[] = 'Wordpress version: '  . get_bloginfo('version');
		$body_lines[] = $_POST['email']['body'];

		wp_mail(
			$to,
			$_POST['email']['subject'],
			implode(PHP_EOL, $body_lines)
		);

		wp_redirect(admin_url('admin.php?page=ecwid-help'));
	}

	public function get_faqs() {
		global $faqs;

		include 'faq_entries.php';

		$max = 8;

		$result = array();
		foreach ( $faqs as $idx => $faq ) {
			if ( $faq['priority'] == 'newbie_with_woo' ) {
				$installed_within_two_weeks = time() - get_option( 'ecwid_installation_date' ) < 60 * 60 * 24 * 14;

				if ( ecwid_get_woocommerce_status() && $installed_within_two_weeks ) {
					$result[] = $faq;
					unset($faqs[$idx]);
				}
			}
		}
		$faqs = array_values($faqs);

		while (count($result) < $max) {
			$rand = rand(0, count($faqs) - 1);
			$result[] = $faqs[$rand];

			unset($faqs[$rand]);
			$faqs = array_values($faqs);
		}

		$faqs = $result;

		$result = array();
		foreach ($faqs as $faq) {
			$faq['href'] = 'https://help.ecwid.com/' . $faq['href'];
			$faq['body'] = preg_replace('!<img alt="" src="([^"]*)"!', '<img alt="" src="' . ECWID_PLUGIN_URL . '/images/help/' . '$1"', $faq['body']);

			$result[] = (object) $faq;
		}

		return $result;
	}
}

$ecwid_help_page = new Ecwid_Help_Page();