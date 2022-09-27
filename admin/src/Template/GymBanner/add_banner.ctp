<section class="content">
	<br>
	<div class="col-md-12 box box-default">
		<div class="box-header">
			<section class="content-header">
			  <h1>
				<i class="fa fa-object-group"></i>
				<?php echo $title;?>
				<small><?php echo __("Banner");?></small>
			  </h1>
			  <ol class="breadcrumb">
				<a href="<?php echo $this->Gym->createurl("GymBanner","BannerList");?>" class="btn btn-flat btn-custom"><i class="fa fa-bars"></i> <?php echo __("Banner List");?></a>
			  </ol>
			</section>
		</div>
		<hr>
		<div class="box-body">
			<div class="col-md-6">
			<?php

			echo $this->Form->create("addbanner",["type"=>"file","class"=>"validateForm addbanner"]);

			echo "<div class='form-group'>"; ?>
			 <label class='control-label '><?php echo __('Banner Name');?><span class='text-danger'> *</span></label>
			<?php echo $this->Form->input("",["label"=>false,"name"=>"url","class"=>"form-control validate[required,maxSize[30]]","value"=>(($edit)?$data['url']:''),'autofocus'=>true]);
			echo "</div>";

			echo "<div class='form-group'>";
			echo $this->Form->label(__("Banner Image/Video"));
			echo $this->Form->file("media",["class"=>"form-control","id"=>"imgInp"]);
			echo "
				<script>
					function readURL(input) {
						if (input.files && input.files[0]) {
							var reader = new FileReader();
					
							reader.onload = function (e) {
								$('#blah').attr('style', 'display:inline');
								$('#blah').attr('src', e.target.result);
							}
							reader.readAsDataURL(input.files[0]);
						}
					}
					
					$('#imgInp').change(function(){
						readURL(this);
					});
				</script>
			";
			echo "</div>";
			$url =  (isset($data['media']) && $data['media'] != "") ? $this->request->webroot ."/upload/" . $data['media'] : $this->request->webroot ."/upload/Thumbnail-img.png";
			echo "<img src='{$url}' class='img-responsive' id='blah' height='100px' width='150px'>";
			echo "<br><br>";

			echo $this->Form->button(__("Save Banner"),['class'=>"btn btn-flat btn-success","name"=>"add_banner"]);
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
$(document).ready(function(){

	var box_height = $(".box").height();
	var box_height = box_height + 300 ;
	$(".content-wrapper").css("height",box_height+"px");
	$(".content-wrapper").css("min-height","500px");
});
</script>
