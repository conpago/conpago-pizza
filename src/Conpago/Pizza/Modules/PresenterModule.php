<?php

	namespace Conpago\Pizza\Modules;

	use Conpago\DI\IContainerBuilder;
	use Conpago\DI\IModule;
    use Conpago\Presentation\Contract\IJsonPresenter;
    use Conpago\Presentation\JsonPresenter;

    class PresenterModule implements IModule
	{
		public function build(IContainerBuilder $builder)
		{
			$builder
				->registerType(JsonPresenter::class)
				->asA(IJsonPresenter::class)
				->singleInstance();
		}
	}