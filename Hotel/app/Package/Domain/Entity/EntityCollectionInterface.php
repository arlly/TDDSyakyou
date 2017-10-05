<?php
namespace App\Package\Domain\Models\Entity;

interface EntityCollectionInterface
{
	/**
	 * @param EntityInterface $entity
	 */
	public function add(EntityInterface $entity);
	
	/**
	 * @return EntityInterface
	 */
	public function get();
	
	/**
	 * @param EntityInterface $entity
	 */
	public function remove(EntityInterface $entity);
}