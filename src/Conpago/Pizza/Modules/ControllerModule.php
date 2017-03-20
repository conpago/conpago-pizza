<?php

	namespace Conpago\Pizza\Modules;

	use Conpago\Core\ControllerResolver;
    use Conpago\DI\IContainer;
	use Conpago\DI\IContainerBuilder;
	use Conpago\DI\IModule;
    use Conpago\Presentation\Contract\IController;
    use Conpago\Presentation\Contract\IControllerResolver;

	class ControllerModule implements IModule
	{
		public function build(IContainerBuilder $builder)
		{

			$builder
				->registerType(ControllerResolver::class)
				->asA(IControllerResolver::class);

			$builder
				->register(function (IContainer $c)
				{
					/** @var IControllerResolver $controllerResolver */
					$controllerResolver = $c->resolve(IControllerResolver::class);

					return $controllerResolver->getController();
				})
				->asA(IController::class);
		}
	}
