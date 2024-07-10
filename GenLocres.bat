:: This program just auto generate new translate mod
del /q C:\Users\nac_n\AppData\Local\Bellwright\Saved\Crashes\*.*
cd D:\AppPool\BellwrightThaiLocalization
:: Get new translation from google sheet.
php gsheetcsv.php
:: Open Locres tool to edit .locres file.
"D:\UE4localizationsTool\UE4localizationsTool.exe" D:\AppPool\BellwrightThaiLocalization\Source\Bellwright\Content\Localization\Game\en\Game.locres
:: Prepare to create new pak file.
rm D:\Unreal\UE_5.4\Engine\DerivedDataCache\*.*
D:\Unreal\UE_5.4\Engine\Binaries\Win64\UnrealPak.exe "D:\AppPool\BellwrightThaiLocalization\zBRThai_P.pak" -create=D:\AppPool\BellwrightThaiLocalization\filelist.txt -compress
:: Install new mod to your game.
copy .\zBRThai_P.pak "E:\SteamLibrary\steamapps\common\Bellwright\Bellwright\Content\Paks\~mods\zBRThai_P.pak"