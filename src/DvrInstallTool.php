<?php

/**
 * @file
 * Contains Drupal\dvr_profile\DvrInstallTool.
 */

namespace Drupal\dvr_profile;

use Drupal\Core\Config\ConfigException;
use Drupal\Core\Config\ConfigImporter;
use Drupal\Core\Config\FileStorage;
use Drupal\Core\Config\StorageComparer;

/**
 * Class GlhvInstallTool.
 *
 * @package Drupal\glhv
 */
class DvrInstallTool {

  /**
   * Sync stage config to active storage.
   */
  public static function doConfigSync() {
    $source = new FileStorage('profiles/dvr_profile/config/sync');
    $target = \Drupal::service('config.storage');
    $storage_comparer = new StorageComparer($source, $target, \Drupal::service('config.manager'));
    $storage_comparer->createChangelist();
    $config_importer = new ConfigImporter(
      $storage_comparer,
      \Drupal::service('event_dispatcher'),
      \Drupal::service('config.manager'),
      \Drupal::lock(),
      \Drupal::service('config.typed'),
      \Drupal::moduleHandler(),
      \Drupal::service('module_installer'),
      \Drupal::service('theme_handler'),
      \Drupal::service('string_translation')
    );
    if ($config_importer->alreadyImporting()) {
      // Error.
    }
    else {
      try {
        $config_importer->import();
        drupal_flush_all_caches();
      }
      catch (ConfigException $e) {
        // Error.
        print_r($e->getMessage());
      }
    }
  }

  /**
   * Set the UUID of this site.
   *
   * @param string $uuid
   *   The UUID to set for this site.
   */
  public static function setUuid($uuid) {
    \Drupal::configFactory()
      ->getEditable('system.site')
      ->set('uuid', $uuid)
      ->save(TRUE);
  }

}
