const { __, _x, _n, _nx } = wp.i18n;

wp.blocks.registerBlockVariation( 'core/group', {
    name: 'stack',
	title: __( 'Stack', 'mofi' ),
	icon: 'menu',
    attributes: {
		className: 'l-stack',
	},
} );