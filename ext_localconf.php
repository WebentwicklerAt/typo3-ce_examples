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
	
	// EN: Custom rendering of CE in backend
	// DE: Individuelle Darstellung des CE im Backend
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem'][] = 'EXT:' . $_EXTKEY . '/Classes/Hooks/TtContentDrawItem.php:Tx_CeExamples_Hooks_TtContentDrawItem';
}


// EN: CE derived from default element
// DE: CE abgeleitet von einem Standardelement
if (array_key_exists('enableDerived', $extConf) && $extConf['enableDerived']) {
	Tx_Extbase_Utility_Extension::configurePlugin(
		$extensionName = $_EXTKEY,
		$pluginName = 'Derived',
		$controllerActions = array(
			'ContentElement' => 'derived',
		),
		$nonCacheableControllerActions = array(
			'ContentElement' => '',
		),
		$pluginType = Tx_Extbase_Utility_Extension::PLUGIN_TYPE_CONTENT_ELEMENT
	);
}


// EN: CE referencing data from another table
// DE: CE referenziert Daten aus einer anderen Tabelle
if (array_key_exists('enableInline', $extConf) && $extConf['enableInline']) {
	Tx_Extbase_Utility_Extension::configurePlugin(
		$extensionName = $_EXTKEY,
		$pluginName = 'Inline',
		$controllerActions = array(
			'ContentElement' => 'inline',
		),
		$nonCacheableControllerActions = array(
			'ContentElement' => '',
		),
		$pluginType = Tx_Extbase_Utility_Extension::PLUGIN_TYPE_CONTENT_ELEMENT
	);
}
