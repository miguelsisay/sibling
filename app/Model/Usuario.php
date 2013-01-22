<?php
    class Usuario extends AppModel { 

    public function beforeSave($options = array()) {
        $this->data['Usuario']['password'] = AuthComponent::password($this->data['Usuario']['password']);
        return true;
    }

    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Nombre de usuario obligatorio'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Contraseña obligatoria'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('1')),
                'message' => 'Por favor elija un rol',
                'allowEmpty' => false
            )
        )
    );
}
?>