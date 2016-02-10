<?php

namespace Sutogo\Base\ViewHelpers;

use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

class IterablePartialViewHelper extends AbstractViewHelper
{
    /**
     * @return void
     */
    public function initializeArguments()
    {
        $this->registerArgument('elements', 'array', 'The elements to iterate over.', true);
        $this->registerArgument('as', 'string', 'The name of a single element inside this viewhelper.', true);
        $this->registerArgument('container-partial', 'string', 'The name of the partial that serves as the container for the content rendered by this viewhelper.', true);
        $this->registerArgument('container-partial-arguments', 'array', 'Arguments to inject into the loaded partial', false);
        $this->registerArgument('iteration', 'string', 'The name of the variable to store iteration information (index, cycle, isFirst, isLast, isEven, isOdd)', false);
    }

    /**
     * @return string Rendered string
     */
    public function render()
    {
        $renderChildrenClosure = $this->buildRenderChildrenClosure();
        $templateVariableContainer = $this->renderingContext->getTemplateVariableContainer();

        $elements = $this->arguments['elements'];
        $partialName = $this->arguments['container-partial'];
        $partialArgumentsArray = $this->arguments['container-partial-arguments'];

        /** @var \Netzbewegung\Base\ViewHelpers\PartialViewHelper $nbPartialViewhelper */
        $nbPartialViewhelper = $this->objectManager->get('Netzbewegung\\Base\\ViewHelpers\\PartialViewHelper');

        $renderedElements = '';

        $iterationData = array(
            'index' => 0,
            'cycle' => 1,
            'total' => count($this->arguments['elements'])
        );

        foreach ($elements as $element)
        {
            $templateVariableContainer->add($this->arguments['as'], $element);

            if ($this->arguments['iteration'] !== null)
            {
                $iterationData['isFirst'] = $iterationData['cycle'] === 1;
                $iterationData['isLast'] = $iterationData['cycle'] === $iterationData['total'];
                $iterationData['isEven'] = $iterationData['cycle'] % 2 === 0;
                $iterationData['isOdd'] = !$iterationData['isEven'];
                $templateVariableContainer->add($this->arguments['iteration'], $iterationData);
                $iterationData['index']++;
                $iterationData['cycle']++;
            }

            $renderedElements .= $renderChildrenClosure();

            $templateVariableContainer->remove($this->arguments['as']);

            if ($this->arguments['iteration'] !== null)
            {
                $templateVariableContainer->remove($this->arguments['iteration']);
            }
        }

        $nbPartialViewhelper->setArguments(array(
            'extension' => 'base',
            'partial' => $partialName,
            'arguments' => $partialArgumentsArray,
            'as' => 'content',
        ));

        $nbPartialViewhelper->setRenderingContext($this->renderingContext);

        $nbPartialViewhelper->setRenderChildrenClosure(function () use ($renderedElements)
        {
            return $renderedElements;
        });

        return $nbPartialViewhelper->render();
    }
}