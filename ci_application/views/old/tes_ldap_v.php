<?php

if (!empty($query)) {
    $row = $query -> row_array();
} else {
    $row['username'] = '';
    $row['password'] = '';
}

echo form_open('tes_ldap/auth');

echo "Username : ".form_input('username', $row['username'], "size='50' maxlength='100'");
echo "<br/><br/>";
        
echo "Password : ".form_password('password', $row['password'], "size='50' maxlength='150'");
echo "<br/><br/>";

echo form_submit('auth', 'Auth');

echo form_close();

?>
