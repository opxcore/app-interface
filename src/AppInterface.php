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
use OpxCore\Container\Interfaces\ContainerExceptionInterface;
use OpxCore\Container\Interfaces\ContainerInterface;
use OpxCore\Container\Interfaces\NotFoundExceptionInterface;
use OpxCore\Log\Interfaces\LogManagerInterface;
use OpxCore\Profiler\Interfaces\ProfilerInterface;

interface AppInterface
{
    /**
     * Output modes to inform subcomponents which output mode to use.
     */
    public const APP_OUTPUT_HTTP = 0;
    public const APP_OUTPUT_CONSOLE = 1;
    public const APP_OUTPUT_JSON = 2;
    public const APP_OUTPUT_XML = 3;
    public const APP_OUTPUT_SOAP = 4;

    /**
     * Get container registered in application.
     *
     * @return  ContainerInterface
     */
    public function container(): ContainerInterface;

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
     * @return  LogManagerInterface
     */
    public function log(): LogManagerInterface;

    /**
     * Get profiler proxy with assigned profiler (or not assigned).
     *
     * @return  ProfilerInterface
     */
    public function profiler(): ProfilerInterface;

    /**
     * Initialize application dependencies.
     *
     * @return  void
     *
     * @throws  ContainerExceptionInterface
     * @throws  NotFoundExceptionInterface
     */
    public function init(): void;

    /**
     * Bootstrap application.
     * If null passed to $bootstrappers no bootstrapper would be processed.
     * Default `bootstrappers` or other string value would be used as key
     * to get bootstrappers list  from application config.
     * If array passed, it will be used as array of bootstrappers.
     *
     * @param string|array|null $bootstrappers
     *
     * @return  void
     */
    public function bootstrap($bootstrappers = 'bootstrappers'): void;

    /**
     * Get application output mode is to be used.
     *
     * @param int|null $mode Mode to be set.
     *
     * @return  int
     */
    public function outputMode(?int $mode = null): int;

    /**
     * Weaver the application is in debug mode.
     *
     * @return  bool
     */
    public function isDebugMode(): bool;
}