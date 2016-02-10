<?php
$TYPO3_CONF_VARS['EXTCONF']['realurl']['_DEFAULT'] = array(
        'preVars' => array(
            array(
                'GETvar' => 'L',
                'valueMap' => array(
                    'de' => '4',
                ),
                'noMatch' => 'bypass',
            ),
       ),
       'fileName' => array (
           'index' => array(
               'page.html' => array(
                   'keyValues' => array (
                       'type' => 1,
                   )
               ),
               '_DEFAULT' => array(
                   'keyValues' => array(
                   )
               ),
           ),
       ),
       'postVarSets' => array(
           '_DEFAULT' => array (
               'news' => array(
                   array(
                       'GETvar' => 'tx_mininews[mode]',
                       'valueMap' => array(
                           'list' => 1,
                           'details' => 2,
                       )
                   ),
                   array(
                       'GETvar' => 'tx_mininews[showUid]',
                   ),
               ),
           ),
       ),
   );
?>