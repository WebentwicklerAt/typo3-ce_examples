<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$extConf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]);

// EN: CE defined with FlexForms
// DE: CE definiert mit FlexForms
if (array_key_exists('enableFlexForms', $extConf) && $extConf['enableFlexForms']) {
	Tx_Extbase_Utility_Extension::registerPlugin(
		$extensionName = $_EXTKEY,
		$pluginName = 'FlexForms',
		$pluginTitle = 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_db.xml:ceexamples_flexforms.title',
		$pluginIconPathAndFilename = t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ceexamples_flexforms.gif'
	);
	
	// EN: Add FlexForms
	// DE: FlexForms hinzufügen
	t3lib_div::loadTCA('tt_content');
	$GLOBALS['TCA']['tt_content']['types']['ceexamples_flexforms']['showitem'] = 'CType;;4;button;1-1-1, header;;3;;2-2-2,pi_flexform;;;;1-1-1';
	$GLOBALS['TCA']['tt_content']['columns']['pi_flexform']['config']['ds']['*,ceexamples_flexforms'] = 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/FlexForms.xml';
	
	// EN: Add PageTs
	// DE: PageTs hinzufügen
	t3lib_extMgm::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TypoScript/pageTsConfig-FlexForms.txt">');
}
