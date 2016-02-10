<?php

namespace Sutogo\ContentHeadline\Controller;

use Sutogo\Base\Backend\BaseActionController;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Service\FlexFormService;

class HeadlineController extends BaseActionController
{
    /**
     * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManager
     * @inject
     */
    protected $configurationManager;

    /**
     * @var \Sutogo\ContentHeadline\Domain\Repository\ContentRepository
     * @inject
     */
    protected $contentRepository;

    public function indexAction()
    {
        $data = $this->configurationManager->getContentObject()->data;

        /** @var \Sutogo\ContentHeadline\Domain\Model\Content $content */
        $content = $this->contentRepository->findByUid($data['uid']);

        $this->view->assignMultiple(
            self::getContentVariables($content, $data)
        );
    }

    /**
     * @param array $parameters
     *
     * @return string
     */
    public static function getTcaLabel($parameters)
    {
        $row = $parameters['row'];
        $titleLength = $GLOBALS['BE_USER']->uc['titleLen'];

        $val = '';

        if ($row['header'])
        {
            $val = $row['header'];
        }
        else if ($row['bodytext'])
        {
            $val = $row['bodytext'];
        }

        return substr(strip_tags($val), 0, $titleLength);
    }

    /**
     * @param array $parameters
     *
     * @return string
     */
    public static function renderBackendPreview($parameters)
    {

        $data = $parameters['row'];
        $tsConf = array();

        if (isset($parameters['tsConf']))
        {
            $tsConf = $parameters['tsConf'];
        }

        if ($data['CType'] == 'list')
        {
            if (!sizeof($tsConf))
            {
                $tsConf = self::loadPluginTS($data['pid'], $data['list_type']);
            }
        }

        /** @var \Sutogo\ContentHeadline\Domain\Model\Content $content */
        $content = GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager')
                                 ->get('\\Sutogo\\ContentHeadline\\Domain\\Repository\\ContentRepository')
                                 ->findByUidIgnoreEnableFields($data['uid']);

        return self::renderContent(
            GeneralUtility::camelCaseToLowerCaseUnderscored($tsConf['extensionName']),
            $tsConf['pluginName'],
            self::getContentVariables($content, $data)
        );
    }

    private static function getContentVariables(\Sutogo\ContentHeadline\Domain\Model\Content $content, $data)
    {
        $flexForm = $content->getPiFlexform();

        return array(
            'contentUid' => $content->getUid(),
            'header' => $content->getHeader(),
            'textAlign' => $flexForm['settings']['text_align'],
            'backgroundColor' => $flexForm['settings']['background_color'],
            'backgroundImage' => self::getFileByRelationIfExists('tt_content', 'background_image', $data),
            'backgroundStyle' => $flexForm['settings']['background_style'],
            'fontColor' => $flexForm['settings']['font_color'],
        );
    }
}