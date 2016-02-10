<?php
namespace Sutogo\Base\Backend;

class PluginIntegration
{
    /**
     * @var string
     */
    protected $extensionKey = '';

    /**
     * @var string
     */
    protected $pluginSignature = '';

    /**
     * @var string
     */
    protected $pluginIdentifier = '';

    /**
     * @var string
     */
    protected $iconPath = '';

    /**
     * @var mixed
     */
    protected $infoSelector = null;

    /**
     * @var \TYPO3\CMS\Extbase\Service\FlexFormService
     */
    protected $flexFormService;

    /**
     * Constructor
     *
     * @param string $extensionKey
     * @param string $pluginIdentifier
     * @param string $iconFile
     */
    public function __construct($extensionKey, $pluginIdentifier, $pluginType = 'list', $iconFile = '')
    {
        $this->extensionKey = $extensionKey;
        $this->pluginIdentifier = $pluginIdentifier;
        $this->pluginType = $pluginType;

        $extensionName = \TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($this->extensionKey);

        $this->pluginSignature = \TYPO3\CMS\Core\Utility\GeneralUtility::strtolower($extensionName)
                                 . '_'
                                 . \TYPO3\CMS\Core\Utility\GeneralUtility::strtolower($this->pluginIdentifier);

        $langKey = $this->extensionKey
                   . '/Resources/Private/Language/locallang_backend.xlf:'
                   . $this->pluginSignature
                   . '.title';
        $title = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('LLL:EXT:' . $langKey, $this->extensionKey);
        if (!$title)
        {
            $title = $this->pluginIdentifier . '.title';
        }

        $this->title = $title;

        // no icon file
        if ($iconFile === '')
        {
            $this->iconPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($this->extensionKey) . 'ext_icon.gif';
        }
        // only file name => use typo3 skin icons (/htdocs/typo3/sysext/t3skin/icons/gfx/i/$iconFile)
        else if (pathinfo($iconFile, PATHINFO_DIRNAME) === '.')
        {
            $this->iconPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('t3skin') . 'icons/gfx/i/' . $iconFile;
        }
        // complete path => use path
        else
        {
            $this->iconPath = $iconFile;
        }

        \TYPO3\CMS\Core\Utility\GeneralUtility::loadTCA('tt_content');

        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$this->pluginSignature] = 'layout,recursive,select_key,pages';

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Sutogo.' . $extensionName,
            $this->pluginIdentifier,
            $this->title,
            $this->iconPath
        );
    }

    /**
     * Add flexform
     *
     * The name of the xml file must be same as the plugin identifier
     * and the file is intended to be located in 'Resources/Private/Flexform' directory
     *
     */
    public function addFlexform()
    {
        $file = 'FILE:EXT:' . $this->extensionKey . '/Configuration/Flexforms/' . $this->pluginIdentifier . '.xml';

        if ($this->pluginType == 'list')
        {
            $piKeyToMatch = $this->pluginSignature;
            $CTypeToMatch = 'list';
            $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$this->pluginSignature] = 'pi_flexform';
        }
        else
        {
            $piKeyToMatch = '';
            $CTypeToMatch = $this->pluginSignature;
            $tcaTypesStandard = $GLOBALS['TCA']['tt_content']['types'][1];
            $GLOBALS['TCA']['tt_content']['types'][$this->pluginSignature] = str_replace('CType,', 'CType, pi_flexform, ', $tcaTypesStandard);
        }

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($piKeyToMatch, $file, $CTypeToMatch);

    }

    /**
     * Add new content icon
     *
     */
    public function addNewContentIcon($tab)
    {
        $extKey = $this->extensionKey;
        $plugin = $this->pluginIdentifier;
        $pluginHyphen = str_replace('_', '-', \TYPO3\CMS\Core\Utility\GeneralUtility::camelCaseToLowerCaseUnderscored($plugin));
        $pluginSignature = $this->pluginSignature;
        $title = $this->title;

        if ($this->pluginType == 'list')
        {
            $CType = 'list';
            $list_type = $pluginSignature;
        }
        else
        {
            $CType = $pluginSignature;
            $list_type = '';
        }

        $langKey = $this->extensionKey
                   . '/Resources/Private/Language/locallang_backend.xlf:'
                   . $pluginSignature
                   . '.description';
        $description = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('LLL:EXT:' . $langKey, $this->extensionKey);
        if (!$description)
        {
            $description = $langKey;
        }

        $header = '';
        $predefinedTabs = array('common', 'special', 'forms', 'plugins');
        if (!in_array($tab, $predefinedTabs))
        {

            $langKey = 'base/Resources/Private/Language/locallang_db.xlf:wizard.tabs.' . $tab;
            $headerLang = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('LLL:EXT:' . $langKey, $this->extensionKey);
            if ($headerLang)
            {
                $header = 'header = ' . $headerLang;
            }
            else
            {
                $header = 'header = ' . $langKey;
            }

        }

        $addToList = '';
        if ($tab != 'plugins')
        {
            $addToList = "show := addToList($plugin)";
        }

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig("
            mod.wizards.newContentElement {
                renderMode = tabs
                wizardItems {
                    $tab {
                        $header
                        elements {
                            $plugin {
                                icon = ../typo3conf/ext/$extKey/Resources/Public/Icons/wizard-$pluginHyphen.gif
                                title = $title
                                description = $description
                                tt_content_defValues.CType = $CType
                                tt_content_defValues.list_type = $list_type
                            }
                        }
                        $addToList
                    }
                 }
            }
            ");
    }

    /**
     * @param \TYPO3\CMS\Extbase\Service\FlexFormService $flexFormService
     *
     * @return void
     */
    public function injectFlexFormService(\TYPO3\CMS\Extbase\Service\FlexFormService $flexFormService)
    {
        $this->flexFormService = $flexFormService;
    }

    /**
     * Get new content icon
     *
     * (callback method inside typo3)
     *
     * @param array $wizardElements
     * @param string $iconPath
     * @param string $title
     * @param string $description
     *
     * @return array
     */
    public function getNewContentIcon($wizardElements, $iconPath, $title, $description)
    {
        $wizardElements['plugins_' . $this->pluginSignature] = array(
            'icon' => $iconPath,
            'title' => $title,
            'description' => $description,
            'params' => '&defVals[tt_content][CType]=list&defVals[tt_content][list_type]=' . $this->pluginSignature
        );

        return $wizardElements;
    }

    /**
     * Register rendering of previre in backend
     *
     * @global array $TYPO3_CONF_VARS
     * @global array $T3_VAR
     *
     * @param string|array|Closure $infoSelector
     */
    public function registerBackendPreview($infoSelector)
    {
        global $TYPO3_CONF_VARS, $T3_VAR;

        $this->infoSelector = $infoSelector;

        $funcName = get_class($this) . '->renderBackendPreview(' . $this->pluginSignature . ')';

        $T3_VAR['callUserFunction'][$funcName] = array(
            'obj' => $this,
            'method' => 'renderBackendPreview'
        );

        if ($this->pluginType == 'list')
        {
            $TYPO3_CONF_VARS['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['list_type_Info'][$this->pluginSignature][] = $funcName;
        }
    }

    /**
     * Get list type info
     *
     * (callback method inside typo3)
     *
     * @param array $parameters
     * @param \TYPO3\CMS\Backend\View\PageLayoutView $pageLayout
     *
     * @return string
     */
    public function renderBackendPreview($parameters,
                                         \TYPO3\CMS\Backend\View\PageLayoutView $pageLayout)
    {

        //\TYPO3\CMS\Core\Utility\DebugUtility::debug($this->infoSelector);

        switch (true)
        {
            // field name in row
            case is_string($this->infoSelector):
                $info = $parameters['row'][$this->infoSelector];
                break;

            // user function
            case is_array($this->infoSelector):
                $info = call_user_func_array($this->infoSelector, array($parameters));
                break;
        }

        if (!$info)
        {
            $info = '&nbsp;';
        }

        return $info;
    }
}