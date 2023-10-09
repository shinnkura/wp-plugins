<?php
/**
 * Plugin Name: Code Block Plugin
 * Description: Create code blocks like ChatGPT.
 * Version: 1.0
 * Author: Your Name
 */

// Shortcode to create code block
function create_code_block($atts, $content = null) {
    return '<pre><code>' . esc_html($content) . '</code></pre>';
}

// Register shortcode
add_shortcode('codeblock', 'create_code_block');

// Add button to TinyMCE editor to insert shortcode
function add_code_block_button() {
    if (current_user_can('edit_posts') && current_user_can('edit_pages')) {
        add_filter('mce_buttons', 'register_code_block_button');
        add_filter('mce_external_plugins', 'add_code_block_tinymce_plugin');
    }
}

// Register button
function register_code_block_button($buttons) {
    array_push($buttons, "|", "codeblock");
    return $buttons;
}

// Load the TinyMCE plugin
function add_code_block_tinymce_plugin($plugin_array) {
    $plugin_array['codeblock'] = plugin_dir_url(__FILE__) . 'code_block_tinymce.js';
    return $plugin_array;
}

// Initialize
add_action('init', 'add_code_block_button');

// 関数内部に追加
function create_code_block($atts, $content = null) {
    wp_enqueue_script('highlight-js', 'https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.7.2/highlight.min.js', array(), '10.7.2', true);
    wp_enqueue_style('highlight-css', 'https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.7.2/styles/default.min.css', array(), '10.7.2', 'all');

    $script = '<script>hljs.highlightAll();</script>';

    return '<pre><code class="hljs">' . esc_html($content) . '</code></pre>';
}


?>
