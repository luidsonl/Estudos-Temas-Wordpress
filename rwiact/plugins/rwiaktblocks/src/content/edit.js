/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */

import { __ } from '@wordpress/i18n';
import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';
import { useSelect } from '@wordpress/data';

export default function Edit({ clientId }) {
    const blockProps = useBlockProps();
    
    // Conta os blocos do tipo específico
    const rwiaktPostCardCount = useSelect((select) => {
        const blocks = select('core/block-editor').getBlock(clientId)?.innerBlocks || [];
        return blocks.filter(block => block.name === 'rwiaktblocks/rwiakt-post-card-main-loop').length;
    }, [clientId]);

    // Define os blocos permitidos dinamicamente
    const allowedBlocks = rwiaktPostCardCount >= 1 
        ? ['core/paragraph', 'core/heading']  // Remove o rwiakt-post-card se já existir
        : ['rwiaktblocks/rwiakt-post-card-main-loop', 'core/paragraph', 'core/heading'];

    return (
        <div {...blockProps}>
            <p>{__('Rwiakt content edit static', 'rwiaktblocks')}</p>
            
            <InnerBlocks
                allowedBlocks={allowedBlocks}
                templateLock={false}
            />
        </div>
    );
}