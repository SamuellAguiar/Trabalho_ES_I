<?php

include_once("conn.php");

// Função para obter os pedidos
function obterPedidos($conn)
{
  $pedidosQuery = $conn->query("SELECT * FROM pedidos;");
  return $pedidosQuery->fetchAll(PDO::FETCH_ASSOC);
}

// Função para buscar dados da pizza pelo ID
function buscarPizza($conn, $pizzaId)
{
  $pizzaQuery = $conn->prepare("SELECT * FROM pizzas WHERE id = :pizza_id");
  $pizzaQuery->bindParam(":pizza_id", $pizzaId);
  $pizzaQuery->execute();
  return $pizzaQuery->fetch(PDO::FETCH_ASSOC);
}

// Função para buscar o tamanho da pizza
function buscarTamanho($conn, $tamanhoId)
{
  $tamanhoQuery = $conn->prepare("SELECT * FROM tamanhos WHERE id = :tamanho_id");
  $tamanhoQuery->bindParam(":tamanho_id", $tamanhoId);
  $tamanhoQuery->execute();
  return $tamanhoQuery->fetch(PDO::FETCH_ASSOC)["tipo"];
}

// Função para buscar a borda da pizza
function buscarBorda($conn, $bordaId)
{
  $bordaQuery = $conn->prepare("SELECT * FROM bordas WHERE id = :borda_id");
  $bordaQuery->bindParam(":borda_id", $bordaId);
  $bordaQuery->execute();
  return $bordaQuery->fetch(PDO::FETCH_ASSOC)["tipo"];
}

// Função para buscar a massa da pizza
function buscarMassa($conn, $massaId)
{
  $massaQuery = $conn->prepare("SELECT * FROM massas WHERE id = :massa_id");
  $massaQuery->bindParam(":massa_id", $massaId);
  $massaQuery->execute();
  return $massaQuery->fetch(PDO::FETCH_ASSOC)["tipo"];
}

// Função para buscar os ingredientes da pizza
function buscarIngredientes($conn, $pizzaId)
{
  $ingredientesQuery = $conn->prepare("SELECT * FROM pizza_ingrediente WHERE pizza_id = :pizza_id");
  $ingredientesQuery->bindParam(":pizza_id", $pizzaId);
  $ingredientesQuery->execute();
  return $ingredientesQuery->fetchAll(PDO::FETCH_ASSOC);
}

// Função para buscar o nome dos ingredientes
function buscarNomeIngrediente($conn, $ingredienteId)
{
  $ingredienteQuery = $conn->prepare("SELECT * FROM ingredientes WHERE id = :ingrediente_id");
  $ingredienteQuery->bindParam(":ingrediente_id", $ingredienteId);
  $ingredienteQuery->execute();
  return $ingredienteQuery->fetch(PDO::FETCH_ASSOC)["nome"];
}

// Função para montar a pizza a partir do pedido
function montarPizza($conn, $pedidos)
{
  $pizzas = [];

  foreach ($pedidos as $pedido) {
    $pizza = [];
    $pizza["id"] = $pedido["pizza_id"];

    // Buscar dados da pizza
    $pizzaData = buscarPizza($conn, $pizza["id"]);

    // Buscar tamanho, borda e massa
    $pizza["tamanho"] = buscarTamanho($conn, $pizzaData["tamanho_id"]);
    $pizza["borda"] = buscarBorda($conn, $pizzaData["borda_id"]);
    $pizza["massa"] = buscarMassa($conn, $pizzaData["massa_id"]);

    // Buscar ingredientes
    $ingredientes = buscarIngredientes($conn, $pizza["id"]);
    $ingredientesDaPizza = [];

    foreach ($ingredientes as $ingrediente) {
      $nomeIngrediente = buscarNomeIngrediente($conn, $ingrediente["ingrediente_id"]);
      array_push($ingredientesDaPizza, $nomeIngrediente);
    }

    $pizza["ingredientes"] = $ingredientesDaPizza;

    // Adicionar preço total da pizza
    $pizza["precoTotal"] = $pedido["preco_total"];

    // Adicionar ao array de pizzas
    array_push($pizzas, $pizza);
  }

  return $pizzas;
}

// Função para deletar pedidos
function deletarPedidos($conn, $selectedOrders)
{
  if (!empty($selectedOrders)) {
    $placeholders = implode(',', array_fill(0, count($selectedOrders), '?'));
    $deleteQuery = $conn->prepare("DELETE FROM pedidos WHERE pizza_id IN ($placeholders)");

    foreach ($selectedOrders as $index => $pizzaId) {
      $deleteQuery->bindValue($index + 1, $pizzaId, PDO::PARAM_INT);
    }

    $deleteQuery->execute();
    $_SESSION["msg"] = "Pedido(s) cancelado(s) com sucesso!";
    $_SESSION["status"] = "success";
  }
}

// Função para inserir um novo pedido
function inserirPedido($conn, $pizzaId, $precoTotal)
{
  $stmt = $conn->prepare("INSERT INTO pedidos (pizza_id, preco_total) VALUES (:pizza_id, :preco_total) ON DUPLICATE KEY UPDATE preco_total = :preco_total");
  $stmt->bindParam(":pizza_id", $pizzaId, PDO::PARAM_INT);
  $stmt->bindParam(":preco_total", $precoTotal, PDO::PARAM_STR);
  $stmt->execute();

  $_SESSION["msg"] = "Pedido inserido com sucesso!";
  $_SESSION["status"] = "success";
}

// Código principal que lida com as requisições
$method = $_SERVER["REQUEST_METHOD"];

if ($method === "GET") {
  $pedidos = obterPedidos($conn);
  $pizzas = montarPizza($conn, $pedidos);

} else if ($method === "POST") {
  $type = $_POST["type"];

  if ($type === "delete") {
    $selectedOrders = isset($_POST["selected_orders"]) ? $_POST["selected_orders"] : [];
    deletarPedidos($conn, $selectedOrders);

  } elseif ($type === "insert") {
    $pizzaId = $_POST["id"];
    $precoTotal = $_POST["preco_total"];
    inserirPedido($conn, $pizzaId, $precoTotal);
  }

  // Redirecionamento após ação
  if (strpos($_SERVER['HTTP_REFERER'], 'admin.php') !== false) {
    header("Location: ../admin.php");
  } else {
    header("Location: ../dashboard.php");
  }

  exit();
}
