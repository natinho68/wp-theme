<?php

class SponsoMetabox
{
    const META_KEY = 'manniSponso';
    const NONCE = '_manniSponso_nonce';

    /**
     * Register custom hook
     */
    public static function register()
    {
        add_action('add_meta_boxes', [self::class, 'add'], 10, 2);
        add_action('save_post', [self::class, 'save']);
    }

    /**
     * Add metabox to metaboxes
     */
    public static function add(string $postType, WP_Post $post)
    {
        if ($postType === 'post' && current_user_can('publish_posts', $post->ID)) {
            add_meta_box(self::META_KEY, 'Sponsoring', [self::class, 'render'], 'post', 'side');
        }
    }

    /**
     * Render the checkbox
     * @param WP_Post $post
     */
    public static function render(WP_Post $post)
    {
        $value = get_post_meta($post->ID, self::META_KEY, true);
        wp_nonce_field(self::NONCE, self::NONCE); ?>
        <input type="hidden" value="0" name="<?= self::META_KEY ?>">
        <input type="checkbox" value="1" name="<?= self::META_KEY ?>" <?php checked($value, 1) ?>>
        <label for="<?= self::META_KEY ?>">This article is sponsored ?</label>
        <?php
    }

    /**
     * Save behavior for metabox
     * @param int $postId
     */
    public static function save(int $postId)
    {
        if (wp_verify_nonce($_POST[self::NONCE], self::NONCE) &&
            array_key_exists(self::META_KEY, $_POST) &&
            current_user_can('publish_posts', $postId)) {
            if ($_POST[self::META_KEY] === '0') {
                delete_post_meta($postId, self::META_KEY);
            } else {
                update_post_meta($postId, self::META_KEY, 1);
            }
        }
    }
}
