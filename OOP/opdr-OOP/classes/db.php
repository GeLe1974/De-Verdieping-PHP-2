<?php




class DB
{


    protected $conn;

    // ingestelde variabelen voor DB en Foutmeldingen aan/uit
    protected $db = 'database.sqlite';
    protected $showErrors = true;


    /**
     * DB constructor.
     * maakt db-connectie klaar
     *
     */
    public function __construct()
    {
        $conn = new PDO("sqlite:" . $this->db);


        if ($this->showErrors) {
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        }
        $this->conn = $conn;
    }

    /**
     * @param $query voert query uit met data
     * @param array $data
     * @return mixed
     *
     */
    public function doQuery($query, $data = [])
    {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute($data);
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
        return $stmt;
    }

    public function lastInsertId()
    {
        return $this->conn->lastInsertId();
    }


    function dbInsert($table, $data)
    {

        //INSERT INTO table (column1, column2,...) VALUES (:value1, :value2, ...)

        $keys = [];
        foreach ($data as $key => $value) {
            $keys[] = $key;
        }

        //:value1, :value2
        $values = ':' . implode(',:', $keys);
        //column1,column2
        $keys = implode(',', $keys);

        $query = "INSERT INTO $table ($keys) VALUES ($values)";

        $conn = dbConnect();
        $stmt = dbQuery($conn, $query, $data);

        return ($stmt->rowCount()) ? $conn->lastInsertId() : false;
    }


    function dbDelete($table, $id)
    {
        $query = "DELETE FROM $table WHERE id=:id";
        $conn = dbConnect();
        $stmt = dbQuery($conn, $query, ['id' => $id]);

        return ($stmt->rowCount()) ? true : false;

    }

    function dbUpdate($table, $id, $data)
    {

        $values = [];
        foreach ($data as $key => $value) {
            $values[] = "$key=:$key";
        }
        $values = implode(', ', $values);
        $keys = '';

        $data['id'] = $id;
        $query = "UPDATE $table SET $values WHERE id=:id";

        $conn = dbConnect();
        $stmt = dbQuery($conn, $query, $data);

        return ($stmt->rowCount()) ? true : false;

    }

    /**
     * @param $table
     * @param array $options
     * @param array $data
     * @return mixed
     */
    function dbSelect($table, $options = [], $data = [])
    {

        //to use: $options['cols'] = 'column1, column2'
        $cols = '*';
        if (isset($options['cols'])) {
            $cols = $options['cols'];
        }
        $query = "SELECT $cols FROM $table";


        //to use :  $options['where']= 'id=3'
        //          $options['where'] = 'id=:id'
        if (isset($options['where']) && !empty($options['where'])) {
            $query = " WHERE {$options['where']}";
        }


        // use: $options['orderby'] = 'achternaam DESC';
        if (isset($options['orderby'])) {
            $query .= " ORDER BY {$options['orderby']}";
        }

        // use: $options['limit'] = '3,5';
        if (isset($options['limit'])) {
            $query .= " LIMIT {$options['limit']}";
        }

        $conn = dbConnect();
        $stmt = dbQuery($conn, $query, $data);

        return $stmt;


        /*  Gebruik van de functie
         * ========================
         * $options = [
         *      'where' => 'voornaam=:voornaam',
         *      'orderby' => 'achternaam DESC',
         *      'limit' => 5
         * ];
         *
         * $data = ['voornaam'=>'bert'];
         * $result = dbSelect('gebruikers', $options, $data);
         * $gebruikers = $result->fetchAll();
         *
         */


    }
}