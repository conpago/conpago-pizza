<?php

	namespace Conpago\Pizza\Modules;

	use Conpago\Core\RequestDataReader;
    use Conpago\DI\IContainerBuilder;
	use Conpago\DI\IModule;
    use Conpago\Helpers\Contract\IRequest;
    use Conpago\Helpers\Contract\IRequestDataReader;
    use Conpago\Helpers\Contract\IRequestParser;
    use Conpago\Helpers\Request;
    use Conpago\Helpers\RequestParser;

    class RequestModule implements IModule
	{
		public function build(IContainerBuilder $builder)
		{
			$builder
				->registerType(Request::class)
				->asA(IRequest::class);

			$builder
				->registerType(RequestParser::class)
				->asA(IRequestParser::class);

			$builder
				->registerType(RequestDataReader::class)
				->asA(IRequestDataReader::class)
				->singleInstance();
		}
	}