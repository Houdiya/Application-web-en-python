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
		SVG,
		Path,
		Circle,
		Polygon,
	} = wp.components;

	const {
		InspectorControls,
		MediaUpload,
		RichText,
		AlignmentToolbar,
		BlockControls,
		PanelColorSettings,
	} = wp.blockEditor;

	var attributes = {
		imgURL: {
			type: 'string',
			attribute: 'src',
			selector: 'img',
			default: '',
		},
		imgID: {
			type: 'number',
		},
		imgAlt: {
			type: 'string',
			attribute: 'alt',
			selector: 'img',
		},
		title: {
			type: 'string',
			default: 'Slide Title',
		},
		description: {
			type: 'string',
			default: 'Slide Description'
		},
		textColor: {
			type: 'string',
			default: '#fff'
		},
		buttonText: {
			type: 'string',
			default: 'Button Text'
		},
		slideURL: {
			type: 'string',
			default: '#'
		},
		slideButton: {
			type: 'boolean',
			default: true
		},
		backgroundColor: {
			type: 'string',
			default: '#24282e'
		},
		alignment: {
			type: 'string',
			default: 'center'
		},
		tabNumber: {
			type: "number"
		},
		titleSize: {
			type: "string",
			default: '0.8125rem'
		},
		descriptionSize: {
			type: "string",
			default: '2.5rem'
		},
	};

	/* Register Block */
	registerBlockType( 'getbowtied/th-slide', {
		title: i18n.__( 'Slide', 'the-hanger-extender' ),
		icon:
			el( SVG, { xmlns:'http://www.w3.org/2000/svg', viewBox:'0 0 24 24' },
				el( Path, { d:'M21 3H3C2 3 1 4 1 5v14c0 1.1.9 2 2 2h18c1 0 2-1 2-2V5c0-1-1-2-2-2zm0 15.92c-.02.03-.06.06-.08.08H3V5.08L3.08 5h17.83c.03.02.06.06.08.08v13.84zm-10-3.41L8.5 12.5 5 17h14l-4.5-6z' } ),
			),
		category: 'thehanger',
		parent: [ 'getbowtied/th-slider' ],
		attributes: attributes,

		edit: function( props ) {

			let attributes = props.attributes;

			return [
				el(
					InspectorControls,
					{
						key: 'gbt_18_th_slide_inspector'
					},
					el(
						'div',
						{
							className: 'main-inspector-wrapper',
						},
						el(
							TextControl,
							{
								key: "gbt_18_th_editor_slide_link",
	              				label: i18n.__( 'Link', 'the-hanger-extender' ),
	              				type: 'text',
	              				value: attributes.slideURL,
	              				onChange: function( newText ) {
									props.setAttributes( { slideURL: newText } );
								},
							},
						),
						el( 'hr', {} ),
						el(
							ToggleControl,
							{
								key: "gbt_18_th_editor_slide_button",
	              				label: i18n.__( 'Slide Button', 'the-hanger-extender' ),
	              				checked: attributes.slideButton,
	              				onChange: function() {
									props.setAttributes( { slideButton: ! attributes.slideButton } );
								},
							}
						),
						el(
							PanelBody,
							{
								key: 'gbt_18_th_editor_slide_text_settings',
								title: 'Title & Description',
								initialOpen: false,
							},
							el(
								TextControl,
								{
									key: "gbt_18_th_editor_slide_title_size",
									value: attributes.titleSize,
									type: 'text',
									label: i18n.__( 'Title Font Size', 'the-hanger-extender' ),
									onChange: function( newNumber ) {
										props.setAttributes( { titleSize: newNumber } );
									},
								}
							),
							el(
								TextControl,
								{
									key: "gbt_18_th_editor_slide_description_size",
									value: attributes.descriptionSize,
									type: 'text',
									label: i18n.__( 'Description Font Size', 'the-hanger-extender' ),
									onChange: function( newNumber ) {
										props.setAttributes( { descriptionSize: newNumber } );
									},
								}
							),
						),
						el(
							PanelColorSettings,
							{
								key: 'gbt_18_th_editor_slide_colors',
								initialOpen: false,
								title: i18n.__( 'Colors', 'the-hanger-extender' ),
								colorSettings: [
									{
										label: i18n.__( 'Text Color', 'the-hanger-extender' ),
										value: attributes.textColor,
										onChange: function( newColor) {
											props.setAttributes( { textColor: newColor } );
										},
									},
									{
										label: i18n.__( 'Slide Background', 'the-hanger-extender' ),
										value: attributes.backgroundColor,
										onChange: function( newColor) {
											props.setAttributes( { backgroundColor: newColor } );
										}
									}
								]
							},
						),
					),
				),
				el( 'div',
					{
						key: 		'gbt_18_th_editor_slide_wrapper',
						className : 'gbt_18_th_editor_slide_wrapper'
					},
					el(
						MediaUpload,
						{
							key: 'gbt_18_th_editor_slide_image',
							allowedTypes: [ 'image' ],
							buttonProps: { className: 'components-button button button-large' },
	              			value: attributes.imgID,
							onSelect: function( img ) {
								props.setAttributes( {
									imgID: img.id,
									imgURL: img.url,
									imgAlt: img.alt,
								} );
							},
	              			render: function( img ) {
	              				return [
		              				! attributes.imgID && el(
		              					Button,
		              					{
		              						key: 'gbt_18_th_slide_add_image_button',
		              						className: 'gbt_18_th_slide_add_image_button button add_image',
		              						onClick: img.open
		              					},
		              					i18n.__( 'Add Image', 'the-hanger-extender' )
	              					),
	              					!! attributes.imgID && el(
	              						Button,
										{
											key: 'gbt_18_th_slide_remove_image_button',
											className: 'gbt_18_th_slide_remove_image_button button remove_image',
											onClick: function() {
												img.close;
												props.setAttributes({
									            	imgID: null,
									            	imgURL: null,
									            	imgAlt: null,
									            });
											}
										},
										i18n.__( 'Remove Image', 'the-hanger-extender' )
									),
	              				];
	              			},
						},
					),
					el(
						BlockControls,
						{
							key: 'gbt_18_th_editor_slide_alignment'
						},
						el(
							AlignmentToolbar,
							{
								key: 'gbt_18_th_editor_slide_alignment_control',
								value: attributes.alignment,
								onChange: function( newAlignment ) {
									props.setAttributes( { alignment: newAlignment } );
								}
							}
						),
					),
					el(
						'div',
						{
							key: 		'gbt_18_th_editor_slide_wrapper',
							className: 	'gbt_18_th_editor_slide_wrapper',
							style:
							{
								backgroundColor: attributes.backgroundColor,
								backgroundImage: 'url(' + attributes.imgURL + ')'
							},
						},
						el(
							'div',
							{
								key: 		'gbt_18_th_editor_slide_content',
								className: 	'gbt_18_th_editor_slide_content',
							},
							el(
								'div',
								{
									key: 		'gbt_18_th_editor_slide_container',
									className: 	'gbt_18_th_editor_slide_container align-' + attributes.alignment,
									style:
									{
										textAlign: attributes.alignment
									}
								},
								el(
									'div',
									{
										key: 		'gbt_18_th_editor_slide_title',
										className: 	'gbt_18_th_editor_slide_title',
									},
									el(
										RichText,
										{
											key: 'gbt_18_th_editor_slide_title_input',
											style:
											{
												color: attributes.textColor,
												fontSize: attributes.titleSize
											},
											format: 'string',
											className: 'gbt_18_th_editor_slide_title_input',
											allowedFormats: [],
											tagName: 'h4',
											value: attributes.title,
											placeholder: i18n.__( 'Add Title', 'the-hanger-extender' ),
											onChange: function( newTitle) {
												props.setAttributes( { title: newTitle } );
											}
										}
									),
								),
								el(
									'div',
									{
										key: 		'gbt_18_th_editor_slide_description',
										className: 	'gbt_18_th_editor_slide_description',
									},
									el(
										RichText,
										{
											key: 'gbt_18_th_editor_slide_description_input',
											style:
											{
												color: attributes.textColor,
												fontSize: attributes.descriptionSize
											},
											className: 'gbt_18_th_editor_slide_description_input',
											format: 'string',
											tagName: 'p',
											value: attributes.description,
											allowedFormats: [],
											placeholder: i18n.__( 'Add Subtitle', 'the-hanger-extender' ),
											onChange: function( newSubtitle) {
												props.setAttributes( { description: newSubtitle } );
											}
										}
									),
								),
								!! attributes.slideButton && el(
									'div',
									{
										key: 		'gbt_18_th_editor_slide_button',
										className: 	'gbt_18_th_editor_slide_button',
									},
									el(
										RichText,
										{
											key: 'gbt_18_th_editor_slide_button_input',
											className: 'gbt_18_th_editor_slide_button_input',
											format: 'string',
											tagName: 'h5',
											style:
											{
												color: attributes.textColor,
												borderColor: attributes.textColor,
											},
											value: attributes.buttonText,
											allowedFormats: [],
											placeholder: i18n.__( 'Button Text', 'the-hanger-extender' ),
											onChange: function( newText) {
												props.setAttributes( { buttonText: newText } );
											}
										}
									),
								),
							),
						),
					),
				),
			];
		},
		getEditWrapperProps: function( attributes ) {
            return {
            	'data-tab': attributes.tabNumber
            };
        },
		save: function( props ) {

			let attributes = props.attributes;

			return el( 'div',
				{
					key: 		'gbt_18_th_swiper_slide',
					className: 	'gbt_18_th_swiper_slide swiper-slide ' + attributes.alignment + '-align',
					style:
					{
						backgroundColor: attributes.backgroundColor,
						backgroundImage: 'url(' + attributes.imgURL + ')',
						color: attributes.textColor
					}
				},
				! attributes.slideButton && attributes.slideURL != '' && el( 'a',
					{
						key: 		'gbt_18_th_slide_fullslidelink',
						className: 	'fullslidelink',
						href: 		attributes.slideURL,
						'target': 	'_blank',
						'rel': 		'noopener noreferrer',
					}
				),
				el( 'div',
					{
						key: 					'gbt_18_th_slide_content',
						className: 				'gbt_18_th_slide_content slider-content',
						'data-swiper-parallax': '-1000'
					},
					el( 'div',
						{
							key: 		'gbt_18_th_slide_content_wrapper',
							className: 	'gbt_18_th_slide_content_wrapper slider-content-wrapper'
						},
						attributes.title != '' && el( 'h4',
							{
								key: 		'gbt_18_th_slide_title',
								className: 	'gbt_18_th_slide_title slide-title',
								style:
								{
									color: attributes.textColor,
									fontSize: attributes.titleSize
								},
								dangerouslySetInnerHTML: { __html: attributes.title },
							},
						),
						attributes.description != '' && el( 'p',
							{
								key: 		'gbt_18_th_slide_description',
								className: 	'gbt_18_th_slide_description slide-description',
								style:
								{
									color: attributes.textColor,
									fontSize: attributes.descriptionSize
								},
								dangerouslySetInnerHTML: { __html: attributes.description },
							},
						),
						!! attributes.slideButton && attributes.buttonText != '' && el( 'a',
							{
								key: 		'gbt_18_th_slide_button',
								className: 	'gbt_18_th_slide_button slide-button',
								href: attributes.slideURL,
								style:
								{
									color: attributes.textColor,
									borderColor: attributes.textColor,
								},
								dangerouslySetInnerHTML: { __html: attributes.buttonText },
							},
						)
					)
				)
			);
		},

		deprecated: [
	        {
				attributes: attributes,

	            save: function( props ) {
					let attributes = props.attributes;

					return el( 'div',
						{
							key: 		'gbt_18_th_swiper_slide',
							className: 	'gbt_18_th_swiper_slide swiper-slide ' + attributes.alignment + '-align',
							style:
							{
								backgroundColor: attributes.backgroundColor,
								backgroundImage: 'url(' + attributes.imgURL + ')',
								color: attributes.textColor
							}
						},
						! attributes.slideButton && attributes.slideURL != '' && el( 'a',
							{
								key: 		'gbt_18_th_slide_fullslidelink',
								className: 	'fullslidelink',
								href: 		attributes.slideURL,
								'target': 	'_blank'
							}
						),
						el( 'div',
							{
								key: 					'gbt_18_th_slide_content',
								className: 				'gbt_18_th_slide_content slider-content',
								'data-swiper-parallax': '-1000'
							},
							el( 'div',
								{
									key: 		'gbt_18_th_slide_content_wrapper',
									className: 	'gbt_18_th_slide_content_wrapper slider-content-wrapper'
								},
								attributes.title != '' && el( 'h4',
									{
										key: 		'gbt_18_th_slide_title',
										className: 	'gbt_18_th_slide_title slide-title',
										style:
										{
											color: attributes.textColor
										},
										dangerouslySetInnerHTML: { __html: attributes.title },
									},
								),
								attributes.description != '' && el( 'p',
									{
										key: 		'gbt_18_th_slide_description',
										className: 	'gbt_18_th_slide_description slide-description',
										style:
										{
											color: attributes.textColor
										},
										dangerouslySetInnerHTML: { __html: attributes.description },
									},
								),
								!! attributes.slideButton && attributes.buttonText != '' && el( 'a',
									{
										key: 		'gbt_18_th_slide_button',
										className: 	'gbt_18_th_slide_button slide-button',
										href: attributes.slideURL,
										style:
										{
											color: attributes.textColor,
											borderColor: attributes.textColor,
										},
										dangerouslySetInnerHTML: { __html: attributes.buttonText },
									},
								)
							)
						)
					);
	            },
	        }
	    ],
	} );

} )(
	window.wp.blocks,
	window.wp.components,
	window.wp.editor,
	window.wp.i18n,
	window.wp.element
);
