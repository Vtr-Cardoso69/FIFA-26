FIFA-26

Este projeto é um sistema em PHP para gerenciar jogos, seleções (times),
grupos e usuários da Copa do Mundo 2026.

ESTRUTURA DO PROJETO

index.php
Arquivo principal de entrada do sistema.

BancoVersoes/
Contém arquivos SQL usados para criar e atualizar o banco de dados.

cssGame/
Arquivos CSS das telas relacionadas a jogos.

cssTeam/
Arquivos CSS das telas relacionadas a times.

Fonts/
Fontes utilizadas no sistema.

Sistema/
Pasta principal com toda a lógica do sistema.

Sistema/Controller/
Responsável por conectar a lógica do Model com o Front-End;
Arquivos:
- GameC.php (jogos)
- GroupsC.php (grupos)
- TeamsC.php (times)
- UserC.php (usuários)

Sistema/Model/
Responsável pelo acesso ao banco de dados e criação de funções;
Arquivos:
- GameM.php
- GroupsM.php
- TeamsM.php
- UsersM.php

Sistema/DB/
Responsável pela conexão com o banco de dados.
Arquivo:
- Database.php

Sistema/View/
Responsável pelas telas do sistema.
Pastas:
- Games (telas de jogos)
- Groups (telas de grupos)
- Teams (telas de times)
- Users (telas de usuários)

Participantes:

João-> Responsável pela parte de GAME
Vitor C.-> Responsável pela parte de USER e Conexões.
Pedro -> Responsável pela parte de GROUPS e TEAMS.