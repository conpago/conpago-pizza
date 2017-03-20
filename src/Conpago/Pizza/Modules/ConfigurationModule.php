<?php

namespace Conpago\Pizza\Modules;

use Conpago\Config\ArrayConfig;
use Conpago\Config\Contract\IAppConfig;
use Conpago\Config\Contract\IConfig;
use Conpago\Config\PhpConfigBuilder;
use Conpago\Contract\IApp;
use Conpago\Core\WebApp;
use Conpago\DI\IContainer;
use Conpago\DI\IContainerBuilder;
use Conpago\DI\IModule;
use Conpago\File\Contract\IFileSystem;
use Conpago\Helpers\AppMask;
use Conpago\Helpers\Contract\IAppMask;
use Conpago\Helpers\Contract\IResponse;
use Conpago\Helpers\Response;
use Conpago\Logging\Contract\ILoggerConfig;
use Conpago\Logging\Contract\ILoggerConfigProvider;
use Conpago\Pizza\AppConfig;
use Conpago\Pizza\LoggerConfig;
use Conpago\Pizza\LoggerConfigProvider;
use Conpago\Time\Contract\ITimeService;
use Conpago\TimeService;
use Conpago\Utils\ServerAccessor;
use Conpago\Utils\SessionAccessor;

class ConfigurationModule implements IModule {
	public function build(IContainerBuilder $builder) {

		$builder->registerType(SessionAccessor::class);
		$builder->registerType(ServerAccessor::class);

		$builder
			->registerType(AppMask::class)
			->asA(IAppMask::class);

		$builder
			->registerType(WebApp::class)
			->asA(IApp::class);

		$builder
			->register(function(IContainer $c)
			{
				/** @var IAppMask $appMask */
				$appMask = $c->resolve(IAppMask::class);
				return new ArrayConfig((new PhpConfigBuilder(
					$c->resolve(IFileSystem::class),
					$appMask->configMask()))->build()
                );
			})
			->asA(IConfig::class)
			->singleInstance();

		$builder
			->registerType(AppConfig::class)
			->asA(IAppConfig::class);

		$builder
			->registerType(TimeService::class)
			->asA(ITimeService::class);

		$builder
			->registerType(Response::class)
			->asA(IResponse::class);

		$builder
			->registerType(LoggerConfigProvider::class)
			->asA(ILoggerConfigProvider::class);

		$builder
			->registerType(LoggerConfig::class)
			->asA(ILoggerConfig::class);
	}
}