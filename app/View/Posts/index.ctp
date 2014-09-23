<!-- File : /app/View/Posts/index.ctp -->

<h1>Blog posts</h1>
<table>
	<tr>
		<td>
			Id
		</td>
		<td>
			Title
		</td>
                <td>
                        Action
                </td>
		<td>
			Created
		</td>
	</tr>
	<?php foreach ($posts as $post) : ?>
	<tr>
		
		<td>
			<?php echo $post['Post']['id']; ?>
		</td>
		<td>
			<?php echo $this->Html->link ( $post['Post']['title'] , array('controller'=>'Posts','action'=>'view',$post['Post']['id']) ) ;?>
		</td>
                <td>
                    <?php echo $this->Html->link("Edit",array("action"=>"edit"
                        ,$post["Post"]["id"])) ;?>
                </td>
		<td>
			<?php echo $post['Post']['created'] ;?>
		</td>
	</tr>
	<?php endforeach; ?>
	<?php unset($post);?>
        
</table>

<?php echo $this->Html->link("Add Post",array("controller"=>"Posts","action"=>"add"));  ?>
