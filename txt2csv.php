<?php
// 1. อ่านไฟล์ข้อความจากไฟล์ .txt
$txtGameEnglish = file_get_contents('Source\Bellwright\Content\Localization\Game\en\Game.locres.txt');
$txtGamePolish = file_get_contents('Source\Bellwright\Content\Localization\Game\pl\Game.locres.txt');
$txtGameChinese = file_get_contents('Source\Bellwright\Content\Localization\Game\zh-Hans\Game.locres.txt');

// 2. แยกข้อมูล
$linesGameEN = explode("\n", $txtGameEnglish);
$linesGamePL = explode("\n", $txtGamePolish);
$linesGameZH = explode("\n", $txtGameChinese);
$dataGameArray = array();
foreach ($linesGameEN as $line) {
    $partsEN = explode("=", $line, 2); // แยกข้อมูลด้วยเครื่องหมายแท็บ
    $key = trim($partsEN[0]); // ลบช่องว่างที่อยู่ด้านหน้าและด้านหลังของ key
    $value = rtrim($partsEN[1], "\r"); // ลบช่องว่างที่อยู่ด้านหน้าและด้านหลังของ value
    $dataGameArray[$key]["key"] = $key;
    $dataGameArray[$key]["en"] = $value;
}
foreach ($linesGamePL as $line) {
    $partsPL = explode("=", $line, 2); // แยกข้อมูลด้วยเครื่องหมายแท็บ
    $key = trim($partsPL[0]); // ลบช่องว่างที่อยู่ด้านหน้าและด้านหลังของ key
    $value = rtrim($partsPL[1], "\r"); // ลบช่องว่างที่อยู่ด้านหน้าและด้านหลังของ value
    $dataGameArray[$key]["pl"] = $value;
}
foreach ($linesGameZH as $line) {
    $partsZH = explode("=", $line, 2); // แยกข้อมูลด้วยเครื่องหมายแท็บ
    $key = trim($partsZH[0]); // ลบช่องว่างที่อยู่ด้านหน้าและด้านหลังของ key
    $value = rtrim($partsZH[1],"\r"); // ลบช่องว่างที่อยู่ด้านหน้าและด้านหลังของ value
    $dataGameArray[$key]["zh"] = $value;
}
// 3. เขียนข้อมูลในรูปแบบ .csv
$date = date("Ymd", time());
$csvGame = "KEY\tEN\tTranslate\tCheck\tPL\tZH";
foreach ($dataGameArray as $row) {
    $en = str_replace('"', '""', $row["en"]);
    if($row["key"]!=""){
        $csvGame .= "\n\"{$row["key"]}\"\t\"{$en}\"\t\t\t\"{$row["pl"]}\"\t\"{$row["zh"]}\"";
    }
}
file_put_contents("Game.$date.csv", $csvGame);
echo 'ไฟล์ .csv ถูกสร้างขึ้นแล้ว';