<?php

namespace Drupal\queue_manager\Plugin\QueueWorker;

use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Queue\QueueWorkerBase;
use Drupal\hos_sms_dispatcher\HosMessageManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 *
 * @QueueWorker(
 * id = "hos_message_queue",
 * title = @Translation("HOS message queue processor"),
 * cron = {"time" = 10}
 * )
 */
class MessageQueueWorker extends QueueWorkerBase implements ContainerFactoryPluginInterface {
  protected $hosMessageManager;
  public function __construct(HosMessageManagerInterface $hosMessageManager){
    $this->hosMessageManager = $hosMessageManager;
  }
  public function processItem($data) {
    $this->hosMessageManager->sendMessage($data['message'], $data['number']);
  }
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $container->get('hos_sms_dispatch.manager')
    );
  }
}