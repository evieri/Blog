<?php

	class PostsController extends AppController {

		public $helpers = array('Html', 'Form', 'Flash');

		public $components = array('Flash');

		public $paginate = array(
			'fields' => array('Post.id', 'Post.title', 'Post.user_id', 'Post.body', 'Post.created'),
			'conditions' => array(),
			'limit' => 8,
			'order' => array('Post.id' => 'asc')
		);

		public function index() {
//			$order = "Post.id asc";
//			$this->set('posts', $this->Post->find('all', compact('order')));

			$posts = $this->paginate();
			$this->set('posts', $posts);
		}

		public function view($id) {
			if (!$id) {
				throw new NotFoundException(__('Invalid post'));
			}

			$post = $this->Post->findById($id);
			if (!$post) {
				throw new NotFoundException(__('Invalid post'));
			}
			$this->set('post', $post);
		}

		public function add() {
			if ($this->request->is('post')) {
				$this->Post->create();
				$this->request->data['Post']['user_id'] = $this->Auth->user('id');
				if ($this->Post->save($this->request->data)) {
					$this->Flash->success(__('Seu post foi publicado com sucesso!'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Flash->error(__('Houve um erro, por favor, tente novamente.'));
			}
		}

		public function edit($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Invalid post'));
			}

			$post = $this->Post->findById($id);
			if (!$post) {
				throw new NotFoundException(__('Invalid post'));
			}

			if ($this->request->is(array('post', 'put'))) {
				$this->Post->id = $id;
				if ($this->Post->save($this->request->data)) {
					$this->Flash->success(__('Your post has been updated.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Flash->error(__('Unable to update your post.'));
			}

			if (!$this->request->data) {
				$this->request->data = $post;
			}
		}

		public function delete($id) {
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}

			if ($this->Post->delete($id)) {
				$this->Flash->success(
					__('The post with id: %s has been deleted.', h($id))
				);
			} else {
				$this->Flash->error(
					__('The post with id: %s could not be deleted.', h($id))
				);
			}

			return $this->redirect(array('action' => 'index'));
		}

		public function isAuthorized($user) {
			// All registered users can add posts
			if ($this->action === 'add') {
				return true;
			}

			// The owner of a post can edit and delete it
			if (in_array($this->action, array('edit', 'delete'))) {
				$postId = (int) $this->request->params['pass'][0];
				if ($this->Post->isOwnedBy($postId, $user['id'])) {
					return true;
				}
			}

			return parent::isAuthorized($user);
		}
	}
