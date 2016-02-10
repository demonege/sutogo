<?php

namespace Sutogo\Base\Backend;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Service\FlexFormService;

class BaseActionController extends ActionController
{
    /**
     * @param array $parameters
     *
     * @return string
     */
    public static function renderBackendPreview($parameters)
    {
        $row = $parameters['row'];

        $tsConf = array();

        if (isset($parameters['tsConf']))
        {
            $tsConf = $parameters['tsConf'];
        }

        $flexFormService = new FlexFormService();
        $flexForm = $flexFormService->convertFlexFormContentToArray($row['pi_flexform']);

        if ($row['CType'] == 'list')
        {
            if (!sizeof($tsConf))
            {
                $tsConf = self::loadPluginTS($row['pid'], $row['list_type']);
            }
        }

        return self::renderContent(
            GeneralUtility::camelCaseToLowerCaseUnderscored($tsConf['extensionName']),
            $tsConf['pluginName'],
            array(
                'flexform' => $flexForm,
                'row' => $row,
            )
        );
    }

    /**
     * @param $extensionName
     * @param $templateName
     * @param array $variables
     *
     * @return string
     */
    protected static function renderContent($extensionName, $templateName, array $variables = array())
    {
        /** @var \TYPO3\CMS\Extbase\Object\ObjectManager $objectManager */
        $objectManager = GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');

        /** @var \TYPO3\CMS\Fluid\View\StandaloneView $contentView */
        $contentView = $objectManager->get('TYPO3\\CMS\\Fluid\\View\\StandaloneView');

        $templateRootPath = GeneralUtility::getFileAbsFileName('EXT:' . $extensionName . '/Resources/Private/Templates/');

        $contentView->setTemplatePathAndFilename($templateRootPath . 'Backend/' . $templateName . '.html');
        $contentView->getRequest()->setControllerExtensionName($extensionName);
        $contentView->assignMultiple($variables);

        return $contentView->render();
    }

    /**
     * @param string $tableName
     * @param string $fieldName
     * @param array $row
     *
     * @return \TYPO3\CMS\Core\Resource\FileReference
     */
    protected static function findFileByRelation($tableName, $fieldName, $row)
    {
        return array_shift(self::findFilesByRelation($tableName, $fieldName, $row));
    }

    /**
     * Get file by relation and checks if file exists on the server.
     *
     * @param $tableName
     * @param $fieldName
     * @param $row
     *
     * @return null|\TYPO3\CMS\Core\Resource\FileReference FileReference object is file exists, null otherwise.
     */
    protected static function getFileByRelationIfExists($tableName, $fieldName, $row)
    {
        $image = self::findFileByRelation($tableName, $fieldName, $row);

        if ($image instanceof \TYPO3\CMS\Core\Resource\FileReference
            && $image->getOriginalFile()->exists() === false)
        {
            $image = null;
        }

        return $image;
    }

    /**
     * @param string $tableName
     * @param string $fieldName
     * @param array $row
     *
     * @return array
     */
    protected static function findFilesByRelation($tableName, $fieldName, $row)
    {
        /** @var \TYPO3\CMS\Extbase\Object\ObjectManager $objectManager */
        $objectManager = GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');

        /** @var \TYPO3\CMS\Core\Resource\FileRepository $fileRepository */
        $fileRepository = $objectManager->get('\\TYPO3\\CMS\\Core\\Resource\\FileRepository');

        $referenceUids = array();
        $uid = $row['uid'];
        $itemList = array();

        $references = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows(
            'uid',
            'sys_file_reference',
            'tablenames=' . $GLOBALS['TYPO3_DB']->fullQuoteStr($tableName, 'sys_file_reference') .
            ' AND uid_foreign=' . (int)$uid .
            ' AND fieldname=' . $GLOBALS['TYPO3_DB']->fullQuoteStr($fieldName, 'sys_file_reference') .
            ' AND hidden=0' .
            ' AND deleted=0',
            '',
            'sorting_foreign',
            '',
            'uid'
        );

        if (!empty($references))
        {
            $referenceUids = array_keys($references);
        }

        foreach ($referenceUids as $referenceUid)
        {
            try
            {
                // Just passing the reference uid, the factory is doing workspace
                // overlays automatically depending on the current environment

                $fileRef = $fileRepository->findFileReferenceByUid((int)$referenceUid);

                if ($fileRef)
                {
                    $itemList[] = $fileRef;
                }
            }
            catch (\InvalidArgumentException $exception)
            {
                // No handling, just omit the invalid reference uid
            }
        }

        return $itemList;
    }

    /**
     * @param integer $pageId
     * @param string $listType
     *
     * @return string
     */
    protected static function loadPluginTS($pageId, $listType)
    {
        /** @var \TYPO3\CMS\Frontend\Page\PageRepository $pageRepository */
        $pageRepository = GeneralUtility::makeInstance('TYPO3\\CMS\\Frontend\\Page\\PageRepository');

        $rootLine = $pageRepository->getRootLine($pageId);

        /** @var \TYPO3\CMS\Core\TypoScript\ExtendedTemplateService $templateService */
        $templateService = GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\TypoScript\\ExtendedTemplateService');
        $templateService->tt_track = 0;
        $templateService->init();
        $templateService->runThroughTemplates($rootLine);
        $templateService->generateConfig();

        $var = $templateService->setup['tt_content.']['list.']['20.'][$listType . '.'];

        return isset($var) ? $var : '';
    }
}