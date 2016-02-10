<?php
if (!defined('TYPO3_MODE'))
{
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Sutogo.' . $_EXTKEY,
    'Headline',
    array(
        'Headline' => 'index',
    ),
    // non-cacheable actions
    array(
        'Headline' => '',
    ),
    'CType'
);