<?php 
                            $link = mysqli_connect("localhost", "root", "") or die("<h2>No se encuentra el servidor</h2>");;
                            $db = mysqli_select_db($link, "cce") or die("<h2>Error de Conexion</h2>");
                            $sql = "SELECT * FROM alumno WHERE matricula = '$_POST[matricula]'";
                            $result = mysqli_query($link, $sql);
                            while ($mostrar = mysqli_fetch_array($result)) {
                                ?>
    
    <tr><td><?php echo $mostrar["matricula"] ?></td>
    <td><?php echo $mostrar["nombrealumno"] ?></td>
    <td><?php echo $mostrar["sexo"] ?></td>
    <td><?php echo $mostrar["carrera"] ?></td>
    <td><?php echo $mostrar["semestre"] ?></td></tr>
      <?php
                            }
                            ?>