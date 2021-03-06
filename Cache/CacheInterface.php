<?php

    /**
     * PHY/CacheBundle
     * LICENSE
     * This source file is subject to the Open Software License (OSL 3.0)
     * that is bundled with this package in the file LICENSE.txt.
     * It is also available through the world-wide-web at this URL:
     * http://opensource.org/licenses/osl-3.0.php
     * If you did not receive a copy of the license and are unable to
     * obtain it through the world-wide-web, please send an email
     * to john@jo.mu so I can send you a copy immediately.
     */

    namespace PHY\CacheBundle\Cache;

    /**
     * Interface for all Cache storing classes.
     *
     * @package PHY\CacheBundle\Cache\CacheInterface
     * @category PHY\CacheBundle
     * @copyright Copyright (c) 2013 John Mullanaphy (http://jo.mu/)
     * @license http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
     * @author John Mullanaphy <john@jo.mu>
     */
    interface CacheInterface
    {

        /**
         * Initiate a Cache.
         *
         * @param array $settings
         */
        public function __construct(array $settings = array());

        /**
         * Decrement a node by $decrement.
         *
         * @param array|string $node
         * @param int $decrement
         * @return bool
         */
        public function decrement($node, $decrement = 1);

        /**
         * Delete node(s)
         *
         * @param array|string $node
         * @param int $timeout When to delete this node.
         * @return bool
         */
        public function delete($node, $timeout = 0);

        /**
         * Flush out all keys.
         *
         * @return bool
         */
        public function flush();

        /**
         * Grab a node if it exists.
         *
         * @param array|string $node
         * @param int $flag
         * @return mixed
         */
        public function get($node, $flag = 0);

        /**
         * Increment a node by $increment.
         *
         * @param array|string $node
         * @param int $increment
         * @return bool
         */
        public function increment($node, $increment = 1);

        /**
         * Replace a node with new data. WARNING: No fault tolerance built in.
         *
         * @param array|string $node
         * @param mixed $value If $node is an array, ignore.
         * @param int $flag
         * @param int $expiration
         * @return bool
         */
        public function replace($node, $value = null, $expiration = 0, $flag = 0);

        /**
         * Store a new key into the memory table.
         *
         * @param array|string $node
         * @param mixed $value If $node is an array, ignore.
         * @param int $flag
         * @param int $expiration
         * @return bool
         */
        public function set($node, $value = null, $expiration = 0, $flag = 0);

        /**
         * Grab any stats we can pertaining to our caching.
         *
         * @return array
         */
        public function getStats();

        /**
         * Get a name for our cache client.
         *
         * @return string
         */
        public function getName();

        /**
         * Grab our internal instance if the class has it.
         *
         * @return mixed
         */
        public function getInstance();
    }
