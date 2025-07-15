(function () {
	var el = wp.element.createElement,
		blocks = wp.blocks,
		RichText = wp.editor.RichText;

	blocks.registerBlockType('my-gutenberg/list', {
		title: '今日できたこと',
		icon: 'universal-access-alt',
		category: 'common',
		attributes: {
			content: {
				type: 'array',
				source: 'children',
				selector: '.list-decimal',
			},
		},
		edit: function (props) {
			var content = props.attributes.content;
			return el(
				'p', 
				{},
				'今日できたこと:',
				el(
					RichText,
					{
						tagName: 'ol',
						multiline: 'li',
						className: 'list-decimal',
						value: content,
						onChange: function (newContent) {
							props.setAttributes({ content: newContent });
						}
					}
				)
			);
		},
		save: function (props) {
			return el(
				'div', 
				{},
				'今日できたこと:',
				el(
					RichText.Content, {
					tagName: 'ol',
					className: 'list-decimal',
					value: props.attributes.content,  
					}
				)
			);
		},
	});
})();
