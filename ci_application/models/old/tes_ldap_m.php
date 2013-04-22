<?php

class Tes_ldap_m extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    function auth_ldap($username, $password) {
        $ldapconn =  ldap_connect('ldap://152.118.39.37', 389) or die("Cannot connect LDAP");
        var_dump($ldapconn);
        $sr = ldap_search($ldapconn, 'o=Universitas Indonesia, c=ID', '(&(uid='.$username.'))');
        var_dump($sr);
        $info = ldap_get_entries($ldapconn, $sr);
        var_dump($info);
        return ldap_bind($ldapconn, $info[0]['dn'], $password);
    }

function cek_ldap($username, $password)
    {
        $conn = @ldap_connect("152.118.39.37");
        $opt = @ldap_set_option($conn, LDAP_OPT_PROTOCOL_VERSION, 3);
        //jika berhasil konek
        if($conn)
        {
		echo "hatch";
            $filter = "uid='".$username."'";
            $result = ldap_search($conn, "o=Universitas Indonesia,c=ID", $filter);
            $info   = ldap_get_entries($conn, $result);
            
            if($info['count']==0)
            {
		echo "count";
                ldap_close($conn);
                return true; //ngga ada username
            }
            
            $nama = $info[0]['cn'][0];
            $npm  = $info[0]['idmhs'][0];
            
            $DN  = $info[0]["dn"];
            $ret = @ldap_bind($conn, $DN, $password);
            ldap_close($conn);
            
            if(!$ret)
            {
		echo "passsalah";
                return false; //pass salah
            }
            $data = array(
                    'nama'      => $nama,
                    'kode'      => $npm,
                    'jabatan'   => "penghuni",
                    'logged_in' => true
                );
            $this->session->set_userdata($data);
            $this->data_session();
            return true;
        } else {
            ldap_close($conn);//koneksi gagal
            return false;
        }
    }

}
?>
