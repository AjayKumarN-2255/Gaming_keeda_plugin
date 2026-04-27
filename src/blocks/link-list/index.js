import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import { TextControl, Button, Dashicon } from '@wordpress/components';
import metadata from './block.json';
import './main.css';

registerBlockType(metadata.name, {
    edit({ attributes, setAttributes }) {
        const { title, links = [] } = attributes;
        const blockProps = useBlockProps({ className: 'igk-link-list-editor' });

        const addLink = () => {
            setAttributes({
                links: [...links, { label: '', url: '' }]
            });
        };

        const updateLink = (value, index, key) => {
            const newLinks = [...links];
            newLinks[index][key] = value;
            setAttributes({ links: newLinks });
        };

        const removeLink = (index) => {
            const newLinks = links.filter((_, i) => i !== index);
            setAttributes({ links: newLinks });
        };

        return (
            <div {...blockProps}>

                {/* TITLE */}
                <div className="igk-link-header">
                    <TextControl
                        label={__('Title', 'igk')}
                        placeholder={__('Discover more', 'igk')}
                        value={title}
                        onChange={(value) =>
                            setAttributes({ title: value })
                        }
                    />
                </div>

                <div className="igk-link-items">

                    {links.map((item, index) => (
                        <div key={index} className="igk-link-row">

                            <div className="igk-row-inputs">

                                {/* LABEL */}
                                <TextControl
                                    label={__('Label', 'igk')}
                                    placeholder={__('e.g. Weather', 'igk')}
                                    value={item.label}
                                    onChange={(val) =>
                                        updateLink(val, index, 'label')
                                    }
                                />

                                {/* URL */}
                                <TextControl
                                    label={__('URL', 'igk')}
                                    placeholder={__('https://example.com', 'igk')}
                                    value={item.url}
                                    onChange={(val) =>
                                        updateLink(val, index, 'url')
                                    }
                                />

                            </div>

                            {/* REMOVE */}
                            <div className="igk-row-actions">
                                <Dashicon icon="trash" />
                                <Button
                                    isDestructive
                                    onClick={() => removeLink(index)}
                                >
                                    {__('Remove', 'igk')}
                                </Button>
                            </div>

                        </div>
                    ))}

                </div>

                {/* ADD BUTTON */}
                <Button
                    isPrimary
                    onClick={addLink}
                    className="igk-add-btn"
                >
                    {__('+ Add New Category', 'igk')}
                </Button>

            </div>
        );
    },

    save: () => null
});