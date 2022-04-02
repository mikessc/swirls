<?php

namespace Drupal\reserve;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Routing\LinkGeneratorTrait;
use Drupal\Core\Url;
use Drupal\Core\Link;

/**
 * Defines a class to build a listing of reservation categories.
 *
 * @ingroup reserve
 */
class ReserveCategoryListBuilder extends EntityListBuilder {


  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Reservation Category ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\reserve\Entity\ReserveCategory */
    $row['id'] = $entity->id();
    $row['name'] = Link::fromTextAndUrl(
      $entity->label(),
      new Url(
        'entity.reserve_category.edit_form', array(
          'reserve_category' => $entity->id(),
        )
      )
    )->toString();
    return $row + parent::buildRow($entity);
  }

}
