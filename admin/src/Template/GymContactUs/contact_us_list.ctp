<?php $session = $this->request->session()->read("User"); ?>
<script>
    $(document).ready(function () {
        $(".contactusTable").DataTable({
            "responsive": true,
            "order": [[1, "asc"]],
            "language": {<?php echo $this->Gym->data_table_lang();?>}
        });
        var box_height = $(".box").height();
        var box_height = box_height + 300;
        $(".content-wrapper").css("height", box_height + "px");
        $(".content-wrapper").css("min-height", "500px");
    });
</script>
<section class="content">
    <br>
    <div class="col-md-12 box box-default">
        <div class="box-header">
            <section class="content-header">
                <h1>
                    <i class="fa fa-bars"></i>
                    <?php echo __("Contact Us List"); ?>
                    <small><?php echo __("Contact Us"); ?></small>
                </h1>
            </section>
        </div>
        <hr>
        <div class="box-body">
            <table class="contactusTable table table-striped">
                <thead>
                <tr>
                    <th><?php echo __("Phone"); ?></th>
                    <th><?php echo __("Email"); ?></th>
                    <th><?php echo __("Message"); ?></th>
                    <th><?php echo __("Action"); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($data as $row) {
                    echo "
				<tr>					
					<td>{$row['phone']}</td>
					<td>{$row['email']}</td>
					<td>{$row['message']}</td>
					<td>";
                    if ($session["role_name"] == "administrator" || $session["role_name"] == "staff_member" || $session["role_name"] == "accountant") {
                        $confirmMsg = __("Are you sure,You want to delete this record?");
                        echo "<a href='" . $this->Gym->createurl('GymContactUs', 'deleteContactUs') . "/{$row['id']}' class='btn btn-flat btn-danger' title='Delete' onClick=\"return confirm('$confirmMsg')\"><i class='fa fa-trash-o'></i></a>";
                    }
                    echo "</td>
				</tr>
				";
                }
                ?>
                </tbody>
                <tfoot>
                <tr>
                    <th><?php echo __("Phone"); ?></th>
                    <th><?php echo __("Email"); ?></th>
                    <th><?php echo __("Message"); ?></th>
                    <th><?php echo __("Action"); ?></th>
                </tr>
                </tfoot>
            </table>
        </div>
        <div class="overlay gym-overlay">
            <i class="fa fa-refresh fa-spin"></i>
        </div>
    </div>
</section>
