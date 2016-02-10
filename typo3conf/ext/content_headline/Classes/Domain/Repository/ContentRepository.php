<?php

namespace Sutogo\ContentHeadline\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Repository;

class ContentRepository extends Repository
{
    public function findByPid($uid)
    {
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectSysLanguage(false);
        $query->getQuerySettings()->setRespectStoragePage(false);

        return $query->matching($query->equals('pid', $uid))->execute()->getFirst();
    }

    /**
     * @param $identifier
     * @return mixed
     */
    public function findByUidIgnoreEnableFields($identifier)
    {
        /** @var \Sutogo\ContentHeadline\Domain\Model\Content $object */
        $object = $this->persistenceManager->getObjectByIdentifier($identifier, $this->objectType);

        if (is_null($object))
        {
            $query = $this->createQuery();
            $query->getQuerySettings()->setRespectStoragePage(false);
            $query->getQuerySettings()->setRespectSysLanguage(false);
            $query->getQuerySettings()->setIgnoreEnableFields(true);

            $object = $query->matching($query->equals('uid', $identifier))->execute()->getFirst();
        }

        return $object;
    }
}