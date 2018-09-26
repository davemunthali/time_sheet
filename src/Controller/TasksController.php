<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tasks Controller
 *
 * @property \App\Model\Table\TasksTable $Tasks
 *
 * @method \App\Model\Entity\Task[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TasksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Donors', 'Users']
        ];
        $tasks = $this->paginate($this->Tasks);

        $this->set(compact('tasks'));
    }

    /**
     * View method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $task = $this->Tasks->get($id, [
            'contain' => ['Donors', 'Users']
        ]);

        $this->set('task', $task);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $task = $this->Tasks->newEntity();
        if ($this->request->is('post')) {
            $task = $this->Tasks->patchEntity($task, $this->request->getData());
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('The task has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The task could not be saved. Please, try again.'));
        }
        $donors = $this->Tasks->Donors->find('list', ['limit' => 200]);
        $users = $this->Tasks->Users->find('list', ['limit' => 200]);
        $this->set(compact('task', 'donors', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $task = $this->Tasks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $task = $this->Tasks->patchEntity($task, $this->request->getData());
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('The task has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The task could not be saved. Please, try again.'));
        }
        $donors = $this->Tasks->Donors->find('list', ['limit' => 200]);
        $users = $this->Tasks->Users->find('list', ['limit' => 200]);
        $this->set(compact('task', 'donors', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $task = $this->Tasks->get($id);
        if ($this->Tasks->delete($task)) {
            $this->Flash->success(__('The task has been deleted.'));
        } else {
            $this->Flash->error(__('The task could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Function to fetch filtered list of tasks
     * 
     * @return void
     */
    public function getMonthTasks()
    {
        if (empty($start_date) && empty($end_date)) {
            $start_date = date('Y-m-d');
            $end_date = date('Y-m-d', strtotime('+1 month'));
        } else {
            $start_date = $this->request->query['start_date'];
            $end_date = $this->request->query['end_date'];
        }
        /*$this->Tasks->contain(
            [
                'Donors',
                'Users'
            ]
        );*/

        $tasks = $this->Tasks->find(
            'all',
            [
                'conditions' => [
                    'date_of_creation >=' => $start_date,
                    'date_of_creation <=' => $end_date
                ]
            ]
        )->contain(['Donors', 'Users']);
        $tasks = $tasks->all();
        $this->set(compact('tasks'));
    }
}
