<?php 
class PostsController extends AppController
{
	public $helpers = array('Html','Form');
	public function index()
	{
		
		
		$this->set('posts',$this->Post->find('all'));
                
	}
        
        public function view($id=null)
        {
            if (!$id)
            {
                throw new NotFoundException("Invalid post");
            }
            $post = $this->Post->findById($id);
            if (!$post)
            {
                throw new NotFoundException("Invalid post");
            }
            $this->set("post",$post);
            
            
            
        }
        
        public function add()
        {
            if ($this->request->is('post'))
            {
                $this->Post->create();
                
                if ($this->Post->save($this->request->data))
                {
                    $this->Session->setFlash("Post saved ok.");
                    return $this->redirect(array("action"=>"index"));
                }
                $this->Session->setFlash("Unable to add post!");
            }
        }
        
        public function edit($id = null)
        {
            if (!$id)
            {
                throw new NotFoundException("Invalid post");
            }
            $post = $this->Post->findById($id);
            if (!$post)
            {
                throw new NotFoundException("Invalid post");
            }
            if ($this->request->is(array("put","post")))
            {
                $this->Post->id = $id ;
                
                if ($this->Post->save($this->request->data))
                {
                    $this->Session->setFlash("The post is saved ok.");
                    return $this->redirect(array("action"=>"index"));
                    
                }
                else
                {
                    $this->Session->setFlash("Unable to update post.");
                    
                }
                    
                
                
            }
            
            if (!$this->request->data)
            {
                $this->request->data = $post;
                
            }
        }
        
        public function delete ($id)
        {
            if ($this->request->is("GET"))
            {
                throw new MethodNotAllowedException("Not allowd.");
            }
            if ($this->Post->delete($id))
            {
                $this->Session->setFlash("Deleted ok.");
            }
            else
            {
                $this->Session->setFlash("Error deleting post!");
            }
            $this->redirect(array("action"=>"index"));
                
        }
}

?>
