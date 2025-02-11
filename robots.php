<?php
header("Content-Type: text/plain");

echo "User-agent: *\n";
echo "Disallow: /admin/\n";
echo "Disallow: /private/\n";
echo "Allow: /\n";
echo "\n";
echo "Sitemap: https://www.vnbacsionline.com/sitemap.xml.php\n";
?>