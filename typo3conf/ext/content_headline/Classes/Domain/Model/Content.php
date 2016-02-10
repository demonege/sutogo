<?php

namespace Sutogo\ContentHeadline\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Content extends AbstractEntity
{
    /**
     * @var \TYPO3\CMS\Extbase\Service\FlexFormService
     * @inject
     */
    protected $flexFormService;

    /**
     * @var \string
     */
    protected $header;

    /**
     * @var \string
     */
    protected $piFlexform;

    /**
     * @param string $header
     */
    public function setHeader($header)
    {
        $this->header = $header;
    }

    /**
     * @return string
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @return array
     */
    public function getPiFlexform()
    {
        return $this->flexFormService->convertFlexFormContentToArray($this->piFlexform);
    }
}