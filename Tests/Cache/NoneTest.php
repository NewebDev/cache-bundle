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

    namespace PHY\CacheBundle\Tests\Cache;

    use PHY\CacheBundle\Cache\None;
    use PHY\CacheBundle\Tests\CacheTestAbstract;

    /**
     * Test our None class.
     *
     * @package PHY\CacheBundle\Tests\Cache\NoneTest
     * @category PHY\CacheBundle
     * @copyright Copyright (c) 2013 John Mullanaphy (http://jo.mu/)
     * @license http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
     * @author John Mullanaphy <john@jo.mu>
     */
    class NoneTest extends CacheTestAbstract
    {

        /**
         * Return a None class.
         *
         * @return None
         */
        public function getCache()
        {
            return new None;
        }

        /**
         * Test our name is correct.
         */
        public function testServiceOrName()
        {
            $cache = $this->getCache();
            $this->assertEquals('None', $cache->getName());
        }

        /**
         * Test our basic set/get.
         */
        public function testSetAndGet()
        {
            $cache = $this->getCache();
            $cache->set('a', 123);
            $this->assertFalse($cache->get('a'));
        }

        /**
         * Test a multi set and make sure we get the goods back.
         */
        public function testSetMultiAndGet()
        {
            $cache = $this->getCache();
            $cache->set(array(
                'b' => 123,
                'c' => 1234
            ));
            $this->assertFalse($cache->get('b'));
            $this->assertFalse($cache->get('c'));
        }

        /**
         * Make sure we get back a null for missing keys.
         */
        public function testGetDoesntExists()
        {
            $cache = $this->getCache();
            $this->assertFalse($cache->get('false'));
        }

        /**
         * Test getting multiple keys back.
         */
        public function testGetMulti()
        {
            $cache = $this->getCache();
            $cache->set(array(
                'd' => 123,
                'e' => 1234
            ));
            $this->assertEquals(array(
                'd' => false,
                'e' => false
            ), $cache->get(array('d', 'e')));
        }

        /**
         * Test a replace.
         */
        public function testReplace()
        {
            $cache = $this->getCache();
            $cache->set('f', 123);
            $cache->replace('f', 1234);
            $this->assertFalse($cache->get('f'));
        }

        /**
         * Test a replace multi.
         */
        public function testReplaceMulti()
        {
            $cache = $this->getCache();
            $cache->set('h', 123);
            $cache->set('i', 1234);
            $cache->replace(array(
                'h' => 1234,
                'i' => 12345
            ));
            $this->assertEquals(array(
                'h' => false,
                'i' => false
            ), $cache->get(array('h', 'i')));
        }

        /**
         * Test a decrement.
         */
        public function testDecrement()
        {
            $cache = $this->getCache();
            $cache->set('j', 3);
            $cache->decrement('j');
            $this->assertFalse($cache->get('j'));
        }

        /**
         * Test a decrement by number.
         */
        public function testDecrementByNumber()
        {
            $cache = $this->getCache();
            $cache->set('k', 3);
            $cache->decrement('k', 2);
            $this->assertFalse($cache->get('k'));
        }

        /**
         * Test decrementing multiple numbers.
         */
        public function testDecrementMulti()
        {
            $cache = $this->getCache();
            $cache->set('l', 3);
            $cache->set('m', 2);
            $cache->decrement(array('l', 'm'));
            $this->assertEquals(array(
                'l' => false,
                'm' => false
            ), $cache->get(array('l', 'm')));
        }
    }
