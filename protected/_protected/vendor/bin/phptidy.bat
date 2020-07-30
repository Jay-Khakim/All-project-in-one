@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../cmrcx/phptidy/phptidy
php "%BIN_TARGET%" %*
