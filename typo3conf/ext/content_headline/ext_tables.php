<?php
if (!defined('TYPO3_MODE'))
{
    die('Access denied.');
}

$plugin = new \Sutogo\Base\Backend\PluginIntegration($_EXTKEY, 'Headline', 'CType');

//$plugin = new \Sutogo\ContentHeadline\Domain\Utils\PluginIntegration($_EXTKEY, 'Headline', 'CType');
$plugin->addFlexform();
$plugin->registerBackendPreview(
    array(
        '\Sutogo\ContentHeadline\Controller\HeadlineController', 'renderBackendPreview'
    )
);
$plugin->addNewContentIcon('common');

$TCA['tt_content']['ctrl']['typeicons']['contentheadline_headline'] = 'tt_content_textpic.gif';
$TCA['tt_content']['ctrl']['typeicon_classes']['contentheadline_headline'] = 'mimetypes-x-content-text-picture';

/**
 * Configuration of the displayed order of fields in TCEforms.
 *
 * The whole string is divided by tokens according to a - unfortunately - complex ruleset.
 * #1: Overall the value is divided by a "comma" ( , ). Each part represents the configuration for a single field.
 * #2: Each of the field configurations is further divided by a semi- colon ( ; ). Each part of this division has a special significance.
 *
 * Part 1: Field name reference ( Required! )
 * Part 2: Alternative field label (string or LLL reference)
 * Part 3: Palette number (referring to an entry in the "palettes" section).
 * Part 4: (Deprecated since TYPO3 7.3) Special configuration (split by colon ( : )). This was moved to columnsOverrides as defaultExtras
 *
 * @see https://docs.typo3.org/typo3cms/TCAReference/singlehtml/Index.html#showitem
 */
$TCA['tt_content']['types']['contentheadline_headline']['showitem'] = '
     --div--;LLL:EXT:content_headline/Resources/Private/Language/locallang_db.xlf:tx_contentheadline.tca.div.header,
         header,
     --div--;LLL:EXT:content_headline/Resources/Private/Language/locallang_db.xlf:tx_contentheadline.tca.div.settings,
        pi_flexform,
     --div--;LLL:EXT:base/Resources/Private/Language/locallang_db.xlf:tx_base.tca.div.ce,
        --palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.general;general,
';

$TCA['tt_content']['columns']['header']['config']['eval'] = 'required';