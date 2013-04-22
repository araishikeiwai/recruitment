<?php

class Tes_ldap extends CI_Controller {
    
    function __construct() {
        parent :: __construct();
        
        $this -> load -> helper('form');
        $this -> load -> helper('url');
        
        $this -> load -> model('Tes_ldap_m');
        
    }
    
    function index() {
        $this -> load -> view('tes_ldap_v');
    }
    
    function auth() {
        $login['username'] = strtolower($this->input->post('username', true));
        $login['password'] = $this->input->post('password', true);
        //var_dump($login);
        $ldap_auth = $this->Tes_ldap_m->cek_ldap($login['username'], $login['password']);
        var_dump($ldap_auth);
        
        /*if ($ldap_auth) {
            redirect('tes_ldap');
        } else {
            redirect('buku');
        }*/
    }
}

?>
