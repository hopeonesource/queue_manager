<?php

namespace Drupal\hos_queue_manager;

/**
 * Interface QueueManagerInterface.
 */
interface QueueManagerInterface {

  /**
   * Adds a message to a queue
   *
   * @param $message
   *  Message body
   * @param $number
   *  Receipient mobile number
   *
   */
  public function queueMessage($message, $number);
}
