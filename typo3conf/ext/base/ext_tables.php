<?php
if (!defined('TYPO3_MODE'))
{
    die ('Access denied.');
}

// new common palette for custom elements
$TCA['tt_content']['palettes']['content_accessibility'] = array(
    'showitem' => 'hidden, starttime, endtime',
    'canNotCollapse' => true,
    'isHiddenPalette' => false
);

// create label for custom CEs;
$TCA['tt_content']['ctrl']['label_userFunc'] = '\\Sutogo\\Base\\Utility\\TcaTtContentHelper->getLabel';

// only display fields "title" and "alternative text" for uploaded images
$TCA['sys_file_reference']['palettes']['imageoverlayPalette']['showitem'] = 'title,alternative;;;;3-3-3';
