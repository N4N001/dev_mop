<?php

declare(strict_types=1);

namespace App\Module\Admin\Presenters;

use App\Forms;
use Nette;
use Nette\Application\UI\Form;	


abstract class BasePresenter extends Nette\Application\UI\Presenter
{
	public string $backlink = '';


	public function __construct(
		private Forms\SearchFactory $searchFactory,
	) {
	}

	protected function createComponentSearchForm(): Form
	{
		$form = $this->searchFactory->create();
	}

}