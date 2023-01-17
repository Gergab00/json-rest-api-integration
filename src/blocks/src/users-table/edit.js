/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps } from '@wordpress/block-editor';
import { Panel, PanelBody, PanelRow } from '@wordpress/components';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */
export default function Edit( { attributes, setAttributes } ) {
	const bodyTitle = 'My Block Settings';
	const opened = true;

	return (
		<div { ...useBlockProps() }>
			<Panel header="Users Table">
				<PanelBody title={ bodyTitle } opened={ opened }>
					<PanelRow>
						{ __(
							'Users Table – This block generates a dynamic table where it shows the data of the users.',
							'table-users'
						) }
					</PanelRow>
				</PanelBody>
			</Panel>
		</div>
	);
}