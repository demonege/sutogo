<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$plugin = new \Sutogo\Base\Backend\PluginIntegration($_EXTKEY, 'List', \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT);
$plugin->addFlexform();
$plugin->addNewContentIcon('common');

$TCA['tt_content']['ctrl']['typeicons']['products'] = 'tt_content_textpic.gif';
$TCA['tt_content']['ctrl']['typeicon_classes']['products'] = 'mimetypes-x-content-text-picture';
$TCA['tt_content']['types']['products']['showitem'] = '
    --palette--;;header,
    --div--;LLL:EXT:press/Resources/Private/Language/locallang_db.xlf:tx_press.div.plugin_settings,
    pi_flexform,
     --div--;LLL:EXT:base/Resources/Private/Language/locallang_db.xlf:tx_base.tca.div.accessibility,
     --palette--;LLL:EXT:base/Resources/Private/Language/locallang_db.xlf:tx_base.tca.palette.accessibility;content_accessibility,
     tx_base_accessability_text,
     --div--;LLL:EXT:base/Resources/Private/Language/locallang_db.xlf:tx_base.tca.div.ce,
     --palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.general;general,
';