<?php
require_once 'vendor/autoload.php';

//Dados de conexão com o banco de dados
$host = 'localhost';
$dbname = 'biblioteca';
$username = 'root';
$password = '';

try{
    //Conexão com o banco de dados usando PDO
    $pdo = new PDO('mysql:host=' .$host. ';dbname=' .$dbname. ';charset=utf8', $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT titulo, autor, ano_publicacao, resumo FROM livros";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    //Recupera os dados dos livros
    $livros = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //Cria a instância do PDF
    $mpdf = new \Mpdf\Mpdf();

    //Configura o conteúdo do PDF
    $html = '<h1>Biblioteca - Lista de Livros</h1>';
    $html .= '<table border="1" cellpadding="10" cellspacing="0" width="100%">';
    $html .= '<tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Ano de Publicação</th>
                <th>Resumo</th>
            </tr>';

    //Popula o HTML com os dados dos livros
    foreach ($livros as $livro) {
        $html .= '<tr>';
        $html .= '<td>' . htmlspecialchars($livro['titulo']) .'</td>';
        $html .= '<td>' . htmlspecialchars($livro['titulo']) . '</td>';
        $html .= '<td>' . htmlspecialchars($livro['titulo']) . '</td>';
        $html .= '<td>' . htmlspecialchars($livro['titulo']) . '</td>';
        $html .= '<tr>';
    }

    $html .= '</table>';

    // Escreve o conteúdo HTML do PDF
    $mpdf->WriteHTML($html);

    // Gera o PDF e força o download
    $mpdf->Output('lista_de_livros.pdf',\Mpdf\Output\Destination::DOWNLOAD);

} catch(PDOException $e) {
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
} catch(PDOException $e) {
    echo "Erro ao gerar o PDF: " . $e->getMessage();
}

?>