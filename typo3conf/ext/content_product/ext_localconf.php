<?php
if (!defined('TYPO3_MODE'))
{
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Sutogo.' . $_EXTKEY,
    'Product',
    array(
        'Product' => 'index',
    ),
    // non-cacheable actions
    array(
        'Product' => '',
    ),
    'CType'
);