<?php
/*
 * This file is part of the OpxCore.
 *
 * Copyright (c) Lozovoy Vyacheslav <opxcore@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace OpxCore\App\Interfaces;

use OpxCore\Config\Interfaces\ConfigInterface;
use OpxCore\Container\Interfaces\ContainerInterface;
use Psr\Log\LoggerInterface;

interface AppInterface
{
    /**
     * Get container registered in application.
     *
     * @return  ContainerInterface|null
     */
    public function container(): ?ContainerInterface;

    /**
     * Get absolute path related to project root.
     *
     * @param string|null $to
     *
     * @return  string
     */
    public function path($to = null): string;

    /**
     * Get application config.
     *
     * @return  ConfigInterface
     */
    public function config(): ConfigInterface;

    /**
     * Get logger.
     *
     * @return  LoggerInterface
     */
    public function logger(): LoggerInterface;
}