<?php
// using ldap bind
$username=$_POST["user_name"];
$password=$_POST["user_password"];
$filter="(uid=$username)";
$ldaprdn  = "uid=$username,ou=faculty,dc=iitmandi,dc=ac,dc=in";     // ldap rdn or dn
// connect to ldap server
$ldapconn = ldap_connect("users.iitmandi.ac.in")
    or die("Could not connect to LDAP server.");
ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
if ($ldapconn)
{

                // binding to ldap server
                $ldapbind = ldap_bind($ldapconn, $ldaprdn, $password);
     
                // verify binding
                if ($ldapbind)
                {
                                $attributes = array("employeeNumber", "sn", "givenName", "mail");
                                $data = ldap_search($ldapconn, $ldaprdn, $filter );
                                $entry = ldap_get_entries($ldapconn, $data);
                                session_start();
                                $_SESSION['logins']= $username;
                                $_SESSION['uname'] = $entry[0]["cn"][0];
                                $_SESSION['uemail'] = $entry[0]["mail"][0];
                               // $_SESSION['id'] = $entry[0]["employeenumber"][0];
                                header("location:dashboard.php");

               }
	
        else
	{
                header("location:faculty.html");
        }
}
?>

