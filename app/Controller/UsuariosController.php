<?php
    
    class UsuariosController extends AppController
    {

        public function index() 
        {
            $this->Usuario->recursive = 0;
            $this->set('usuarios', $this->paginate());
        }

        public function beforeFilter() 
        {
            parent::beforeFilter();
            $this->Auth->allow('crear');
            $this->Auth->allow('index');
        }
        
        public function ver($id = null) 
        {
            $this->Usuario->id = $id;
            if (!$this->Usuario->exists()) {
                throw new NotFoundException(__('Usuario incorrecto'));
            }
            $this->set('user', $this->Usuario->read(null, $id));
        }

        public function crear() 
        {
            if ($this->request->is('post')) {
                $this->Usuario->create();
                if ($this->Usuario->save($this->request->data)) {
                    $this->Session->setFlash(__('Usuario agregado exitosamente'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('Hubo un error, por favor intentelo de nuevo.'));
                }
            }
        }

        public function editar($id = null) 
        {
            $this->Usuario->id = $id;
            if (!$this->Usuario->exists()) {
                throw new NotFoundException(__('Usuario incorrecto'));
            }
            if ($this->request->is('post') || $this->request->is('put')) {
                if ($this->Usuario->save($this->request->data)) {
                    $this->Session->setFlash(__('Se ha guardado el usuario exitosamente.'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('Hubo un error, por favor intentelo de nuevo.'));
                }
            } else {
                $this->request->data = $this->Usuario->read(null, $id);
                unset($this->request->data['User']['password']);
            }
        }

        public function borrar($id = null) 
        {
            if (!$this->request->is('post')) {
                throw new MethodNotAllowedException();
            }
            $this->Usuario->id = $id;
            if (!$this->Usuario->exists()) {
                throw new NotFoundException(__('Usuario incorrecto'));
            }
            if ($this->Usuario->delete()) {
                $this->Session->setFlash(__('Usuario borrado exitosamente'));
                $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Hubo un error, por favor intentelo de nuevo.'));
            $this->redirect(array('action' => 'index'));
            }

        public function login() {
            if ($this->request->is('post')) {
            if ($this->Auth->login()) {
             $this->redirect($this->Auth->redirect('/'));
            } else {
              $this->Session->setFlash(__('Nombre de usuario/contraseña incorrecto'));
            }
            }
        }

        public function logout() {
            $this->redirect($this->Auth->logout());
        }
        }
?>