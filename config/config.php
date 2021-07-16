<?php

//Constants for access to the controller
define('PathPrefix', '../controllers/');
define('PathPostfix', 'Controller.php');

//used template
$template = 'default';
$templateAdmin = 'admin';

//file path for access to the templates(.tpl)
define ('TemplatePrefix', "../views/{$template}/");
define ('TemplateAdminPrefix', "../views/{$templateAdmin}/");
define ('TemplatePostfix', '.tpl');

//file path for access in webspace
define ('TemplateWebPath', "../www/templates/{$template}/");
define ('TemplateAdminWebPath', "../www/templates/{$templateAdmin}/");

//initialization Smatry template. Put full path to Smarty.class.php
require('../library/Smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir(TemplatePrefix);
$smarty->setCompileDir('../tmp/smarty/templates_c');
$smarty->setCacheDir('../tmp/smarty/cache');
$smarty->setConfigDir('../library/Smarty/configs');

$smarty->assign('templateWebPath', TemplateWebPath);
