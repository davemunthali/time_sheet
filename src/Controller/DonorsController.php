<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Donors Controller
 *
 * @property \App\Model\Table\DonorsTable $Donors
 *
 * @method \App\Model\Entity\Donor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DonorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $donors = $this->paginate($this->Donors);

        $this->set(compact('donors'));
    }

    /**
     * View method
     *
     * @param string|null $id Donor id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $donor = $this->Donors->get($id, [
            'contain' => ['Activities']
        ]);

        $this->set('donor', $donor);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $donor = $this->Donors->newEntity();
        if ($this->request->is('post')) {
            $donor = $this->Donors->patchEntity($donor, $this->request->getData());
            if ($this->Donors->save($donor)) {
                $this->Flash->success(__('The donor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The donor could not be saved. Please, try again.'));
        }
        $this->set(compact('donor'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Donor id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $donor = $this->Donors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $donor = $this->Donors->patchEntity($donor, $this->request->getData());
            if ($this->Donors->save($donor)) {
                $this->Flash->success(__('The donor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The donor could not be saved. Please, try again.'));
        }
        $this->set(compact('donor'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Donor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $donor = $this->Donors->get($id);
        if ($this->Donors->delete($donor)) {
            $this->Flash->success(__('The donor has been deleted.'));
        } else {
            $this->Flash->error(__('The donor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
