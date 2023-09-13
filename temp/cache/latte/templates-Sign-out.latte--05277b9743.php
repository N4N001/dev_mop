<?php

use Latte\Runtime as LR;

/** source: /home/jarkas/dev_mop/dev_mop/app/Module/Admin/Presenters/templates/Sign/out.latte */
final class Template05277b9743 extends Latte\Runtime\Template
{
	public const Source = '/home/jarkas/dev_mop/dev_mop/app/Module/Admin/Presenters/templates/Sign/out.latte';

	public const Blocks = [
		['content' => 'blockContent', 'title' => 'blockTitle'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		$this->renderBlock('content', get_defined_vars()) /* line 1 */;
	}


	/** {block content} on line 1 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		$this->renderBlock('title', get_defined_vars()) /* line 2 */;
		echo '
<p><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('in')) /* line 4 */;
		echo '">Sign in to another account</a></p>
';
	}


	/** n:block="title" on line 2 */
	public function blockTitle(array $ʟ_args): void
	{
		echo '<h1>You have been signed out</h1>
';
	}
}
