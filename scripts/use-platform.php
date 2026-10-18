<?php
// Sets the primary site's Cookie Connect settings from a JSON file, as the
// control panel would. Used by screenshots.mjs.
//
//   php scripts/use-platform.php settings.json

define('CRAFT_BASE_PATH', dirname(__DIR__));
require CRAFT_BASE_PATH.'/vendor/autoload.php';
if (class_exists(Dotenv\Dotenv::class)) {
    Dotenv\Dotenv::createUnsafeImmutable(CRAFT_BASE_PATH)->safeLoad();
}
define('CRAFT_VENDOR_PATH', CRAFT_BASE_PATH.'/vendor');
$app = require CRAFT_VENDOR_PATH.'/craftcms/cms/bootstrap/console.php';

$data = json_decode((string) file_get_contents($argv[1]), true);
$site = Craft::$app->getSites()->getPrimarySite();
echo json_encode(nineteenninetyfour\cookieconnect\Plugin::getInstance()->siteSettings->save($site, $data)), "\n";
