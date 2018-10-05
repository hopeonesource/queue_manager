<?php

namespace Drupal\queue_manager;

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

  /**
   * @param integer $nodeId
   *
   * @return array
   *
   * array('message' => 'node title, array(123456789, 987654321))
   */
  public function nodeProcessor($nodeId);
}
