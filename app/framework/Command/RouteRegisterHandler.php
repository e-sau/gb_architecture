<?php


namespace Framework\Command;


use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Routing\RouteCollection;

class RouteRegisterHandler implements CommandInterface
{
    /**
     * @var ContainerBuilder
     */
    protected $containerBuilder;

    /**
     * @var RouteCollection
     */
    protected $routeCollection;

    /**
     * RouteRegisterHandler constructor.
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
        $this->routeCollection = require __DIR__ . DIRECTORY_SEPARATOR . '/../../' . 'config' . DIRECTORY_SEPARATOR . 'routing.php';
        $this->containerBuilder->set('route_collection', $this->routeCollection);
    }

    /**
     * @return RouteCollection
     */
    public function getRouteCollection(): RouteCollection
    {
        return $this->routeCollection;
    }
}