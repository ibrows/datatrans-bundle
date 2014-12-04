<?php

namespace Ibrows\DataTransBundle\Tests;

use Ibrows\DataTransBundle\Tests\Application\AppKernel;
use Symfony\Component\Debug\Debug;

class DependencyInjectionTest extends \PHPUnit_Framework_TestCase
{
    public static function setUpBeforeClass()
    {
        Debug::enable();
    }

    public function testServices()
    {
        $kernel = new AppKernel('dev', true);
        $kernel->boot();

        $container = $kernel->getContainer();

        $logger = $container->get('ibrows.datatrans.service.logger');
        $this->assertInstanceOf('Psr\Log\NullLogger', $logger);

        $validator = $container->get('ibrows.datatrans.service.validator');
        $this->assertInstanceOf('Symfony\Component\Validator\Validator\ValidatorInterface', $validator);

        $request = $container->get('ibrows.datatrans.service.errorhandler');
        $this->assertInstanceOf('Ibrows\DataTrans\Error\ErrorHandler', $request);

        $serializer = $container->get('ibrows.datatrans.service.serializer');
        $this->assertInstanceOf('Ibrows\DataTrans\Serializer\Serializer', $serializer);

        $authorization = $container->get('ibrows.datatrans.service.authorization');
        $this->assertInstanceOf('Ibrows\DataTrans\Api\Authorization\Authorization', $authorization);
    }
}
