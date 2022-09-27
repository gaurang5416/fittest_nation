<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Utility\Inflector;

Class GymPagesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
    }

    public function PagesList()
    {
        $data = $this->GymPages->find("all")->hydrate(false)->toArray();
        $this->set("data", $data);
    }

    public function addPages()
    {
        $this->set("edit", false);
        $this->set("title", __("Add Pages"));
        $session = $this->request->session()->read("User");

        if ($this->request->is("post")) {
            $this->loadComponent("GYMFunction");
            $pages = $this->GymPages->newEntity();

            $this->request->data["slug"] = Inflector::slug($this->request->data["title"]);
            $this->request->data["description"] = base64_encode($this->request->data["description"]);
            $this->request->data["created_by"] = $session["id"];
            $this->request->data["created_date"] = date("Y-m-d");

            $pages = $this->GymPages->patchEntity($pages, $this->request->data);

            if ($this->GymPages->save($pages)) {
                $this->Flash->Success(__("Success! Pages Added Successfully."));
                return $this->redirect(["action" => "pagesList"]);
            }
        }
    }

    public function editPages($id)
    {
        $this->set("title", __("Edit Pages"));
        $row1 = $this->GymPages->get($id);
        $row = $row1->toArray();
        $row["description"] = base64_decode($row["description"]);
        $this->set("edit", true);
        $this->set("data", $row);
        $this->render("addPages");
        if ($this->request->is("post")) {
            $this->loadComponent("GYMFunction");
            $this->request->data["slug"] = Inflector::slug($this->request->data["title"]);
            $this->request->data["description"] = base64_encode($this->request->data["description"]);
            $pages = $this->GymPages->patchEntity($row1, $this->request->data);
            if ($this->GymPages->save($pages)) {
                $this->Flash->success(__("Success! Record Updated Successfully"));
                return $this->redirect(["action" => "pagesList"]);
            }
        }
    }

    public function deletePages($id = null)
    {
        if ($id != null) {
            $row = $this->GymPages->get($id);
            if ($this->GymPages->delete($row)) {
                $this->Flash->success(__("Success! Record Deleted Successfully"));
                return $this->redirect(["action" => "pagesList"]);
            }
        }
    }

    public function isAuthorized($user)
    {
        $role_name = $user["role_name"];
        $curr_action = $this->request->action;
        $members_actions = ["pagesList"];
        $staff_acc_actions = ["pagesList", "editPages", "deletePages", "addPages"];
        switch ($role_name) {
            CASE "member":
                if (in_array($curr_action, $members_actions)) {
                    return true;
                } else {
                    return false;
                }
                break;
            case "accountant":
            CASE "staff_member":
                if (in_array($curr_action, $staff_acc_actions)) {
                    return true;
                } else {
                    return false;
                }
                break;
        }
        return parent::isAuthorized($user);
    }
}
