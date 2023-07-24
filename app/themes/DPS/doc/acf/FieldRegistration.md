# ACF Field Registration

Register advanced custom fields with object oriented PHP using the Extended ACF Plugin.

Visit the [Extended ACF github README](https://github.com/vinkla/extended-acf) for a full list of field examples and documentation.

## **Field Names**

By default, the field name is created by sanitizing the title (all lowercase and spaces replaced with dashes). If you prefer to name it something different, this can be added as a second argument to the `make` method for any field.

## **Examples**

_Note: Use statements must be added for every class (field) used._

**Basic Fields**

```php
Text::make(__('Headline', 'dps-starter'))
  ->instructions(__('Instructions go here.', 'dps-starter'))
  ->required();
```

```php
Textarea::make(__('Content', 'dps-starter'))
  ->instructions(__('Instructions go here.', 'dps-starter'))
  ->rows(2);
```

```php
WysiwygEditor::make(__('Content', 'dps-starter'))
  ->instructions(__('Instructions go here.', 'dps-starter'))
  ->mediaUpload(false)
  ->required();
```

```php
Url::make(__('Url', 'dps-starter'))
  ->instructions(__('Instructions go here.', 'dps-starter'))
  ->required();
```

```php
ColorPicker::make(__('Color', 'dps-starter'))
  ->instructions(__('Instructions go here.', 'dps-starter'))
  ->defaultValue('#4a9cff')
  ->required();
```

```php
Image::make(__('Image', 'dps-starter'))
  ->instructions(__('Instructions go here.', 'dps-starter'))
  ->returnFormat('array')
  ->previewSize('thumbnail') // thumbnail, medium or large
  ->required();
```

```php
Select::make(__('Select', 'dps-starter'))
  ->instructions(__('Instructions go here.', 'dps-starter'))
  ->choices([
    'choice-1' => __('Choice 1', 'dps-starter'),
    'choice-2' => __('Choice 2', 'dps-starter'),
  ])
  ->defaultValue('choice-1')
  ->returnFormat('value') // value, label or array
  ->allowMultiple()
  ->required();
```

```php
TrueFalse::make(__('True or False', 'dps-starter'))
  ->instructions(__('Instructions go here.', 'dps-starter'))
  ->defaultValue(false)
  ->stylisedUi() // optinal on and off text labels
  ->required();
```

**Group**

```php
Group::make(__('Group', 'dps-starter'))
  ->instructions(__('Instructions go here.', 'dps-starter'))
  ->fields([
    Text::make(__('Text', 'dps-starter')),
    Image::make(__('Image', 'dps-starter')),
  ])
  ->layout('row')
  ->required();
```

**Repeater**

```php
Repeater::make(__('Repeater', 'dps-starter'))
  ->instructions(__('Instructions go here.', 'dps-starter'))
  ->fields([
    Text::make(__('Text', 'dps-starter')),
    Image::make(__('Image', 'dps-starter')),
  ])
  ->min(2)
  ->collapsed('name')
  ->buttonLabel(__('Add Component', 'dps-starter'))
  ->layout('table') // block, row or table
  ->required();
```

**Conditional Logic**

```php
Select::make(__('Select', 'dps-starter'))
    ->choices([
        'choice-1' => __('Choice 1', 'dps-starter'),
        'choice-2' => __('Choice 2', 'dps-starter'),
    ]),
Text::make(__('Text', 'dps-starter'))
    ->conditionalLogic([
        ConditionalLogic::if('select')->equals('choice-1')
    ]);
```
