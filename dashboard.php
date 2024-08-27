<?php
    include_once("templates/headerLogin.php");
    include_once("process/orders.php");

?>
<style>

.select-container {
    position: relative;
    display: inline-block;
}

.select-container select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
    cursor: pointer;
}

.select-container::after {
    content: '\25BC'; /* Símbolo de seta para baixo ▼ */
    font-size: 16px;
    color: #555;
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
}

/* Estilo para os botões (apenas para referência, ajuste conforme necessário) */

.confirm-btn, .delete-btn {
    padding: 10px 20px;
    font-size: 14px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    color: #fff;
}

.confirm-btn {
    background-color: #4caf50; /* Verde */
}

.delete-btn {
    background-color: #f44336; /* Vermelho */
}
</style>
    <div id="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Confira seu Pedido:</h2>
                </div>
                <div class="col-md-12 table-container">
                    <table class="table">
                     <thead>
                        <tr>
                            <th scope="col"><span>Pedido</span></th>
                            <th scope="col"><span>Tamanho</span></th>
                            <th scope="col"><span>Borda</span></th>
                            <th scope="col"><span>Massa</span></th>
                            <th scope="col"><span>Ingredientes</span></th>
                            <th scope="col"><span>Preço</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($pizzas as $pizza):?>
                            <?php $precoTotal = isset($pizza["precoTotal"]) ? $pizza["precoTotal"] : 0; ?>
                            <tr>
                            <td><input type="checkbox" name="selected_orders[]" value="<?=$pizza["id"] ?>"></td>
                            <td><?=$pizza["tamanho"] ?></td>
                            <td><?=$pizza["borda"] ?></td>
                            <td><?=$pizza["massa"] ?></td>
                            
                            <td>
                                <ul class="ingredientes-list" >
                                <?php foreach($pizza["ingredientes"] as $ingrediente):?>
                                    <li><?= $ingrediente; ?></li>
                                <?php endforeach;?>

                                </ul>
                            </td>
                            <td>R$ <?= number_format($precoTotal, 2, ',', '.') ?></td>
                            </tr>

                            
                        <?php endforeach;?>
                    </tbody>
                  </table>
                  </div>
            <!-- Botões de confirmação e cancelamento de pedido -->
            <div class="col-md-12 mt-4 mb-4">
                <button class="confirm-btn" onclick="confirmarPedido()">
                    <p class="confirm">Confirmar Pedido <i class="fas fa-check"></i></p>
                </button>
            </div>
            
 
        </div>
    </div>

    <script>
    function confirmarPedido() {
    var selectedOrders = document.querySelectorAll('input[name="selected_orders[]"]:checked');
    if (selectedOrders.length > 0) {
        alert("Pedido confirmado! Redirecionando para a página de confirmação...");
        window.location.href = "index.php";
    } else {
        alert("Por favor, selecione pelo menos um pedido para confirmar.");
    }
}
</script>
<?php
    include_once("templates/footer.php");
?>
