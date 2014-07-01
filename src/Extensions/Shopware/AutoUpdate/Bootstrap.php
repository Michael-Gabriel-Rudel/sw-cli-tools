<?php

namespace Shopware\AutoUpdate;

use ShopwareCli\Application\ConsoleAwareExtension;

use KevinGH\Amend\Command;
use KevinGH\Amend\Helper;
use Symfony\Component\Console\Application;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides self update capability
 *
 * Class Bootstrap
 * @package Shopware\AutoUpdate
 */
class Bootstrap implements ConsoleAwareExtension, ContainerAwareInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConsoleCommands()
    {
        $command = new Command('update');
        $command->setManifestUri('http://box-project.org/manifest.json');


        return array(
            $command
        );
    }

    /**
     * Extend the helper set with the amend helper
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $container->get('helper_set')->set(new Helper());
    }


}
