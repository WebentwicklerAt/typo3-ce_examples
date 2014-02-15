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
	$pluginSignature = str_replace('_', '', $_EXTKEY) . '_' . strtolower($pluginName);
	t3lib_div::loadTCA('tt_content');
	$GLOBALS['TCA']['tt_content']['types'][$pluginSignature]['showitem'] = 'CType;;4;button;1-1-1, header;;3;;2-2-2,pi_flexform;;;;1-1-1';
	$GLOBALS['TCA']['tt_content']['columns']['pi_flexform']['config']['ds']['*,' . $pluginSignature] = 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/FlexForms.xml';
	
	// EN: Add PageTs
	// DE: PageTs hinzufügen
	t3lib_extMgm::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TypoScript/pageTsConfig-FlexForms.txt">');
}


// EN: CE derived from default element
// DE: CE abgeleitet von einem Standardelement
if (array_key_exists('enableDerived', $extConf) && $extConf['enableDerived']) {
	Tx_Extbase_Utility_Extension::registerPlugin(
		$extensionName = $_EXTKEY,
		$pluginName = 'Derived',
		$pluginTitle = 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_db.xml:ceexamples_derived.title',
		$pluginIconPathAndFilename = t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ceexamples_derived.gif'
	);
	
	// EN: TCA derived from tt_content/textpic
	// DE: TCA abgeleitet von tt_content/textpic
	// var_dump($TCA['tt_content']['types']['textpic']['showitem']);
	// $TCA['tt_content']['types'][$pluginSignature]['showitem'] = $TCA['tt_content']['types']['textpic']['showitem'];
	$pluginSignature = str_replace('_', '', $_EXTKEY) . '_' . strtolower($pluginName);
	t3lib_div::loadTCA('tt_content');
	$TCA['tt_content']['types'][$pluginSignature]['showitem'] = '
			--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.general;general,
			--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.header;header,
				bodytext;Text;;richtext:rte_transform[flag=rte_enabled|mode=ts_css],
				rte_enabled;LLL:EXT:cms/locallang_ttc.xml:rte_enabled_formlabel,
		--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.images,
			image,
		--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.extended';
	
	// EN: Add PageTs
	// DE: PageTs hinzufügen
	t3lib_extMgm::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TypoScript/pageTsConfig-Derived.txt">');
}


// EN: CE extends table 'tt_content'
// DE: CE erweitert die Tabelle 'tt_content'
if (array_key_exists('enableExtend', $extConf) && $extConf['enableExtend']) {
	$tempColumns = array(
		'extra_field' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_db.xml:tt_content.extra_field',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			),
		),
	);
	t3lib_div::loadTCA('tt_content');
	t3lib_extMgm::addTCAcolumns('tt_content', $tempColumns, 1);
	// EN: Don't display field for all content types, but 'text' only
	// DE: Feld nicht bei allen Inhaltstypen anzeigen, sondern ausschließlich bei 'Text'
	t3lib_extMgm::addToAllTCAtypes(
		$table = 'tt_content',
		$str = 'extra_field',
		$specificTypesList = 'text',
		$position = 'before:bodytext'
	);
	
	// EN: Add TypoScript setup
	// DE: TypoScript Setup hinzufügen
	t3lib_extMgm::addTypoScript($key = $_EXTKEY, $type = 'setup', '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TypoScript/setup-Extend.txt">', $afterStaticUid = 0);
}
