<?php

use Latte\Runtime as LR;

/** source: /home/jarkas/dev_mop/dev_mop/app/Module/Admin/Presenters/templates/@layout.latte */
final class Templatec78f974478 extends Latte\Runtime\Template
{
	public const Source = '/home/jarkas/dev_mop/dev_mop/app/Module/Admin/Presenters/templates/@layout.latte';

	public const Blocks = [
		['scripts' => 'blockScripts'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		echo '<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">

	<title>';
		if ($this->hasBlock('title')) /* line 7 */ {
			$this->renderBlock('title', [], function ($s, $type) {
				$ʟ_fi = new LR\FilterInfo($type);
				return LR\Filters::convertTo($ʟ_fi, 'html', $this->filters->filterContent('stripHtml', $ʟ_fi, $s));
			}) /* line 7 */;
			echo ' | ';
		}
		echo 'User Login Example</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
	<div class=container>
';
		foreach ($flashes as $flash) /* line 14 */ {
			echo '		<div';
			echo ($ʟ_tmp = array_filter(['alert', 'alert-' . $flash->type])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 14 */;
			echo '>';
			echo LR\Filters::escapeHtmlText($flash->message) /* line 14 */;
			echo '</div>
';

		}

		echo '		<ul class="navig">
';
		if ($user->isLoggedIn()) /* line 16 */ {
			echo '				<li><a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Sign:out')) /* line 17 */;
			echo '"
			>Odhlásit ';
			echo LR\Filters::escapeHtmlText($user->getIdentity()->username) /* line 18 */;
			echo '</a></li>
';
		} else /* line 19 */ {
			echo '				<li><a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Sign:in')) /* line 20 */;
			echo '"
			>Přihlásit</a></li>
';
		}
		echo '		</ul>

';
		$this->renderBlock('content', [], 'html') /* line 25 */;
		echo '	</div>

';
		$this->renderBlock('scripts', get_defined_vars()) /* line 28 */;
		echo '</body>
</html>
';
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['flash' => '14'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}


	/** {block scripts} on line 28 */
	public function blockScripts(array $ʟ_args): void
	{
		echo '	<script src="https://nette.github.io/resources/js/3/netteForms.min.js"></script>
';
	}
}
