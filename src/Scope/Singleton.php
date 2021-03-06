<?php

declare(strict_types=1);

namespace Brick\Di\Scope;

use Brick\Di\Scope;
use Brick\Di\Definition;
use Brick\Di\Container;

/**
 * The definition will be resolved once, then the same result will be returned every time it is requested.
 */
class Singleton implements Scope
{
    /**
     * @var bool
     */
    private $resolved = false;

    /**
     * @var mixed
     */
    private $result;

    /**
     * {@inheritdoc}
     */
    public function get(Definition $definition, Container $container)
    {
        if (! $this->resolved) {
            $this->result   = $definition->resolve($container);
            $this->resolved = true;
        }

        return $this->result;
    }
}
