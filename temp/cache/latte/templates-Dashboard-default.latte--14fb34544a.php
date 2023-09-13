<?php

use Latte\Runtime as LR;

/** source: /home/jarkas/dev_mop/dev_mop/app/Module/Admin/Presenters/templates/Dashboard/default.latte */
final class Template14fb34544a extends Latte\Runtime\Template
{
	public const Source = '/home/jarkas/dev_mop/dev_mop/app/Module/Admin/Presenters/templates/Dashboard/default.latte';

	public const Blocks = [
		['content' => 'blockContent'],
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

		echo '<h1>Administation</h1>

<p>If you see this page, it means you have successfully logged in.</p>

<p>(<a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('User:default')) /* line 6 */;
		echo '">User list</a>)</p>
<p>(<a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Sign:out')) /* line 7 */;
		echo '">Sign out</a>)</p>
';
	}
}
