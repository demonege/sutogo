<?php

namespace Sutogo\ContentProduct\Domain\Model;

class Item extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
	/*
	 * @var String
	 */
	protected $headline = '';

	/*
	 * @var String
	 */
	protected $name = '';

	/*
	 * @var String
	 */
	protected $price = '';



	public function setHeadline($headline)
	{
		$this->headline = $headline;
	}

	public function getHeadline()
	{
		return $this->headline;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setPrice($price)
	{
		$this->price = $price;
	}

	public function getPrice()
	{
		return $this->price;
	}
}