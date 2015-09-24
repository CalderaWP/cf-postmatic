<?php
/**
 * MailChimp Form Processor Functions
 *
 * @package   Caldera_Forms_Postmatic
 * @author    Josh Pollock <Josh@CalderaWP.com>
 * @license   GPL-2.0+
 * @link
 * @copyright 2015 Josh Pollock for CalderaWP
 */


/**
 * Registers the Postmatic Processor
 *
 * @since 0.1.0
 * @param array		$processors		Array of current registered processors
 *
 * @return array	array of regestered processors
 */
function cf_postmatic_register($processors){

	$processors['postmatic'] = array(
		"name"				=>	__('Postmatic', 'cf-postmatic'),
		"description"		=>	__( 'Add Postmatic optins to your form.', 'cf-postmatic'),
		"icon"				=>	CF_POSTMATIC_URL . "icon.png",
		"author"			=>	"Josh Pollock for CalderaWP LLC",
		"author_url"		=>	"https://CalderaWP.com",
		"pre_processor"		=>	'cf_postmatic_process',
		"template"			=>	CF_POSTMATIC_PATH . "includes/config.php",

	);

	return $processors;

}

/**
 * Proccess submission
 *
 * @since 0.1.0
 *
 * @param array $config Processor config
 * @param array $form Form config
 *
 * @return array
 */
function cf_postmatic_process( $config, $form, $transdata ) {
	if ( ! class_exists( 'Prompt_Api' ) ) {
		$x = 1;
		return array(
			'type'=>'error',
			'note' => __( 'Postmatic is not active.', 'cf-postmatic' ),
		);
	}

	global $cf_postmatic_notice;
	$_message = Caldera_Forms::do_magic_tags( $config[ 'success_message' ] );
	if ( ! empty ( $_message ) ) {
		$message = $_message;
	}else{
		$message = __( 'Please check your email to confirm subscription.', 'cf-postmatic' );
	}

	$subscriber_data = array(
		'email_address' => Caldera_Forms::do_magic_tags( $config[ 'email_address'] ),
		'first_name' => Caldera_Forms::do_magic_tags( $config[ 'first_name'] ),
		'last_name' => Caldera_Forms::do_magic_tags( $config[ 'last_name'] ),
	);
	$status = Prompt_Api::subscribe( $subscriber_data );
	switch ( $status ) {
		case Prompt_Api::INVALID_EMAIL:
			return array(
				'type' =>'error',
				'note' => __( "Invalid email address.", 'cf-postmatic' )
			);
			break;
		case Prompt_Api::ALREADY_SUBSCRIBED:
			return array(
				'type'=>'error',
				'note' => __( "This email address is already subscribed.", 'cf-postmatic' )
			);
			break;
		case Prompt_Api::CONFIRMATION_SENT:

			$cf_postmatic_notice = array(
				'type'=>'success',
				'note' => $message
			);

			break;
		case Prompt_Api::OPT_IN_SENT:
			$cf_postmatic_notice = array(
				'type'=>'success',
				'note' => $message
			);
			break;
	}

}

/**
 * Add our success notices if needed.
 *
 * @since 1.0.1
 *
 * @uses "caldera_forms_render_notices"
 *
 * @param $notices
 *
 * @return array
 */
function cf_postmatic_maybe_notices( $notices ) {
	global $cf_postmatic_notice;
	if ( is_array( $cf_postmatic_notice ) && ! empty( $cf_postmatic_notice ) ) {
		$notices[ $cf_postmatic_notice[ 'type' ] ][ 'note' ] =  $cf_postmatic_notice[ 'note' ];
	}

	return $notices;

}
