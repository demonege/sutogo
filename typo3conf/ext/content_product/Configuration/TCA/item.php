<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_product_domain_model_item'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_product_domain_model_item']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'headline','price','name',
	),
	'types' => array(
		'1' => array('showitem' => ' headline,price,name,'
			),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'headline' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:press/Resources/Private/Language/locallang_db.xlf:tx_product_domain_model_item.headline',
		'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
	'price' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:press/Resources/Private/Language/locallang_db.xlf:tx_product_domain_model_item.headline',
		'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
	'name' => array(
		'exclude' => 0,
		'label' => 'LLL:EXT:press/Resources/Private/Language/locallang_db.xlf:tx_product_domain_model_item.headline',
		'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
	);
