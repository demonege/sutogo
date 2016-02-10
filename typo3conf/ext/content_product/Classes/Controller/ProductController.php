<?php

namespace Sutogo\ContentProduct\Controller;

use Sutogo\Base\Backend\BaseActionController;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Service\FlexFormService;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

class ProductController extends BaseActionController
{
     /**
     * itemRepository
     *
     * @var \Sutogo\ContentProduct\\Domain\Repository\ItemRepository
     * @inject
     */
	protected $itemRepository = NULL;

	public static function renderBackendPreview($parameters)
    {
        $row = $parameters['row'];

        if (isset($parameters['tsConf']))
        {
            $tsConf = $parameters['tsConf'];
        }
        else
        {
            $tsConf = array();
        }

         $flexFormService = new FlexFormService();
         $flexForm = $flexFormService->convertFlexFormContentToArray($row['pi_flexform']);


        $pluginName = $tsConf['pluginName'];
        $extensionName = $tsConf['extensionName'];
        $extensionNameUnderscored = GeneralUtility::camelCaseToLowerCaseUnderscored($extensionName);


        $variables = array(
            'data' => $row,
            'settings' => $flexForm['settings']
        );

        $templateName = $pluginName;

        $preview = self::renderContent($extensionNameUnderscored, $templateName, $variables);

        return $preview;
    }

	public function showAction()
	{
		$itemsPage = $this->itemRepository->findPageItemsForFilterSelection();
		$this->view->assign('products', $itemsPage);
	}

}