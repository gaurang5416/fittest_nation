<?php

namespace App\Controller;

use Cake\App\Controller;
use Cake\Network\Session\DatabaseSession;

class StaffMembersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent("GYMFunction");
    }

    public function staffList()
    {
        $role_name = $this->request->session()->read('Auth.User.role_name');
        $staff_id = $this->request->session()->read('Auth.User.id');

        if ($role_name != 'staff_member') {
            $data = $this->StaffMembers->GymMember->find()->contain(['GymRoles'])->where(["GymMember.role_name" => "staff_member"])->select(['GymRoles.name'])->select($this->StaffMembers->GymMember)->hydrate(false)->toArray();
        } else {
            $data = $this->StaffMembers->GymMember->find()->contain(['GymRoles'])->where(["GymMember.role_name" => "staff_member", "GymMember.id" => $staff_id])->select(['GymRoles.name'])->select($this->StaffMembers->GymMember)->hydrate(false)->toArray();
        }
        $this->set("data", $data);
    }

    public function addStaff()
    {
        $this->set("edit", false);
        $this->set("title", __("Add Staff Member"));

        $roles = $this->StaffMembers->GymMember->GymRoles->find("list", ["keyField" => "id", "valueField" => "name"])->hydrate(false)->toArray();
        $this->set("roles", $roles);

        $specialization = $this->StaffMembers->GymMember->Specialization->find("list", ["keyField" => "id", "valueField" => "name"])->hydrate(false)->toArray();
        $this->set("specialization", $specialization);

        if ($this->request->is("post")) {

            $image_array = [];
            $video_array = [];

            if(count($_FILES['image']['name']) > 0 && $_FILES['image']['name'][0] != "") {
                foreach ($this->request->data["image"] as $var) {
                    $ext = $this->GYMFunction->check_valid_extension($var['name']);
                    if ($ext != 0) {
                        $image_name = $this->GYMFunction->uploadImage($var);
                        $image_array[] = $image_name;
                    }
                }
                $this->request->data["image"] = json_encode($image_array);
            } else {
                $this->request->data["image"] = json_encode("Thumbnail-img.png");
            }

            if(count($_FILES['video']['name']) > 0 && $_FILES['video']['name'][0] != "") {
                foreach ($this->request->data["video"] as $var) {
                    $ext = $this->GYMFunction->check_valid_extension($var['name'], 'video');
                    if ($ext != 0) {
                        $video_name = $this->GYMFunction->uploadImage($var);
                        $video_array[] = $video_name;
                    }
                }
                $this->request->data["video"] = json_encode($video_array);
            }

            $staff = $this->StaffMembers->GymMember->newEntity();

            $this->request->data['birth_date'] = $this->GYMFunction->get_db_format_date($this->request->data['birth_date']);
            $this->request->data['created_date'] = date("Y-m-d");
            $this->request->data['s_specialization'] = json_encode($this->request->data['s_specialization']);
            $this->request->data["role_name"] = "staff_member";
            //this code add for api
            $this->request->data['activated'] = 1;
            //end
            $staff = $this->StaffMembers->GymMember->patchEntity($staff, $this->request->data);

            if ($this->StaffMembers->GymMember->save($staff)) {

                $this->Flash->success(__("Success! Record Successfully Saved."));
                return $this->redirect(["action" => "staffList"]);
            } else {

                if ($staff->errors()) {
                    foreach ($staff->errors() as $error) {
                        foreach ($staff as $key => $value) {
                            $this->Flash->error(__($value));
                        }
                    }
                }
            }
        }
    }

    public function editStaff($id)
    {
        $this->set("edit", true);
        $this->set("title", __("Edit Staff Member"));

        $data = $this->StaffMembers->GymMember->get($id)->toArray();
        $roles = $this->StaffMembers->GymMember->GymRoles->find("list", ["keyField" => "id", "valueField" => "name"])->hydrate(false)->toArray();
        $specialization = $this->StaffMembers->GymMember->Specialization->find("list", ["keyField" => "id", "valueField" => "name"])->hydrate(false)->toArray();

        $this->set("specialization", $specialization);
        $this->set("roles", $roles);
        $this->set("data", $data);
        $this->render("AddStaff");

        if ($this->request->is("post")) {
            $row = $this->StaffMembers->GymMember->get($id);

            $class_image_array = $row['image'] !== '' && $row['video'] !== null ? json_decode($row['image']) : [];
            if (isset($this->request->data['removed_images']) && $this->request->data['removed_images'] != null) {
                $images = json_decode($this->request->data['removed_images']);
                $class_image_array = array_diff($class_image_array, $images);
                foreach ($images as $var) {
                    unlink(WWW_ROOT . "/upload/" . $var);
                }
            }
            if (count($_FILES['image']['name']) > 0 && $_FILES['image']['name'][0] != "") {
                foreach ($this->request->data["image"] as $var) {
                    $ext = $this->GYMFunction->check_valid_extension($var['name']);
                    if ($ext != 0) {
                        $image_name = $this->GYMFunction->uploadImage($var);
                        $class_image_array[] = $image_name;
                    }
                }
            }
            $this->request->data["image"] = count($class_image_array) > 0 ?  json_encode($class_image_array) : '';

            $class_video_array = $row['video'] !== '' && $row['video'] !== null ? json_decode($row['video']) : [];

            if (isset($this->request->data['removed_videos']) && $this->request->data['removed_videos'] != null) {
                $videos = json_decode($this->request->data['removed_videos']);
                $class_video_array = array_diff($class_video_array, $videos);
                foreach ($videos as $var) {
                    unlink(WWW_ROOT . "/upload/" . $var);
                }
            }
            if (count($_FILES['video']['name']) > 0 && $_FILES['video']['name'][0] != "") {
                foreach ($this->request->data["video"] as $var) {
                    $ext = $this->GYMFunction->check_valid_extension($var['name'], 'video');
                    if ($ext != 0) {
                        $video_name = $this->GYMFunction->uploadImage($var);
                        $class_video_array[] = $video_name;
                    }
                }
            }
            $this->request->data["video"] = count($class_video_array) > 0 ? json_encode($class_video_array) : '';

            //$this->request->data['birth_date'] = date("Y-m-d",strtotime($this->request->data['birth_date']));
            $this->request->data['birth_date'] = $this->GYMFunction->get_db_format_date($this->request->data['birth_date']);

            //activated status for api
            $this->request->data['activated'] = 1;
            //end

            $this->request->data['s_specialization'] = json_encode($this->request->data['s_specialization']);

            $update = $this->StaffMembers->GymMember->patchEntity($row, $this->request->data);
            if ($this->StaffMembers->GymMember->save($update)) {
                $this->Flash->success(__("Success! Record Updated Successfully."));
                return $this->redirect(["action" => "staffList"]);
            } else {
                if ($update->errors()) {
                    foreach ($update->errors() as $error) {
                        foreach ($error as $key => $value) {
                            $this->Flash->error(__($value));
                        }
                    }
                }
            }
        }
    }

    public function deleteStaff($id)
    {
        $row = $this->StaffMembers->GymMember->get($id);
        if ($this->StaffMembers->GymMember->delete($row)) {
            $this->Flash->success(__("Success! Staff Member Deleted Successfully."));
            return $this->redirect($this->referer());
        }
    }

    public function isAuthorized($user)
    {
        $role_name = $user["role_name"];
        $curr_action = $this->request->action;
        $members_actions = ["staffList"];
        $staff_acc_actions = ["staffList"];
        switch ($role_name) {
            case "member":
                if (in_array($curr_action, $members_actions)) {
                    return true;
                } else {
                    return false;
                }
                break;

            /*CASE "staff_member":
                if(in_array($curr_action,$staff_acc_actions))
                {return true;}else{ return false;}
            break;*/

            case "accountant":
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