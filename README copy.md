# ETL FFLCH

[![eng](https://img.shields.io/badge/lang-en-red.svg)](https://github.com/fflch/etl/blob/master/README.eng.md)

## Descrição



## Instruções para deploy

**1.** Primeiro, instale todas as dependências do projeto:

```sh
composer install
```

**2.** Faça uma cópia do arquivo *.env.example* e configure corretamente sua *.env* com as credenciais de acesso e as configurações do Replicado USP e de um banco de dados MySQL/MariaDB local:

```sh
cp .env.example .env
```

**3.** Após configurado o seu banco de dados local, você pode criar (ou recriar) as tabelas com:

```sh
php builder.php
```

(Para ignorar o prompt de confirmação e forçar a recriação das tabelas, você pode passar o parâmetro `-y`.)

**4.** Depois de criadas as tabelas, você pode inserir (ou atualizar) os dados sempre que necessário com:

```sh
php main.php
```

(Para forçar a construção/reconstrução ao executar o main.php, você pode passar o parâmetro `-f`.)

**5.** Para verificar a última vez que os scripts ETL foram executados, use o script `check.php`:

```sh
php check.php
```

**6.**  Finalmente, se você quiser dropar todas as tabelas, você pode executar:

```sh
php drop.php
```