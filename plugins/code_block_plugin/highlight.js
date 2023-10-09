// PHPコード
function create_code_block($atts, $content = null) {
    wp_enqueue_script('highlight-js', 'https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.7.2/highlight.min.js', array(), '10.7.2', true);
    wp_enqueue_style('highlight-css', 'https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.7.2/styles/default.min.css', array(), '10.7.2', 'all');

    // highlight.jsを有効にするJavaScript
    $script = '<script>hljs.highlightAll();</script>';

    // 一度だけreturnする
    return '<pre><code class="hljs">' . esc_html($content) . '</code></pre>' . $script;
}
