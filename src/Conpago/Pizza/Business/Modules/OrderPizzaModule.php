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
    use Conpago\Pizza\Business\Contract\Dao\IOrderPizzaDao;
    use Conpago\Pizza\Business\Contract\Interactor\IOrderPizza;
    use Conpago\Pizza\Business\Contract\Presenter\IOrderPizzaPresenter;
    use Conpago\Pizza\Business\Interactor\OrderPizza;
    use Conpago\Pizza\Dao\OrderPizzaDao;
    use Conpago\Pizza\Presentation\Contract\Controller\IOrderPizzaController;
    use Conpago\Pizza\Presentation\Controller\OrderPizzaController;
    use Conpago\Pizza\Presentation\Presenter\OrderPizzaPresenter;
    use Conpago\Presentation\Contract\IController;

    class OrderPizzaModule implements IModule
	{
        const ORDER_PIZZA_CONTROLLER_KEY = 'OrderPizzaController';
        const ORDER_PIZZA_KEY = 'OrderPizza';

        /**
		 * @param IContainerBuilder $builder
		 *
		 * @SuppressWarnings(PHPMD.StaticAccess)
		 */
		public function build(IContainerBuilder $builder)
		{
			$builder->registerType(OrderPizzaController::class)
				->asA(IController::class)
				->asA(IOrderPizzaController::class)
				->keyed(self::ORDER_PIZZA_CONTROLLER_KEY)
				->singleInstance();

			$builder->registerType(OrderPizza::class)
				->asA(IOrderPizza::class)
				->named(self::ORDER_PIZZA_KEY)
				->singleInstance();

			$builder->registerType(OrderPizzaPresenter::class)
				->asA(IOrderPizzaPresenter::class)
				->singleInstance();

			$builder->registerType(OrderPizzaDao::class)
				->asA(IOrderPizzaDao::class)
				->singleInstance();
		}
	}