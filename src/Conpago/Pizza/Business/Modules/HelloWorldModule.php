<?php
	/**
	 * Created by PhpStorm.
	 * User: bartosz.golek
	 * Date: 29.10.13
	 * Time: 08:43
	 */

	namespace Conpago\Pizza\Business\Modules;

	use Conpago\DI\IContainerBuilder;
	use Conpago\DI\IModule;
    use Conpago\Pizza\Business\Contract\Interactor\IHelloWorld;
    use Conpago\Pizza\Business\Contract\Presenter\IHelloWorldPresenter;
    use Conpago\Pizza\Business\Interactor\HelloWorld;
    use Conpago\Pizza\Presentation\Contract\Controller\IHelloWorldController;
    use Conpago\Pizza\Presentation\Controller\HelloWorldController;
    use Conpago\Pizza\Presentation\Presenter\HelloWorldPresenter;
    use Conpago\Presentation\Contract\IController;

    class HelloWorldModule implements IModule
	{
        const HELLO_WORLD_CONTROLLER_KEY = 'HelloWorldController';
        const HELLO_WORLD_KEY = 'HelloWorld';

        /**
		 * @param IContainerBuilder $builder
		 *
		 * @SuppressWarnings(PHPMD.StaticAccess)
		 */
		public function build(IContainerBuilder $builder)
		{
			$builder->registerType(HelloWorldController::class)
				->asA(IController::class)
				->asA(IHelloWorldController::class)
				->keyed(self::HELLO_WORLD_CONTROLLER_KEY)
				->singleInstance();

			$builder->registerType(HelloWorld::class)
				->asA(IHelloWorld::class)
				->named(self::HELLO_WORLD_KEY)
				->singleInstance();

			$builder->registerType(HelloWorldPresenter::class)
				->asA(IHelloWorldPresenter::class)
				->singleInstance();
		}
	}