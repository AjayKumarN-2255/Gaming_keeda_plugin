import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import './main.css';

registerBlockType('igk/faq', {
    title: __('FAQ', 'igk'),
    icon: 'help',
    edit() {
        return (
            <div {...useBlockProps()}>
                <p>{__('FAQ Block - Edit Mode', 'igk')}</p>
            </div>
        );
    },
    save() {
        return (
            <div {...useBlockProps.save()}>
                <p>{__('FAQ Block - Save Mode', 'igk')}</p>
            </div>
        );
    },
});
