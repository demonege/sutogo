<?php
namespace Sutogo\Base\ViewHelpers;

class SoftBreakViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{
    const REPLACEMENT = '|';

    /**
     * Render the text with soft break
     *
     * @return string
     */
    public function render()
    {
        $text = $this->renderChildren();

        return str_replace(self::REPLACEMENT, '&shy;', $text);
    }
}