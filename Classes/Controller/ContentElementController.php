<?php

class Tx_CeExamples_Controller_ContentElementController extends Tx_Extbase_MVC_Controller_ActionController {
	
	/**
	 * @var Tx_CeExamples_Domain_Repository_RecordRepository
	 */
	protected $recordRepository;
	
	/**
	 * 'Tx_CeExamples_Domain_Repository_RecordRepository' injector
	 *
	 * @param Tx_CeExamples_Domain_Repository_RecordRepository $recordRepository
	 * @return void
	 */
	public function injectRecordRepository(Tx_CeExamples_Domain_Repository_RecordRepository $recordRepository) {
		$this->recordRepository = $recordRepository;
	}
	
	
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
	
	
	/**
	 * EN: Method for 'CE derived from default element'
	 * DE: Methode für 'CE abgeleitet von einem Standardelement'
	 *
	 * @return void
	 */
	public function derivedAction() {
		// EN: retrieve content object data.
		// DE: Hole Daten des Inhaltselements.
		$data = $this->request->getContentObjectData();
		
		// EN: manipulate data - 'image' is stored as comma-separated string but array is required.
		// DE: Manipuliere Daten - 'image' ist als kommaseparierter String gespeichert, allerdings wird ein Array benötigt.
		$data['image'] = explode(',', $data['image']);
		
		$this->view->assign('data', $data);
	}
	
	
	/**
	 * EN: Method for 'CE referencing data from another table'
	 * DE: Methode für 'CE referenziert Daten aus einer anderen Tabelle'
	 *
	 * @return void
	 */
	public function inlineAction() {
		// EN: retrieve content object data.
		// DE: Hole Daten des Inhaltselements.
		$data = $this->request->getContentObjectData();
		
		// EN: manipulate data - 'record_reference' is stored as comma-separated string but records are required.
		// DE: Manipuliere Daten - 'record_reference' ist als kommaseparierter String gespeichert, allerdings werden Records benötigt.
		$records = $this->recordRepository->findByUids(explode(',', $data['record_reference']));
		
		$this->view->assign('data', $data);
		$this->view->assign('records', $records);
	}
	
}
