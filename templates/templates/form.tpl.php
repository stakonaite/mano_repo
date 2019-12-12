<form <?php print html_attr(($form['attr'] ?? []) + ['method' => 'POST']); ?>>

    <?php foreach ($form['fields'] ?? [] as $field_id => $field): ?>

    <?php if(isset($field['label'])): ?>
        <label>
            <span><?php print $field['label']; ?></span>
            <?php endif; ?>

            <input <?php print html_attr(
                [
                    'name' => $field_id,
                    'type' => $field['type'],
                    'value' => $field['value'] ?? '',
                ] + ($field['extra']['attr'] ?? [])) ?>>
    <?php if (isset($field['label'])):?>
        </label>
    <?php endif; ?>

    <?php if(isset($field['error'])): ?>
        <div>
       <span><?php print $field['error']; ?></span>
    </div>
    <?php endif; ?>
    <?php endforeach; ?>

    <?php foreach ($form['buttons'] ?? [] as $button_id => $button): ?>
    <button <?php print html_attr(['name' => 'action', 'value' => $button_id] + ($button['extra']['attr'] ?? [])); ?>>
        <?php print $button['title']; ?>
        <button>
            <?php endforeach; ?>
</form>