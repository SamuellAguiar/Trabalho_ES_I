
<?php
include_once("templates/headerLogin.php");
include_once("process/orders.php");

?>

                                                
            <div class="col-md-4 mb-4 text-center">
                                    <form action="process/relatorio.php" method="post">
                                        <input type="hidden" name="relatorio" value="usuarios">
                                        <button type="submit" class="btn btn-primary">Relatório de usuários</button>
                                    </form>
                                </div>
                        </div>

                                                
             <div class="col-md-4 mb-4 text-center">
                                    <form action="process/relatorio.php" method="post">
                                        <input type="hidden" name="relatorio" value="pedidos">
                                        <button type="submit" class="btn btn-primary">Relatório de pedidos</button>
                                    </form>
                                </div>

                                                


<?php
// Exemplo básico de inclusão de rodapé
include_once("templates/footer.php");
?>
