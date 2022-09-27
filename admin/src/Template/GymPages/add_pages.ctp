<?php echo $this->Html->script('ckeditor/ckeditor', array('inline' => false)); ?>

<section class="content">
    <br>
    <div class="col-md-12 box box-default">
        <div class="box-header">
            <section class="content-header">
                <h1>
                    <i class="fa fa-object-group"></i>
                    <?php echo $title; ?>
                    <small><?php echo __("Pages"); ?></small>
                </h1>
                <ol class="breadcrumb">
                    <a href="<?php echo $this->Gym->createurl("GymPages", "PagesList"); ?>" class="btn btn-flat btn-custom"><i class="fa fa-bars"></i> <?php echo __("Pages List"); ?></a>
                </ol>
            </section>
        </div>
        <hr>
        <div class="box-body">
            <div class="col-md-6">
                <?php

                echo $this->Form->create("addpages", ["type" => "file", "class" => "validateForm addpages"]);

                echo "<div class='form-group'>"; ?>
                <label class='control-label '><?php echo __('Title'); ?><span class='text-danger'> *</span></label>
                <?php echo $this->Form->input("", ["label" => false, "name" => "title", "class" => "form-control validate[required,maxSize[30]]", "value" => (($edit) ? $data['title'] : ''), 'autofocus' => true]);
                echo "</div>";

                echo "<div class='form-group'>"; ?>
                <label class='control-label '><?php echo __('Description'); ?><span class='text-danger'> *</span></label>
                <?php
                echo $this->Form->textarea('description', array("id" => "description", 'class' => 'ckeditor', "value" => (($edit) ? $data['description'] : '')));
                echo "</div>";

                echo $this->Form->button(__("Save Pages"), ['class' => "btn btn-flat btn-success", "name" => "add_pages"]);
                echo $this->Form->end();
                ?>
            </div>
        </div>
        <div class="overlay gym-overlay">
            <i class="fa fa-refresh fa-spin"></i>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {

        var box_height = $(".box").height();
        var box_height = box_height + 300;
        $(".content-wrapper").css("height", box_height + "px");
        $(".content-wrapper").css("min-height", "500px");
    });
</script>
