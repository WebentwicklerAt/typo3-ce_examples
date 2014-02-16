<?php

class Tx_CeExamples_Domain_Model_Record extends Tx_Extbase_DomainObject_AbstractEntity {
	
	/**
	 * @var string
	 */
	protected $extraField;
	
	/**
	 * Sets 'extra field'
	 *
	 * @param string $extraField
	 * @return void
	 */
	public function setExtraField() {
		$this->extraField = $extraField;
	}
	
	/**
	 * Gets 'extra field'
	 *
	 * @return string
	 */
	public function getExtraField() {
		return $this->extraField;
	}
	
	/**
	 * @var string
	 */
	protected $image;
	
	/**
	 * Sets 'image'
	 *
	 * @param array $image
	 * @return void
	 */
	public function setImage($image) {
		$this->image = implode(',', $image);
	}
	
	/**
	 * Gets 'image'
	 *
	 * @return array
	 */
	public function getImage() {
		return explode(',', $this->image);
	}
	
}
