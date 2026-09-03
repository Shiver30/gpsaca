<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GPSaCA - Grupo de Pesquisa</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }

        /* CABEÇALHO */

        header {
            background-color: #ffffff;
            padding: 20px 8%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
            color: #2e7d32;
        }

        nav {
            display: flex;
            gap: 25px;
        }

        nav a {
            text-decoration: none;
            color: #333;
            font-size: 15px;
            font-weight: bold;
        }

        nav a:hover {
            color: #2e7d32;
        }

        /* APRESENTAÇÃO */

        .inicio {
            background-color: #ffffff;
            padding: 80px 8%;
            text-align: center;
        }

        .inicio h1 {
            font-size: 42px;
            color: #2e7d32;
            margin-bottom: 20px;
        }

        .inicio h2 {
            font-size: 22px;
            font-weight: normal;
            color: #555;
            margin-bottom: 25px;
        }

        .inicio p {
            max-width: 900px;
            margin: auto;
            line-height: 1.7;
            font-size: 17px;
            color: #555;
        }

        /* BOTÃO */

        .botao {
            display: inline-block;
            margin-top: 35px;
            padding: 13px 25px;
            background-color: #2e7d32;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .botao:hover {
            background-color: #256428;
        }

        /* CARDS */

        .conteudo {
            padding: 60px 8%;
        }

        .conteudo h2 {
            text-align: center;
            margin-bottom: 40px;
            color: #2e7d32;
        }

        .cards {
            display: flex;
            justify-content: center;
            gap: 25px;
            flex-wrap: wrap;
        }

        .card {
            background-color: white;
            width: 250px;
            padding: 30px;
            text-align: center;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .card h3 {
            color: #2e7d32;
            margin-bottom: 15px;
        }

        .card p {
            color: #666;
            line-height: 1.5;
        }

        /* RODAPÉ */

        footer {
            background-color: #2e7d32;
            color: white;
            text-align: center;
            padding: 25px;
            margin-top: 30px;
        }

        @media (max-width: 768px) {

            header {
                flex-direction: column;
                gap: 20px;
                padding: 20px;
            }

            nav {
                flex-wrap: wrap;
                justify-content: center;
                gap: 15px;
            }

            nav a {
                font-size: 14px;
            }

            .inicio {
                padding: 50px 20px;
            }

            .inicio h1 {
                font-size: 32px;
            }

            .inicio h2 {
                font-size: 20px;
            }

            .inicio p {
                font-size: 16px;
            }

            .conteudo {
                padding: 40px 20px;
            }

            .cards {
                flex-direction: column;
                align-items: center;
            }

            .card {
                width: 100%;
                max-width: 400px;
            }

        }
    </style>

</head>

<body>


    <?php include "componentes/cabecalho.php"; ?>



    <main>

        <section class="inicio">

            <h1>Seja bem-vindo!!!</h1>

            <h2>Grupo de Pesquisa sobre Saúde da Criança e do Adolescente</h2>

            <p>
                O Grupo de Pesquisa sobre Saúde da Criança e do Adolescente
                (GPSaCA) iniciou suas atividades em 2013, sob coordenação do
                Prof. Matias Noll, e tem como propósito investigar os mais
                variados aspectos relacionados a saúde da criança e do
                adolescente.
            </p>

            <p>Este grupo de pesquisa é sediado no Instituto Federal Goiano -Campus Ceres.</p>

            <a class="botao" href="cadastro/cadastro_equipe.php">Cadastro de Integrante</a>

        </section>


        <section class="conteudo">

            <h2>Conheça o GPSaCA</h2>

            <div class="cards">

                <div class="card">
                    <h3>Equipe</h3>
                    <p>Conheça os integrantes do grupo de pesquisa.</p>
                </div>

                <div class="card">
                    <h3>Publicações</h3>
                    <p>Consulte as publicações e produções científicas realizadas pelo grupo.</p>
                </div>

                <div class="card">
                    <h3>Projetos</h3>
                    <p>Conheça os projetos de pesquisa e extensão desenvolvidos pelo GPSaCA.</p>
                </div>

                <div class="card">
                    <h3>Materiais</h3>
                    <p>Acesse materiais, questionários, manuais e guias produzidos pelo grupo.</p>
                </div>

            </div>
        </section>

    </main>


    <footer>
        <?php include "componentes/rodape.php"; ?>
    </footer>

</body>

</html>