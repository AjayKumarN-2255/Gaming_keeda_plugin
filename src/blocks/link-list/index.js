import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import './main.css';

registerBlockType('igk/link-list', {
    title: __('Link List', 'igk'),
    icon: 'list-view',
    edit() {
        return (
            <div {...useBlockProps()}>
                <p>{__('Link List Block - Edit Mode', 'igk')}</p>
            </div>
        );
    },
    save() {
        return (
            <div {...useBlockProps.save()}>
                <p>{__('Link List Block - Save Mode', 'igk')}</p>
            </div>
        );
    },
});
