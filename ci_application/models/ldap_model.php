<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Model - LDAP
* 
* Melakukan akses LDAP UI untuk keperluan autentikasi
*
* @author Ricky Arifandi Daniel
* @copyright recrUItment, 24-Apr-2013
* @version 1.2.0.0
* 
*/
class Ldap_model extends CI_Model {

    function auth_ldap($username, $password) {
        // $conn = @ldap_connect("152.118.39.37"); ldap ui, belum bisa dari ppl.cs.ui.ac.id
        $conn = @ldap_connect('ldap://152.118.29.6', 389); //ldap fasilkom
        $opt = @ldap_set_option($conn, LDAP_OPT_PROTOCOL_VERSION, 3);
        // jika berhasil konek
        if($conn) {
            // $filter  = "uid='" . $username . "'";
            $filter  = "uid=" . $username;
            $base_dn = "o=Universitas Indonesia,c=ID";
            $result  = @ldap_search($conn, $base_dn, $filter);
            
            if (!$result) {
                return 'error_gagal_konek';
            }

            // $result = ldap_search($conn, "o=Universitas Indonesia,c=ID", $filter);
            $info   = ldap_get_entries($conn, $result);
            
            if($info['count'] == 0) {
                ldap_close($conn);
                return 'error_username'; //ngga ada username
            }
            
            $DN  = $info[0]["dn"];
            $ret = @ldap_bind($conn, $DN, $password);
            ldap_close($conn);
            
            if(!$ret) {
                return 'error_password';
            }
            
            return $info[0];
        } else {
            ldap_close($conn); //koneksi gagal
            return 'error_gagal_konek';
        }
    }

}

/* End of file ldap_model.php */
/* Location: ./application/models/ldap_model.php */
