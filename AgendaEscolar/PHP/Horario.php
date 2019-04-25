<div class="span7">
  <div class="widget stacked widget-table action-table">

    <div class="widget-header">
      <h3>Horario</h3>
    </div> <!-- /widget-header -->

    <div class="widget-content">

      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Hora</th>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miercoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
            <th>Sabado</th>
          </tr>
        </thead>
        <tbody>
          <?php
            

            echo "<Script>alert(".$username.")</Script>";
            /*$query = 'SELECT * FROM Horario WHERE NombreUsuario="'.$username.'" AND Dia="Lunes" ORDER By HrInicio asc';
            $result = mysqli_query($con, $query) or die('Consulta fallida: ' . mysqli_error($con));
            while($row = mysqli_fetch_assoc($result)){?>
              <tr>
                <td><?php echo $row['HrInicio'] ?></td>
                <td><?php echo $row['Materia'];?><br><?php echo $row['Lugar'] ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            <?php*/};
          ?>
          
        </tbody>
      </table>

    </div> <!-- /widget-content -->

  </div> <!-- /widget -->
</div>