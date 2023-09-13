<?php

use Latte\Runtime as LR;

/** source: /home/jarkas/dev_mop/dev_mop/app/Module/Admin/Presenters/templates/@form.latte */
final class Template45fa55ec9a extends Latte\Runtime\Template
{
	public const Source = '/home/jarkas/dev_mop/dev_mop/app/Module/Admin/Presenters/templates/@form.latte';


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		$form = $this->global->formsStack[] = is_object($ʟ_tmp = $name) ? $ʟ_tmp : $this->global->uiControl[$ʟ_tmp] /* line 1 */;
		echo '<form';
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), ['class' => null], false) /* line 1 */;
		echo ' class=form-horizontal>
';
		ob_start(fn() => '');
		try {
			echo '<ul class=error>';
			ob_start();
			try {
				echo "\n";
				foreach ($form->ownErrors as $error) /* line 3 */ {
					echo '	<li>';
					echo LR\Filters::escapeHtmlText($error) /* line 3 */;
					echo '</li>
';

				}


			} finally {
				$ʟ_ifc[0] = rtrim(ob_get_flush()) === '';
			}
			echo '</ul>
';

		} finally {
			if ($ʟ_ifc[0] ?? null) {
				ob_end_clean();
			} else {
				echo ob_get_clean();
			}
		}
		echo "\n";
		foreach ($form->controls as $name => $input) /* line 6 */ {
			if (!$input->getOption('rendered') && $input->getOption('type') !== 'hidden') /* line 7 */ {
				echo '<div';
				echo ($ʟ_tmp = array_filter(['form-group', $input->required ? 'required' : null, $input->error ? 'has-error' : null])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 8 */;
				echo '>

	<div class="col-sm-2 control-label">';
				echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item($input, $this->global)->getLabel()) /* line 10 */;
				echo '</div>

	<div class="col-sm-10">
';
				if (in_array($input->getOption('type'), ['text', 'select', 'textarea'], true)) /* line 13 */ {
					echo '			';
					echo Nette\Bridges\FormsLatte\Runtime::item($input, $this->global)->getControl()->addAttributes(['class' => 'form-control']) /* line 14 */;
					echo "\n";
				} elseif ($input->getOption('type') === 'button') /* line 15 */ {
					echo '			';
					echo Nette\Bridges\FormsLatte\Runtime::item($input, $this->global)->getControl()->addAttributes(['class' => 'btn btn-default']) /* line 16 */;
					echo "\n";
				} elseif ($input->getOption('type') === 'checkbox') /* line 17 */ {
					echo '			<div class="checkbox">';
					echo Nette\Bridges\FormsLatte\Runtime::item($input, $this->global)->getControl() /* line 18 */;
					echo '</div>
';
				} elseif ($input->getOption('type') === 'radio') /* line 19 */ {
					echo '			<div class="radio">';
					echo Nette\Bridges\FormsLatte\Runtime::item($input, $this->global)->getControl() /* line 20 */;
					echo '</div>
';
				} else /* line 21 */ {
					echo '			';
					echo Nette\Bridges\FormsLatte\Runtime::item($input, $this->global)->getControl() /* line 22 */;
					echo "\n";
				}



				echo "\n";
				ob_start(fn() => '');
				try {
					echo '		<span class=help-block>';
					ob_start();
					try {
						echo LR\Filters::escapeHtmlText($input->error ?: $input->getOption('description')) /* line 25 */;

					} finally {
						$ʟ_ifc[1] = rtrim(ob_get_flush()) === '';
					}
					echo '</span>
';

				} finally {
					if ($ʟ_ifc[1] ?? null) {
						ob_end_clean();
					} else {
						echo ob_get_clean();
					}
				}
				echo '	</div>
</div>
';
			}

		}

		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(end($this->global->formsStack), false) /* line 1 */;
		echo '</form>
';
		array_pop($this->global->formsStack);
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['error' => '3', 'name' => '6', 'input' => '6'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}
}
