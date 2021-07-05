<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    CUIDADO! Esse cara é um teste oldstyle, com query na view e tudo o mais kkk
    <br>
    ID da execução <?php echo rand(); ?>
    <hr>
    <pre>
        <?php
        try {
            $_this = new stdClass();
            $_this->engine = 'mysql';
            $_this->host = 'mysql';
            $_this->database = 'teste';
            $_this->user = 'root';
            $_this->pass = 'carlos123';
            $dns = "{$_this->engine}:port=3306;dbname={$_this->database};host={$_this->host};";

            $connection = new \PDO($dns, $_this->user, $_this->pass);
            // $stmt = $connection->prepare("insert into 
            //     `teste` (`email`, `firstname`, `lastname`, `reg_date`) 
            //     values (?, ?, ?, now());");
            // $stmt->bindParam(1, rand());
            // $stmt->bindParam(2, rand());
            // $stmt->bindParam(3, rand());
            // $stmt->execute();

            $stmt = $connection->query("SELECT * FROM teste;");
            while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                print_r($row);
                echo '<hr>';
            }
            print_r(get_loaded_extensions());
            print_r(token_get_all("<?php echo \"bla\";"));

            $dom = new DOMDocument;
            $dom->loadXML('<books><book><title>blah</title></book></books>');
            if (!$dom) {
                echo 'Error while parsing the document';
                exit;
            }

            $s = simplexml_import_dom($dom);

            echo $s->book[0]->title;
        } catch (Exception $exception) {
            print_r($exception);
        } catch (Error $error) {
            print_r($error);
        }
        phpinfo();
        ?>
    </pre>
</body>

</html>

<?php
function echoHr($value): void
{
    echo $value;
    echo "<hr>";
}
?>