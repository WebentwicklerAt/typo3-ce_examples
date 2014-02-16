<?php

class Tx_CeExamples_Domain_Repository_RecordRepository extends Tx_Extbase_Persistence_Repository {
	
	/**
	 * Do not respect storage page because records are stored on current page
	 */
	public function initializeObject() {
		$querySettings = $this->objectManager->create('Tx_Extbase_Persistence_Typo3QuerySettings');
		
		$querySettings->setRespectStoragePage(FALSE);
		
		$this->setDefaultQuerySettings($querySettings);
	}
	
	/**
	 * Get records by uid-list
	 *
	 * @param array $uids
	 */
	public function findByUids($uids) {
		$query = $this->createQuery();
		
		$query->matching(
			$query->in('uid', $uids)
		);
		
		return $query->execute();
	}
	
}
