cm-categories
==========

Common Categories Module (Frenzel GmbH 2014) v.0.1

Installation
============

Add the following line to your composer.json require section:

```
"frenzelgmbh/cmcategories":"*"
```

```
php yii migrate --migrationPath=@vendor/frenzelgmbh/cm-categories/migrations
```

Inside your yii-config, pls. add the following lines to your modules section. As you
might see, the gridview needs to be implemented too.
```
'cmcategories'=>[
  'class' => 'frenzelgmbh\cmcategories\Module',
],
'gridview' =>  [
  'class' => '\kartik\grid\Module'
],
```

After this, you should be able to see the set of build in widgets and options under:

http://yourhost/index.php?r=cmcategories/default/test

Design
======

The Categories module is use to store address/location informations, that can be linked to any other "module".
So in general all modules are referenced by:

* mod_table (which should hold the table name VARCHAR(100))
* mod_id    (which should hold the primarey key of the referenced record INTEGER(11))

Datastructure
=============
This module allows you to store cmcategories data related to any other "record" and "module" you pass by as parameters.
It allows you to save 1:n cmcategories records, while one record of cmcategories can be filled with the following fields:
* Parent_id (self reference)
* Name
Pls. notice, that records aren't deleted in all of our models, they just get marked as deleted!

Widgets
=======

The "create"-Button:
```php
if(class_exists('\frenzelgmbh\cmcategories\widgets\CreateCategoriesModal')){
  echo \frenzelgmbh\cmcategories\widgets\CreateCategoriesModal::widget(array(
    'module'      => 'tbl_test',
    'id'          => 1
  )); 
}
```

The "related"-Grid:
```php
if(class_exists('\frenzelgmbh\cmcategories\widgets\RelatedCategoriesGrid')){
  echo \frenzelgmbh\cmcategories\widgets\RelatedCategoriesGrid::widget(array(
    'module'      => 'tbl_test',
    'id'          => 1
  )); 
}
```
