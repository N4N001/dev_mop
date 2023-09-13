<?php

namespace App\Module\Admin\Presenters;

use Nette;
use Nette\Application\UI\Form;
use App\Model\UserFacade;
use RequireLoggedUser;

final class UserPresenter extends Nette\Application\UI\Presenter
{
    public function __construct(
		private UserFacade $facade,
	) {
	}
    public function renderDefault(): void
	{
		$this->template->users = $this->facade
			->getAll();
	}
	public function renderDetail(int $id): void
	{
		$this->template->user_item = $this->facade
			->getById($id);
			
	}

}