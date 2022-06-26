<?php
                $result = mysqli_query($link, "SELECT * FROM usuarios WHERE username = '$user'");
                while ($mostrar = mysqli_fetch_array($result)) {
                ?>

                    <?php

if (isset($cnueva)) {
    

                        $cnueva = $_POST['cnueva'];
                        $crnueva = $_POST['crnueva'];

                            if ($cnueva != $crnueva) {
                                echo "Las contraseñas nuevas no coinciden";
                            }else{
                                $result1 = mysqli_query($link, "UPDATE usuarios SET password = '$cnueva' WHERE username = '$user';");
                            }                         
                        ?>

                <?php
                }
            }                ?>
              