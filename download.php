<?php
include("functions.php");

// This is a property list
header("Content-type: application/xml");

$url = $_GET["u"];	// IPA url
$app_info  = json_decode(fetchuri("https://itunes.apple.com/lookup?id=" . $_GET["id"]), true)["results"][0];	// First result returned by Apple

$app_bid = $app_info["bundleId"];
$app_version = $app_info["version"];
$app_name = $app_info["trackCensoredName"];
$app_lgicon = $app_info["artworkUrl512"];

// Based on template from vshare: https://ssl-api.appvv.com/update.plist?type=iosNoJB&language=en
echo <<<END
<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd"><plist version="1.0"><dict><key>items</key><array><dict><key>assets</key><array><dict><key>kind</key><string>software-package</string><key>url</key><string>http://$url</string></dict><dict><key>kind</key><string>display-image</string><key>needs-shine</key><false/><key>url</key><string>http://pic.appvv.com/icon_sign.png</string></dict></array><key>metadata</key><dict><key>bundle-identifier</key><string>$app_bid</string><key>kind</key><string>software</string><key>bundle-version</key><string>$app_version</string><key>subtitle</key><string>forbidden app store</string><key>title</key><string>$app_name</string></dict></dict></array></dict></plist>
END;

?>