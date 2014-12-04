<?php

namespace Ibrows\DataTransBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException;
use Symfony\Component\DependencyInjection\Reference;

class CompilerPass implements CompilerPassInterface
{
    /**
     * @param  ContainerBuilder  $container
     * @throws \RuntimeException
     */
    public function process(ContainerBuilder $container)
    {
        $loggerServiceId = $container->getParameter('ibrows.datatrans.serviceid.logger');

        if (!$container->hasDefinition($loggerServiceId) && !$container->hasAlias($loggerServiceId)) {
            throw new ServiceNotFoundException("There is no service with id '{$loggerServiceId}");
        }

        $validatorServiceId = $container->getParameter('ibrows.datatrans.serviceid.validator');

        if (!$container->hasDefinition($validatorServiceId) && !$container->hasAlias($validatorServiceId)) {
            throw new ServiceNotFoundException("There is no service with id '{$validatorServiceId}");
        }

        $requestDefinition = $container->getDefinition('ibrows.datatrans.service.errorhandler');
        $requestArguments = $requestDefinition->getArguments();
        $requestArguments[0] = new Reference($loggerServiceId);
        $requestDefinition->setArguments($requestArguments);

        $requestDefinition = $container->getDefinition('ibrows.datatrans.service.authorization');
        $requestArguments = $requestDefinition->getArguments();
        $requestArguments[0] = new Reference($validatorServiceId);
        $requestDefinition->setArguments($requestArguments);
    }
}
