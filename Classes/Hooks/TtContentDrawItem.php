<?php

require_once(t3lib_extMgm::extPath('cms') . 'layout/interfaces/interface.tx_cms_layout_tt_content_drawitemhook.php');

class Tx_CeExamples_Hooks_TtContentDrawItem extends tslib_pibase implements tx_cms_layout_tt_content_drawItemHook {
	
	/**
	 * Preprocesses the preview rendering of a content element.
	 *
	 * @param	tx_cms_layout		$parentObject: Calling parent object
	 * @param	boolean				$drawItem: Whether to draw the item using the default functionalities
	 * @param	string				$headerContent: Header content
	 * @param	string				$itemContent: Item content
	 * @param	array				$row: Record row of tt_content
	 * @return	void
	 */
	public function preProcess(tx_cms_layout &$parentObject, &$drawItem, &$headerContent, &$itemContent, array &$row) {
		if ($row['CType'] == 'ceexamples_flexforms') {
			$data = t3lib_div::xml2array($row['pi_flexform']);
			$itemContent = $data['data']['sDEF']['lDEF']['settings.textfield']['vDEF'];
		}
	}
	
}
