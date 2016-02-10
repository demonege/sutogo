<?php

namespace Sutogo\ContentProduct\Domain\Repository;

class ItemRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

	public function initializeObject()
    {
        $querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Typo3QuerySettings');
        $querySettings->setRespectStoragePage(false);
        $this->setDefaultQuerySettings($querySettings);
    }

	/**
     * @return QueryResultInterface|array
     */
    public function findPageItemsForFilterSelection($filter, $pager)
    {
        $sqlPartFromAndWhere = $this->buildSqlParts($filter);

        $query = $this->createQuery();

        $sql = '
            SELECT name,price,headline, FROM tx_product_domain_model_item
            GROUP BY tx_press_domain_model_item.uid
            ORDER BY tx_press_domain_model_item.date DESC
        	';

        $statement = $query->statement($sql);
        $array = $statement->execute()->toArray();


        return $array;
    }
}