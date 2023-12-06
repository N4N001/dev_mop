<?php

namespace App\Module\Admin\Presenters;

use Nette;
use Nette\Application\UI\Form;
use Nette\Application\UI\Presenters;
use app\Model\UserFacade;
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
	public function actionDetail(int $id): void
	{
		if(!$this->user->IsInRole('admin')) 
		{
			$this-flashmessage("Nemáte oprávnění k přístupu.", "danger");
			$this->redirect("User:default");

		}
	}

	public function renderEdit(int $id): void
	{
		$id = $this->user->id;
		$user_item = $this->facade->getById($id);
		
		if (!$user_item) {
			$this->error('Uživatel neexistuje');
		}
	
		$this->getComponent('editForm')->setDefaults($user_item->toArray());
	}

	public function createComponentEditForm(): Form
	{
		$form = new Form;
		$form->addText('username', 'Username:');
		
		$form->addText('email', 'Email:');
		$form->addPassword('password', 'Password:');
		$role=['admin'=>"Admin",'user'=>"User",];
		$form->addRadioList('role', 'Role:', $role);
		$form->addSubmit('send', 'Uložit');
		$form->onSuccess[] = $this->editFormSucceeded(...);

		

		return $form;
	}

	private function editFormSucceeded(Form $form, array $data): void
	{
		if($this->facade->getUserByUsername($data['username'])) {
			$this->flashMessage('Uživatelské jméno již existuje.');
		}
		else{
		$this->facade->editUser($this->user->id, $data);
		}
	}


	public function handleDelete(int $id){
		$this->facade->delete($id);
		$this->redirect('User:default');
	}

}