( function( blocks, components, editor, i18n, element ) {

	const el = element.createElement;

	/* Blocks */
	const registerBlockType = wp.blocks.registerBlockType;

	const {
		TextControl,
		ToggleControl,
		SelectControl,
		RangeControl,
		PanelBody,
		Button,
		TabPanel,
		SVG,
		Path,
		Circle,
		Polygon,
	} = wp.components;

	const {
		InspectorControls,
		InnerBlocks,
		PanelColorSettings,
	} = wp.blockEditor;

	/* Register Block */
	registerBlockType( 'getbowtied/th-slider', {
		title: i18n.__( 'Slider', 'the-hanger-extender' ),
		icon:
			el( SVG, { xmlns:'http://www.w3.org/2000/svg', viewBox:'0 0 24 24' },
				el( Path, { d:'M 6.984375 2.9863281 A 1.0001 1.0001 0 0 0 6.8398438 3 L 3 3 A 1.0001 1.0001 0 0 0 2 4 L 2 20 A 1.0001 1.0001 0 0 0 3 21 L 6.8320312 21 A 1.0001 1.0001 0 0 0 7.1582031 21 L 16.832031 21 A 1.0001 1.0001 0 0 0 17.158203 21 L 21 21 A 1.0001 1.0001 0 0 0 22 20 L 22 4 A 1.0001 1.0001 0 0 0 21 3 L 17.154297 3 A 1.0001 1.0001 0 0 0 16.984375 2.9863281 A 1.0001 1.0001 0 0 0 16.839844 3 L 7.1542969 3 A 1.0001 1.0001 0 0 0 6.984375 2.9863281 z M 4 5 L 6 5 L 6 19 L 4 19 L 4 5 z M 8 5 L 16 5 L 16 19 L 8 19 L 8 5 z M 18 5 L 20 5 L 20 19 L 18 19 L 18 5 z' } ),
			),
		category: 'thehanger',
		supports: {
			align: [ 'center', 'wide', 'full' ],
		},
		attributes: {
			fullHeight: {
				type: 'boolean',
				default: false
			},
			customHeight: {
				type: 'number',
				default: '800',
			},
			slides: {
				type: 'number',
				default: '3',
			},
			pagination: {
				type: 'boolean',
				default: true
			},
			paginationColor: {
				type: 'string',
				default: '#fff'
			},
	        activeTab: {
	        	type: 'number',
	        	default: '1'
	        }
		},

		edit: function( props ) {

			let attributes = props.attributes;

			function getTabs() {

				let tabs = [];

				let icons = [
					{ 'tab': '1', 'code': 'M3 5H1v16c0 1.1.9 2 2 2h16v-2H3V5zm11 10h2V5h-4v2h2v8zm7-14H7c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V3c0-1.1-.9-2-2-2zm0 16H7V3h14v14z' },
					{ 'tab': '2', 'code': 'M3 5H1v16c0 1.1.9 2 2 2h16v-2H3V5zm18-4H7c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V3c0-1.1-.9-2-2-2zm0 16H7V3h14v14zm-4-4h-4v-2h2c1.1 0 2-.89 2-2V7c0-1.11-.9-2-2-2h-4v2h4v2h-2c-1.1 0-2 .89-2 2v4h6v-2z' },
					{ 'tab': '3', 'code': 'M21 1H7c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V3c0-1.1-.9-2-2-2zm0 16H7V3h14v14zM3 5H1v16c0 1.1.9 2 2 2h16v-2H3V5zm14 8v-1.5c0-.83-.67-1.5-1.5-1.5.83 0 1.5-.67 1.5-1.5V7c0-1.11-.9-2-2-2h-4v2h4v2h-2v2h2v2h-4v2h4c1.1 0 2-.89 2-2z' },
					{ 'tab': '4', 'code': 'M3 5H1v16c0 1.1.9 2 2 2h16v-2H3V5zm12 10h2V5h-2v4h-2V5h-2v6h4v4zm6-14H7c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V3c0-1.1-.9-2-2-2zm0 16H7V3h14v14z' },
					{ 'tab': '5', 'code': 'M21 1H7c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V3c0-1.1-.9-2-2-2zm0 16H7V3h14v14zM3 5H1v16c0 1.1.9 2 2 2h16v-2H3V5zm14 8v-2c0-1.11-.9-2-2-2h-2V7h4V5h-6v6h4v2h-4v2h4c1.1 0 2-.89 2-2z' },
					{ 'tab': '6', 'code': 'M3 5H1v16c0 1.1.9 2 2 2h16v-2H3V5zm18-4H7c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V3c0-1.1-.9-2-2-2zm0 16H7V3h14v14zm-8-2h2c1.1 0 2-.89 2-2v-2c0-1.11-.9-2-2-2h-2V7h4V5h-4c-1.1 0-2 .89-2 2v6c0 1.11.9 2 2 2zm0-4h2v2h-2v-2z' },
				];

				for( let i = 1; i <= attributes.slides; i++ ) {
					tabs.push(
						el( 'a',
							{
				                key: 'slide' + i,
				                className: 'slide-tab slide-' + i,
				                'data-tab': i,
				                onClick: function() {
                    				props.setAttributes({ activeTab: i });
                                },
				            },
				            el( SVG,
				            	{
				            		xmlns:"http://www.w3.org/2000/svg",
				            		viewBox:"0 0 24 24"
				            	},
				            	el( Path,
				            		{
				            			d: icons[i-1]['code']
				            		}
				            	)
				            ),
			            )
					);
				}

				return tabs;
			}

			function getTemplates() {
				let n = [];

                for ( let i = 1; i <= attributes.slides; i++ ) {
                	n.push(["getbowtied/th-slide", {
                        tabNumber: i
                    }]);
                }

                return n;
			}

			function getColors() {

				let colors = [];

				if( attributes.pagination ) {
					colors.push(
						{
							label: i18n.__( 'Pagination Bullets', 'the-hanger-extender' ),
							value: attributes.paginationColor,
							onChange: function( newColor) {
								props.setAttributes( { paginationColor: newColor } );
							},
						}
					);
				}

				return colors;
			}

			return [
				el(
					InspectorControls,
					{
						key: 'gbt_18_th_slider_inspector'
					},
					el(
						'div',
						{
							className: 'main-inspector-wrapper',
						},
						el(
							ToggleControl,
							{
								key: "gbt_18_th_slider_full_height",
								label: i18n.__( 'Full Height', 'the-hanger-extender' ),
								checked: attributes.fullHeight,
								onChange: function() {
									props.setAttributes( { fullHeight: ! attributes.fullHeight } );
								},
							}
						),
						attributes.fullHeight === false &&
						el(
							RangeControl,
							{
								key: "gbt_18_th_slider_custom_height",
								value: attributes.customHeight,
								allowReset: false,
								initialPosition: 800,
								min: 100,
								max: 1000,
								label: i18n.__( 'Custom Desktop Height', 'the-hanger-extender' ),
								onChange: function( newNumber ) {
									props.setAttributes( { customHeight: newNumber } );
								},
							}
						),
						el(
							RangeControl,
							{
								key: "gbt_18_th_slider_slides",
								value: attributes.slides,
								allowReset: false,
								initialPosition: 3,
								min: 1,
								max: 6,
								label: i18n.__( 'Number of Slides', 'the-hanger-extender' ),
								onChange: function( newNumber ) {
									props.setAttributes( { slides: newNumber } );
									props.setAttributes( { activeTab: '1' } );
								},
							}
						),
						el(
							ToggleControl,
							{
								key: "gbt_18_th_slider_pagination",
	              				label: i18n.__( 'Pagination Bullets', 'the-hanger-extender' ),
	              				checked: attributes.pagination,
	              				onChange: function() {
									props.setAttributes( { pagination: ! attributes.pagination } );
								},
							}
						),
						el(
							PanelColorSettings,
							{
								key: 'gbt_18_th_slider_arrows_color',
								title: i18n.__( 'Colors', 'the-hanger-extender' ),
								initialOpen: false,
								colorSettings: getColors()
							},
						),
					),
				),
				el( 'div',
					{
						key: 				'gbt_18_th_editor_slider_wrapper',
						className: 			'gbt_18_th_editor_slider_wrapper',
						'data-tab-active': 	attributes.activeTab
					},
					el( 'div',
						{
							key: 		'gbt_18_th_editor_slider_tabs',
							className: 	'gbt_18_th_editor_slider_tabs'
						},
						getTabs()
					),
					el(
						InnerBlocks,
						{
							key: 'gbt_18_th_editor_slider_inner_blocks ',
							template: getTemplates(),
	                        templateLock: "all",
	            			allowedBlocksNames: ["getbowtied/th-slide"]
						},
					),
				),
			];
		},

		save: function( props ) {
			attributes = props.attributes;
			return el(
				'div',
				{
					key: 'gbt_18_th_slider_wrapper',
					className: 'gbt_18_th_slider_wrapper'
				},
				el(
					'div',
					{
						key: 'gbt_18_th_slider_container',
						className: attributes.fullHeight ? 'gbt_18_th_slider_container swiper-container full_height' : 'gbt_18_th_slider_container swiper-container',
						style:
						{
							height: attributes.customHeight + 'px'
						}
					},
					el(
						'div',
						{
							key: 'swiper-wrapper',
							className: 'swiper-wrapper'
						},
						el( InnerBlocks.Content, { key: 'slide-content' } )
					),
					!! attributes.pagination && el(
						'div',
						{
							key: 'gbt_18_th_slider_pagination',
							className: 'gbt_18_th_slider_pagination',
							style:
							{
								color: attributes.paginationColor
							}
						}
					)
				)
			);
		},
	} );

} )(
	window.wp.blocks,
	window.wp.components,
	window.wp.editor,
	window.wp.i18n,
	window.wp.element
);
