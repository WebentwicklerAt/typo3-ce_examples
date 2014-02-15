<?php

class Tx_CeExamples_Controller_ContentElementController extends Tx_Extbase_MVC_Controller_ActionController {
	
	/**
	 * EN: Method for 'CE defined with FlexForms'
	 * DE: Methode für 'CE definiert mit FlexForms'
	 *
	 * @return void
	 */
	public function flexFormsAction() {
		// EN: because all FlexForms-fields are prefixed with 'settings.' nothing has to be done here.
		// DE: Da alle FlexForms-Felder den Präfix 'settings.' erhalten haben, muss hier nichts gemacht werden.
	}
	
	public function actionNameAction() {
		$data = $this->request->getContentObjectData();
		$this->view->assign('data', $data);
	}
	
}
