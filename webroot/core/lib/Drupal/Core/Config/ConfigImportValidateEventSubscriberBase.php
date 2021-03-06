<?php

/**
 * @file
 * Contains \Drupal\Core\Config\ConfigImportValidateEventSubscriberBase.
 */

namespace Drupal\Core\Config;

use Drupal\Core\StringTranslation\StringTranslationTrait;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Defines a base event listener implementation for config sync validation.
 */
abstract class ConfigImportValidateEventSubscriberBase implements EventSubscriberInterface {
  use StringTranslationTrait;

  /**
   * Checks that the configuration synchronization is valid.
   *
   * @param ConfigImporterEvent $event
   *   The config import event.
   */
  abstract public function onConfigImporterValidate(ConfigImporterEvent $event);

  /**
   * {@inheritdoc}
   */
  static function getSubscribedEvents() {
    $events[ConfigEvents::IMPORT_VALIDATE][] = array('onConfigImporterValidate', 20);
    return $events;
  }

}
