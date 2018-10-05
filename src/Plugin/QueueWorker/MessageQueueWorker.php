<?php

namespace Drupal\queue_manager\Plugin\QueueWorker;

use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Queue\QueueWorkerBase;
use Drupal\dispatcher\DispatchManagerInterface;
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
  protected $dispatchManager;
  public function __construct(DispatchManagerInterface $dispatchManager){
    $this->dispatchManager = $dispatchManager;
  }
  public function processItem($data) {
    $this->dispatchManager->sendMessage($data['message'], $data['number']);
  }
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $container->get('dispatch.manager')
    );
  }
}