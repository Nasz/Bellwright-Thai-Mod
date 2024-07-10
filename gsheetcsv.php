<?php
include "config.php";
setlocale(LC_ALL, 'th_TH.utf8');
$csv_content = file_get_contents($url);
$new_file_name = 'D:\AppPool\BellwrightThaiLocalization\Source\Bellwright\Content\Localization\Game\th\Game.locres.csv'; // Specify your desired new file name
file_put_contents($new_file_name, $csv_content);
echo "CSV file downloaded and saved as $new_file_name.";
