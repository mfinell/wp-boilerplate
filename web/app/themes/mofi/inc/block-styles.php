<?php

$sizes = [
	'xs' => 'var(--wp--custom--spacing--xs)',
	'sm' => 'var(--wp--custom--spacing--sm)',
	'lg' => 'var(--wp--custom--spacing--lg)',
	'xl' => 'var(--wp--custom--spacing--xl)',
	'2-xl' => 'var(--wp--custom--spacing--2-xl)',
	'3-xl' => 'var(--wp--custom--spacing--3-xl)',
	'4-xl' => 'var(--wp--custom--spacing--4-xl)',
];

foreach ( $sizes as $name => $value ) {
	$label = strtoupper( $name );
	register_block_style(
		'core/group',
		[
			'name'         => $name,
			'label'        => $label,
		]
	);
}