<h1>
    Edit Post
</h1>
<?php echo $this->Form->create("Post"); ?>
<?php echo $this->Form->input("title"); ?>
<?php echo $this->Form->input("body",array("rows"=>"3")); ?>
<?php echo $this->Form->input("id",array("type"=>"hidden")); ?>
<?php echo $this->Form->end("Save"); ?>
