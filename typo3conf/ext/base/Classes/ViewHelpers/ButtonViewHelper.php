<?php

namespace Sutogo\Base\ViewHelpers;

use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper;

class ButtonViewHelper extends AbstractTagBasedViewHelper
{
    protected $tagName = 'button';

    public function initializeArguments()
    {
        $this->registerUniversalTagAttributes();
        $this->registerArgument('type', 'string', 'Button type.', false);
        $this->registerArgument('label', 'string', 'Label and title for the button.', true);
        $this->registerTagAttribute('nb-component', 'string', 'Javascript component name.', false);
    }

    public function render()
    {
        $this->tag->addAttribute('title', $this->arguments['label']);

        $this->tag->addAttribute('type', $this->hasArgument('type') ? $this->arguments['type'] : 'button');

        $this->tag->setContent('<span class="title">' . $this->arguments['label'] . '</span>');

        return $this->tag->render();
    }
}
