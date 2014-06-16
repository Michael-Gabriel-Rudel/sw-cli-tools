<?php

namespace Shopware\RunCli;

use Shopware\RunCli\Command\RunCliCommand;
use ShopwareCli\Application\ConsoleAwarePlugin;
use ShopwareCli\Application\ContainerAwarePlugin;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class Bootstrap implements ContainerAwarePlugin, ConsoleAwarePlugin
{
    protected $container;

    public function setContainer(ContainerBuilder $container)
    {
        $this->container = $container;
    }

    /**
     * Return an array with instances of your console commands here
     *
     * @return mixed
     */
    public function getConsoleCommands()
    {
        return array(
            new RunCliCommand()
        );
    }
}