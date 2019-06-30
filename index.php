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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/kognise/water.css@latest/dist/dark.min.css">
</head>

<body>
  <section>
    <div>
      <h1>Teste de conexão com base de dados em PHP</h1>
      <h2> Utilizando Prepared Statements </h2>

      <?php
      $sql = 'SELECT * FROM users';
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);
      if ($resultCheck == 0) {
        echo '<mark> sem resultados </mark>';
      } else {
        ?>
        <table>
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
          <?php }
        }
        ?>
      </table>
    </div>
  </section>
  <section>
    <div>
      <h2> Utilizando PDO </h2>
      <table>
        <?php
        $query = 'SELECT * FROM users WHERE ativo=:ativo';
        $parametro = 1;
        $safeSearch = $pdo->prepare($query);
        $safeSearch->bindValue(':ativo', $parametro, PDO::PARAM_BOOL);
        $safeSearch->execute();
        if ($safeSearch->rowCount() == 0) {
          echo '<mark> sem resultados </mark>';
        } else { ?>
          <table>
            <thead>
              <tr>
                <th>id</th>
                <th>Login</th>
                <th>Acesso</th>
                <th>Ativo</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $result = $safeSearch->fetchAll();
              foreach ($result as $arrays) {
                ?>

                <tr>
                  <td><?php echo $arrays['id']; ?></td>
                  <td><?php echo $arrays['login']; ?></td>
                  <td><?php echo $arrays['nivel_acesso']; ?></td>
                  <td><?php echo $arrays['ativo']; ?></td>
                </tr>
              <?php }
            } ?>
          </tbody>
        </table>
    </div>
  </section>

</html>