<?php

function dfb_add_meta_tags()
{
    global $post;

    if (is_single() || is_page()) {
        $excerpt = get_the_excerpt();
        if (empty($excerpt)) {
            $excerpt = wp_trim_words(strip_shortcodes(get_the_content()), 20, '...');
        }

        echo '<meta name="description" content="' . esc_attr($excerpt) . '" />' . "\n";

        // Open Graph tags
        echo '<meta property="og:title" content="' . esc_attr(get_the_title()) . '" />' . "\n";
        echo '<meta property="og:description" content="' . esc_attr($excerpt) . '" />' . "\n";
        echo '<meta property="og:type" content="' . (is_single() ? 'article' : 'website') . '" />' . "\n";
        echo '<meta property="og:url" content="' . esc_url(get_permalink()) . '" />' . "\n";

        if (has_post_thumbnail()) {
            $thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
            echo '<meta property="og:image" content="' . esc_attr($thumbnail_src[0]) . '" />' . "\n";
        }
    }
}
add_action('wp_head', 'dfb_add_meta_tags');
