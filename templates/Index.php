<?php

$form = [
    'attr' => [
        'action' => 'index.php',
        'method' => 'POST',
        'class' => 'my-form',
        'id' => 'login-form'
    ],
    'fields' => [
        'first_name' => [
            'label' => 'First Name:',
            'error' => 'Too short!',
            'type' => 'text',
            'value' => 'Kornelija',
            'extra' => [
                'attr' => [
                    'class' => 'first-name',
                    'id' => 'first-name',
                ]
            ]
        ]
    ],
    'buttons' => [
        'save' => [
            'title' => 'Save',
            'extra' => [
                'attr' => [
                    'class' => 'btn'
                ]
            ]
        ],
        'clear' => [
            'title' => 'Clear',
            'extra' => [
                'attr' => [
                    'class' => 'btn'
                ]
            ]
        ]
    ]
];
var_dump(html_attr($form['attr']));

function html_attr($attr)
{
    $attributes = [];
    foreach ($attr as $attr_index => $attr_value) {
        $attribute = "$attr_index=\"$attr_value\"";
        $attributes[] = $attribute;
    }
    $attributes_string = implode(' ', $attributes);
    return $attributes_string;
}

?>
<html>
<body>
<?php require('templates/form.tpl.php'); ?>
</body>
</html>