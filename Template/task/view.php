<h2><?= t('Mantis Issue #%d', $external_task->getIssueId()) ?></h2>

<ul class="github-labels">
<?php foreach ($external_task->getIssue()->labels as $label): ?>
    <li class="github-label" style="background-color: #<?= $label['color'] ?>"><?= $this->text->e($label['name']) ?></li>
<?php endforeach ?>
</ul>

Last sync: <?php echo $this->task->taskMetadataModel->get($task['id'], 'mantis_last_sync', ''); ?>

<table>
    <tr>
        <th class="column-25"><?= t('Status') ?></th>
        <td class="column-25"><?= $external_task->getIssue()->status->name ?></td>

        <th class="column-25"><?= t('Creation Date') ?></th>
        <td class="column-25"><?= $this->dt->date($external_task->getIssue()->created_at) ?></td>
    </tr>
    <tr>
        <th><?= t('Reporter') ?></th>
        <td>
            <?php if (! empty($external_task->getIssue()->user)): ?>
                <?= $this->text->e($external_task->getIssue()->user['login']) ?>
            <?php endif ?>
        </td>

        <th><?= t('Modification Date') ?></th>
        <td><?= $this->dt->date($external_task->getIssue()->updated_at) ?></td>
    </tr>
    <tr>
        <th><?= t('Assignees') ?></th>
        <td>
            <?= $this->text->e(implode(', ', $external_task->getIssue()->handler->name)) ?>
        </td>

        <th><?= t('Closed Date') ?></th>
        <td>
            <?php if (! empty($external_task->getIssue()->closed_at)): ?>
                <?= $this->dt->date($external_task->getIssue()->closed_at) ?>
            <?php endif ?>
        </td>
    </tr>
    <tr>
        <th><?= t('Milestone') ?></th>
        <td>
            <?php if (! empty($external_task->getIssue()->milestone)): ?>
                <?= $this->text->e($external_task->getIssue()->milestone['title']) ?>
            <?php endif ?>
        </td>

        <th><?= t('Comments') ?></th>
        <td><?= $this->text->e($external_task->getIssue()->comments) ?></td>
    </tr>
</table>

<small><i class="fa fa-fw fa-external-link" aria-hidden="true"></i><a href="<?= $this->text->e($external_task->getUri()) ?>" target="_blank"><?= t('Link') ?></a></small>
