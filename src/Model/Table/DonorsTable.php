<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Donors Model
 *
 * @property \App\Model\Table\TasksTable|\Cake\ORM\Association\HasMany $Tasks
 *
 * @method \App\Model\Entity\Donor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Donor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Donor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Donor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Donor|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Donor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Donor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Donor findOrCreate($search, callable $callback = null, $options = [])
 */
class DonorsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('donors');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Tasks', [
            'foreignKey' => 'donor_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->allowEmpty('name');

        return $validator;
    }
}
