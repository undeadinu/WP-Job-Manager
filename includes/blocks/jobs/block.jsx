const { __ } = wp.i18n;
const {
	registerBlockType,
	InspectorControls,
	InspectorControls: {
		ToggleControl,
	},
	BlockDescription,
} = wp.blocks;

registerBlockType( 'wp-job-manager/jobs', {
	title: __( 'Jobs' ),
	icon: 'index-card',
	category: 'widgets',
	attributes: {
		showFilters: {
			type: 'boolean',
			default: true
		},
	},
	edit: function( props ) {
		const { className, attributes, setAttributes, focus } = props;
		const { showFilters } = attributes;

		const toggleShowFilters = () => setAttributes( { showFilters: ! showFilters } );

		return [
			focus &&
			<InspectorControls key="inspector">
				<BlockDescription>
					<p>{ __( 'Browse and filter job listings.' ) }</p>
				</BlockDescription>
				<h3>{ __( 'Settings' ) }</h3>
				<ToggleControl
					label={ __( 'Show filters' ) }
					checked={ showFilters }
					onChange={ toggleShowFilters }
				/>
			</InspectorControls>,
			<div className={ className }>
				All the jobs.
			</div>,
		];
	},

	save() {
		return null;
	},
} );
