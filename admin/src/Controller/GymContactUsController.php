<?php

namespace App\Controller;

use Cake\Utility\Inflector;

Class GymContactUsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
    }

    public function ContactUsList()
    {
        $data = $this->GymContactUs->find("all")->hydrate(false)->toArray();
        $this->set("data", $data);
    }

    public function deleteContactUs($id = null)
    {
        if ($id != null) {
            $row = $this->GymContactUs->get($id);
            if ($this->GymContactUs->delete($row)) {
                $this->Flash->success(__("Success! Record Deleted Successfully"));
                return $this->redirect(["action" => "contactUsList"]);
            }
        }
    }
}
