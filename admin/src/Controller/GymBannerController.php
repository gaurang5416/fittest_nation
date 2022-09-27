<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

Class GymBannerController extends AppController
{
    public function initialize()
    {
        parent::initialize();
    }

    public function BannerList()
    {
        $data = $this->GymBanner->find("all")->hydrate(false)->toArray();
        $this->set("data", $data);
    }

    public function addBanner()
    {
        $this->set("edit", false);
        $this->set("title", __("Add Banner"));
        $session = $this->request->session()->read("User");
        if ($this->request->is("post")) {
            $this->loadComponent("GYMFunction");
            $ext = $this->GYMFunction->check_valid_extension($this->request->data['media']['name'], 'image_video');
            if ($ext != 0) {
                $this->loadComponent("GYMFunction");
                $banner = $this->GymBanner->newEntity();
                $new_name = $this->GYMFunction->uploadImage($this->request->data["media"]);
                $this->request->data["media"] = $new_name;
                $this->request->data["type"] = $this->GYMFunction->get_file_type($new_name);
                $this->request->data["created_date"] = date("Y-m-d");
                $banner = $this->GymBanner->patchEntity($banner, $this->request->data);
                $this->request->data["created_by"] = $session["id"];

                if ($this->GymBanner->save($banner)) {
                    $this->Flash->Success(__("Success! Banner Added Successfully."));
                    return $this->redirect(["action" => "bannerList"]);
                }
            } else {
                $this->Flash->error(__("Invalid File Extension, Please Retry."));
                return $this->redirect(["action" => "add-banner"]);
            }
        }
    }

    public function editBanner($id)
    {
        $this->set("title", __("Edit Banner"));
        $row1 = $this->GymBanner->get($id);
        $row = $row1->toArray();
        $this->set("edit", true);
        $this->set("data", $row);
        $this->render("addBanner");
        $session = $this->request->session()->read("User");
        if ($this->request->is("post")) {
            $this->loadComponent("GYMFunction");
            $ext = $this->GYMFunction->check_valid_extension($this->request->data['media']['name'], 'image_video');

            if ($ext != 0) {
                if (!empty($this->request->data["media"]['name'])) {
                    $new_name = $this->GYMFunction->uploadImage($this->request->data["media"]);
                    $this->request->data["media"] = $new_name;
                    $this->request->data["type"] = $this->GYMFunction->get_file_type($new_name);

                    /* old image remove from folder when new img upload */
                    if ($row['media'] != '') {
                        unlink(WWW_ROOT . "/upload/" . $row['media']);
                    }
                } else {
                    $this->request->data["media"] = $row['media'];
                }
                $this->request->data["created_by"] = $session["id"];
                $banner = $this->GymBanner->patchEntity($row1, $this->request->data);
                if ($this->GymBanner->save($banner)) {
                    $this->Flash->success(__("Success! Record Updated Successfully"));
                    return $this->redirect(["action" => "bannerList"]);
                }
            } else {
                $this->Flash->error(__("Invalid File Extension, Please Retry."));
                return $this->redirect(["action" => "edit-banner", $id]);
            }
        }
    }

    public function deleteBanner($id = null)
    {
        if ($id != null) {
            $row = $this->GymBanner->get($id);
            if ($this->GymBanner->delete($row)) {
                /* image remove from folder when delete record */
                if ($row['image'] != '') {
                    unlink(WWW_ROOT . "/upload/" . $row['image']);
                }

                $this->Flash->success(__("Success! Record Deleted Successfully"));
                return $this->redirect(["action" => "bannerList"]);
            }
        }
    }

    public function isAuthorized($user)
    {
        $role_name = $user["role_name"];
        $curr_action = $this->request->action;
        $members_actions = ["bannerList"];
        $staff_acc_actions = ["bannerList", "editBanner", "deleteBanner", "addBanner"];
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
