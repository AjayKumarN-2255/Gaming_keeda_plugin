import { registerBlockType } from '@wordpress/blocks';
import { useEffect } from '@wordpress/element';
import { __ } from '@wordpress/i18n';
import {
    useBlockProps,
    RichText,
    MediaPlaceholder
} from '@wordpress/block-editor';
import './main.css';

registerBlockType('igk/author-bio', {
    title: __('Author Bio', 'igk'),
    icon: 'businessperson',
    category: 'widgets',

    edit({ attributes, setAttributes }) {
        const {
            name,
            role,
            desc,
            imgURL,
            updated
        } = attributes;

        const blockProps = useBlockProps({
            className: 'igk-bio-card'
        });

        useEffect(() => {
            setAttributes({
                updated: new Date()
            });
        }, [name, role, desc]);

        return (
            <div {...blockProps}>
                <div className="author-meta">

                    <div className="author-image-wrapper">
                        {imgURL ? (
                            <img
                                src={imgURL}
                                onClick={() =>
                                    setAttributes({
                                        imgURL: '',
                                        imgAlt: ''
                                    })
                                }
                            />
                        ) : (
                            <MediaPlaceholder
                                onSelect={(media) => {
                                    setAttributes({
                                        imgURL: media.url,
                                        imgAlt: media.alt || 'Author'
                                    });
                                }}
                                allowedTypes={['image']}
                                multiple={false}
                                labels={{ title: 'Image' }}
                            />
                        )}
                    </div>

                    <div className="author-info">
                        <RichText
                            placeholder={__('Name', 'igk')}
                            tagName="strong"
                            className="author-name"
                            value={name}
                            onChange={(value) =>
                                setAttributes({ name: value })
                            }
                        />

                        <RichText
                            placeholder={__('Role', 'igk')}
                            tagName="span"
                            className="author-role"
                            value={role}
                            onChange={(value) =>
                                setAttributes({ role: value })
                            }
                        />
                    </div>
                </div>

                <div className="author-bio">
                    <RichText
                        placeholder={__('Author bio...', 'igk')}
                        tagName="p"
                        value={desc}
                        onChange={(value) =>
                            setAttributes({ desc: value })
                        }
                    />
                </div>

                <div className="author-footer">
                    <span className="last-updated-label">
                        <span className="dashicons dashicons-clock"></span>
                        {__('Last updated:', 'igk')}
                    </span>

                    <RichText
                        placeholder="21.04.2026"
                        tagName="span"
                        className="updated-date"
                        value={updated}
                        onChange={(value) =>
                            setAttributes({ updated: value })
                        }
                    />
                </div>
            </div>
        );
    },

    save() { return null; }
});