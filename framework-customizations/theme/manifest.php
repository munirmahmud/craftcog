<?php

if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$manifest = array();

$manifest[ 'name' ]			 = __( 'CraftCog', 'craftcog' );
$manifest[ 'uri' ]			 = esc_url( 'http://themespry.com/' );
$manifest[ 'description' ]	 = __( 'CraftCog WordPress theme', 'craftcog' );
$manifest[ 'version' ]		 = '1.0';
$manifest[ 'author' ]			 = 'CraftCog';
$manifest[ 'author_uri' ]		 = esc_url( 'http://themespry.com/' );
$manifest[ 'requirements' ]	 = array(
	'wordpress' => array(
		'min_version' => '4.1',
	),
);

$manifest[ 'id' ] = 'scratch';

$manifest[ 'supported_extensions' ] = array(
	'backups'		 => array(),
);
