<?php

namespace Sutogo\Base\ViewHelpers;

use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

class TypolinkObjectViewHelper extends AbstractViewHelper
{
    /**
     * Returns an array with keys href, title, target and class.
     *
     * @param string $typolink
     *
     * @return array
     */
    public static function parseTypolink($typolink)
    {
        /** @var $contentObject \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer */
        $contentObject = $GLOBALS['TSFE']->cObj;

        $htmlString = $contentObject->cObjGetSingle('TEXT', array(
            'typolink.' => array(
                'parameter' => $typolink,
            )
        ));

        $attributeArray = array();

        // Grab the string of attributes inside an a tag.
        $found = preg_match('#<a\s+([^>]+(?:"|\'))\s?/?>#', $htmlString, $matches);

        if ($found == 1)
        {
            // Match attribute-name attribute-value pairs.
            $found = preg_match_all(
                '#([^\s=]+)\s*=\s*(\'[^<\']*\'|"[^<"]*")#',
                $matches[1], $matches, PREG_SET_ORDER
            );

            if ($found != 0)
            {
                // Create an associative array that matches attribute
                // names to attribute values.
                foreach ($matches as $attribute)
                {
                    $attributeArray[$attribute[1]] = substr($attribute[2], 1, -1);
                }
            }
        }

        return $attributeArray;
    }

    /**
     * @param string $typolink
     *
     * @return array
     */
    public function render($typolink)
    {
        return self::parseTypolink($typolink);
    }
}