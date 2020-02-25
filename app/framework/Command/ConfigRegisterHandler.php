<?php


namespace Framework\Command;


use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;

class ConfigRegisterHandler implements CommandInterface
{
    /**
     * @var ContainerBuilder
     */
    protected $containerBuilder;

    /**
     * ConfigRegisterHandler constructor.
     * @param ContainerBuilder $containerBuilder
     */
    public function __construct(ContainerBuilder $containerBuilder)
    {
        $this->containerBuilder = $containerBuilder;
    }

    /**
     * Выполнение команды
     */
    public function execute(): void
    {
        try {
            $fileLocator = new FileLocator(__DIR__ . '/../../' . DIRECTORY_SEPARATOR . 'config');
            $loader = new PhpFileLoader($this->containerBuilder, $fileLocator);
            $loader->load('parameters.php');
        } catch (\Throwable $e) {
            die('Cannot read the config file. File: ' . __FILE__ . '. Line: ' . __LINE__);
        }
    }

}