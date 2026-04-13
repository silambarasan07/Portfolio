<?php
$c = file_get_contents('index.html');

// Find all icon divs and replace the corrupted emoji content
$c = preg_replace(
    '/<div class="icon">(?!<)(.*?)<\/div>/s',
    '<div class="icon"><i class="bi bi-palette" style="font-size:1.4rem"></i></div>',
    $c,
    1 // only first match (Frontend Tech)
);

$c = preg_replace(
    '/<div class="icon">(?!<)(.*?)<\/div>/s',
    '<div class="icon"><i class="bi bi-lightning-charge" style="font-size:1.4rem"></i></div>',
    $c,
    1 // second match (Additional Skills)
);

// Verify
preg_match_all('/<div class="icon">(.+?)<\/div>/', $c, $matches);
echo "Icons after fix:\n";
foreach ($matches[1] as $icon) {
    echo "  - " . strip_tags($icon) . " | " . substr($icon, 0, 30) . "\n";
}

file_put_contents('index.html', $c);
echo "\nDone!\n";
