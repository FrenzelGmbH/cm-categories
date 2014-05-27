<?php

/**
 * The migration script for the communication
 * @author Philipp Frenzel <philipp@frenzel.net>
 * @copyright Frenzel GmbH
 * @version 1.0
 */

use yii\db\Schema;

class m140525_050429_categories extends \yii\db\Migration
{
	public function up()
	{
    
    switch (Yii::$app->db->driverName) {
      case 'mysql':
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        break;
      case 'pgsql':
        $tableOptions = null;
        break;
      default:
        throw new RuntimeException('Your database is not supported!');
    }

		$this->createTable('{{%categories}}',[
      'id'                => Schema::TYPE_PK,
      'name'              => Schema::TYPE_STRING .'(200)',
      //possible reference to user
      'user_id'           => Schema::TYPE_INTEGER.' NULL',
      //module fields
      'mod_table'         => Schema::TYPE_STRING .'(100)',
      'mod_id'            => Schema::TYPE_INTEGER.' NULL',
      //interface fields
      'system_key'        => Schema::TYPE_STRING .'(100)',
      'system_name'       => Schema::TYPE_STRING .'(100)',
      'system_upate'      => Schema::TYPE_INTEGER.' DEFAULT NULL',
      // timestamps
      'created_at'        => Schema::TYPE_INTEGER . ' NOT NULL',
      'updated_at'        => Schema::TYPE_INTEGER . ' NOT NULL',
      'deleted_at'        => Schema::TYPE_INTEGER . ' DEFAULT NULL',
      //Foreign Keys
      'parent'            => Schema::TYPE_INTEGER.' NULL',      
    ],$tableOptions);

	}

	public function down()
	{
		//drop FK's first
    
    $this->dropTable('{{%categories}}');
	}
}
