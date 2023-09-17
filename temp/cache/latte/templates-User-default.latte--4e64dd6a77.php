<?php

use Latte\Runtime as LR;

/** source: /home/jarkas/dev_mop/dev_mop/app/Module/Admin/Presenters/templates/User/default.latte */
final class Template4e64dd6a77 extends Latte\Runtime\Template
{
	public const Source = '/home/jarkas/dev_mop/dev_mop/app/Module/Admin/Presenters/templates/User/default.latte';

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

		echo '<style>
table, th, td {
  border:2px solid black;
}
</style>
';
		$this->renderBlock('content', get_defined_vars()) /* line 6 */;
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['user_item' => '12'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}


	/** {block content} on line 6 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<table>
    <th>Username</th>
    <th>id</th>
    <th>email</th>
    <th>role</th>
';
		foreach ($users as $user_item) /* line 12 */ {
			echo '        <tr>
            <td><a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('User:detail', [$user_item->id])) /* line 14 */;
			echo '">';
			echo LR\Filters::escapeHtmlText($user_item->username) /* line 14 */;
			echo '</a></td>
            <td>';
			echo LR\Filters::escapeHtmlText($user_item->id) /* line 15 */;
			echo '</td>
            <td>';
			echo LR\Filters::escapeHtmlText($user_item->email) /* line 16 */;
			echo '</td>
            <td>';
			echo LR\Filters::escapeHtmlText($user_item->role) /* line 17 */;
			echo '</td>
        </tr>
';

		}

		echo '</table>
';
	}
}
