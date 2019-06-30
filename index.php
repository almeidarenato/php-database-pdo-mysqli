<?php
include_once 'includes/dbh-inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP Connection Test</title>
  <link rel="stylesheet" href="bulma/css/bulma.min.css">
</head>

<body>
  <section class="section">
    <div class="container">
      <h1 class='title'>Teste de conexão com base de dados em PHP</h1>
      <h2 class='subtitle'> Utilizando Prepared Statements </h2>

      <?php
      $sql = 'SELECT * FROM users';
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);
      ?>
      <table class=" table ">
        <thead>
          <tr>
            <th>id</th>
            <th>Login</th>
            <th>Acesso</th>
            <th>Ativo</th>
          </tr>
        </thead>
        <?php
        // verifica se o numero de linhas retornado é maior que 1 
        if ($resultCheck == 0) {
          echo 'não há linhas';
        } else
          while ($row = mysqli_fetch_assoc($result)) {

            ?>
          <tbody>
            <tr>
              <td scope=" row "><?php echo $row['id'] ?></td>
              <td><?php echo $row['login'] ?></td>
              <td><?php echo $row['nivel_acesso'] ?></td>
              <td><?php echo $row['ativo'] ?></td>
            </tr>
          </tbody>

        <?php } ?>
      </table>
    </div>
  </section>

</html>