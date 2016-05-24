<?php
include'cekLogin.php';
mysql_query("UPDATE tuser SET 
                          last_logout=CURRENT_TIMESTAMP,
                          is_login='0'
                        WHERE
                          user_id='$user_id'
                        ");

session_destroy();
header('Location: ../callCenter');
?>