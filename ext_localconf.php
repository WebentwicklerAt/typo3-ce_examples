<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$extConf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]);

// EN: CE defined with FlexForms
// DE: CE definiert mit FlexForms
if (array_key_exists('enableFlexForms', $extConf) && $extConf['enableFlexForms']) {
	Tx_Extbase_Utility_Extension::configurePlugin(
		$extensionName = $_EXTKEY,
		$pluginName = 'FlexForms',
		$controllerActions = array(
			'ContentElement' => 'flexForms',
		),
		$nonCacheableControllerActions = array(
			'ContentElement' => '',
		),
		$pluginType = Tx_Extbase_Utility_Extension::PLUGIN_TYPE_CONTENT_ELEMENT
	);
}
