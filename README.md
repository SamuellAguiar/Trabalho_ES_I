## Trabalho de Engenharia de Software I

# Escopo do Sistema
Este projeto consiste em uma aplicação WEB que permite aos usuários criarem e personalizarem seus pedidos de pizza, bem como cancelá-los e ver o valor atualizado em tempo real. Além disso, há uma página para o administrador, que pode gerenciar pedidos, usuários e ingredientes, além de gerar relatórios detalhados.

- **Usuário**
  - Permitir o usuário criar sua pizza.
  - Permitir o usuário remover uma pizza do seu carrinho.
  - Permitir o usuário saber o valor da sua pizza em tempo real.

- **Administrador**
  - Permitir o administrador conferir as pizzas realizadas.
  - Permitir o administrador cancelar um pedido.
  - Permitir o administrador ter um relatório de Ingredientes.
  - Permitir o administrador ter um relatório de Usuários cadastrados.
  - Permitir o administrador ter um relatório de Pedidos.

# Equipe
A equipe é composta por desenvolvedores full-stack, back-end e front-end, cada um responsável por partes específicas do projeto.

- **Cauã Bandeira**  
  - Função: Front End

- **Esdras Almeida**  
  - Função: Back End

- **Gabriel Roberto**  
  - Função: Back End

- **Igor Passos**  
  - Função: Front End

- **Mariana Vieira**  
  - Função: Full Stack

- **Samuell Aguiar**  
  - Função: Full Stack

# Tecnologias
O projeto é desenvolvido utilizando as seguintes tecnologias:

- **Linguagem:** PHP
- **Frameworks:** HTML, CSS, e JavaScript

# Backlog do Produto
O backlog do produto detalha as funcionalidades principais que precisam ser implementadas para atender os requisitos do sistema.

1. **Cadastro de Usuário:**  
   Permitir que novos usuários se cadastrem.
   
2. **Criação de Pedido:**  
   Permitir ao usuário criar um pedido de pizza.
   
3. **Personalização de Pizza:**  
   Permitir ao usuário personalizar sua pizza adicionando ou removendo ingredientes.
   
4. **Cálculo do Valor da Pizza:**  
   Mostrar o valor atualizado da pizza em tempo real enquanto o usuário a personaliza.
   
5. **Informar Forma de Pagamento:**  
   Permitir que o usuário informe a forma de pagamento desejada.
   
6. **Geração de Relatórios de Ingredientes:**  
   Permitir que o administrador gere relatórios com informações sobre os ingredientes disponíveis.
   
7. **Geração de Relatórios de Usuários:**  
   Permitir que o administrador gere relatórios com informações sobre os usuários cadastrados.
   
8. **Geração de Relatórios de Pedidos:**  
   Permitir que o administrador gere relatórios com informações sobre os pedidos realizados.
   
9. **Cancelamento de Pedido pelo Usuário:**  
   Permitir que o usuário cancele um pedido já realizado.
   
10. **Cancelamento de Pedido pelo Administrador:**  
    Permitir que o administrador cancele pedidos em nome dos usuários.

# Backlog da Sprint
O backlog da sprint detalha as histórias de usuário que serão trabalhadas durante a sprint, com as respectivas tarefas e responsáveis.

### História #1: Como usuário, eu gostaria de me cadastrar na aplicação
- **Tarefas e responsáveis:**
  - Configurar o banco de dados para armazenar dados de usuários [Gabriel Roberto - Back-end]
  - Desenvolver a interface de cadastro de usuário [Mariana Vieira - Full-stack]
  - Implementar a lógica de criação de usuário no backend [Esdras Almeida - Back-end]
  - Validar e testar o processo de cadastro [Samuell Aguiar - Full-stack]

### História #2: Como usuário, eu gostaria de criar um pedido
- **Tarefas e responsáveis:**
  - Criar a interface para seleção de pizzas e envio do pedido [Igor Passos - Front-end]
  - Implementar a lógica no backend para criação de pedidos e salvar no banco de dados [Mariana Vieira - Full-stack]
  - Testar a criação de pedidos com diferentes combinações de pizzas [Samuell Aguiar - Full-stack]

### História #3: Como usuário, eu gostaria de personalizar minha pizza
- **Tarefas e responsáveis:**
  - Desenvolver a interface para adicionar/remover ingredientes da pizza [Esdras Almeida - Back-end]
  - Implementar a lógica no backend para manipulação dos ingredientes [Gabriel Roberto - Back-end]
  - Testar a personalização da pizza, garantindo que as alterações sejam salvas corretamente [Mariana Vieira - Full-stack]

### História #4: Como usuário, eu gostaria de ver o valor atualizado da pizza em tempo real
- **Tarefas e responsáveis:**
  - Implementar a lógica no frontend para calcular o preço da pizza conforme os ingredientes são adicionados/removidos [Cauã Bandeira - Front-end]
  - Desenvolver a lógica para fornecer o valor dos ingredientes e calcular o preço total [Igor Passos - Front-end]
  - Testar o cálculo em tempo real para garantir a precisão dos preços [Samuell Aguiar - Full-stack]

### História #5: Como usuário, eu gostaria de informar a forma de pagamento
- **Tarefas e responsáveis:**
  - Desenvolver a interface de escolha de forma de pagamento [Esdras Almeida - Back-end]
  - Testar a interface de pagamento [Mariana Vieira - Full-stack]

### História #6: Como administrador, eu gostaria de gerar relatórios de ingredientes
- **Tarefas e responsáveis:**
  - Criar a interface para geração de relatórios de ingredientes [Cauã Bandeira - Front-end]
  - Desenvolver a lógica no backend para buscar e formatar dados de ingredientes [Gabriel Roberto - Back-end]
  - Testar os relatórios gerados [Samuell Aguiar - Full-stack]

### História #7: Como administrador, eu gostaria de gerar relatórios de usuários
- **Tarefas e responsáveis:**
  - Criar a interface para geração de relatórios de usuários [Cauã Bandeira - Front-end]
  - Desenvolver a lógica no backend para buscar e formatar dados de usuários [Gabriel Roberto - Back-end]
  - Testar os relatórios gerados [Samuell Aguiar - Full-stack]

### História #8: Como administrador, eu gostaria de gerar relatórios de pedidos
- **Tarefas e responsáveis:**
  - Criar a interface para geração de relatórios de pedidos [Cauã Bandeira - Front-end]
  - Desenvolver a lógica no backend para buscar e formatar dados de pedidos [Gabriel Roberto - Back-end]
  - Testar os relatórios gerados [Samuell Aguiar - Full-stack]

### História #9: Como usuário, eu gostaria de cancelar um pedido
- **Tarefas e responsáveis:**
  - Implementar a interface para cancelamento de pedidos [Igor Passos - Front-end]
  - Desenvolver a lógica no backend para processar o cancelamento de pedidos [Esdras Almeida - Back-end]
  - Testar o fluxo de cancelamento para garantir que o pedido é removido corretamente [Mariana Vieira - Full-stack]

### História #10: Como administrador, eu gostaria de poder cancelar pedidos
- **Tarefas e responsáveis:**
  - Criar a interface de administrador para cancelamento de pedidos [Igor Passos - Front-end]
  - Desenvolver a lógica no backend para que o administrador possa cancelar pedidos [Esdras Almeida - Back-end]
  - Testar o cancelamento de pedidos por parte do administrador [Mariana Vieira - Full-stack]
