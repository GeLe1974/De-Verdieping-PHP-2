<?php




class Quote {

    protected $id=null;
    protected $name;
    protected $quote;

    static $dbTable = 'quotes';

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getQuote()
    {
        return $this->quote;
    }

    /**
     * @param mixed $quote
     */
    public function setQuote($quote)
    {
        $this->quote = $quote;
    }


    /**
     * Quote constructor.
     * Maakt een object "Quote" aan.
     * @param array $quoteArray Indexes zijn #name# en #quote#
     */
    public function __construct($quoteArray=[])
    {
        if(!empty($quoteArray)){
            $this->setName($quoteArray['name']);
            $this->setQuote($quoteArray['quote']);
        }
    }

    public function save()
    {
        if($this->id){
            $query = "UPDATE ". self::$dbTable . " SET name=:name, quote=:quote WHERE id= ".$this->id;
        }else{
            $query = "INSERT INTO ".self::$dbTable." (name,quote) VALUES (:name, :quote)";
        }

        $db = new DB;
        $result = $db->doQuery($query,['name'=>$this->name, 'quote'=>$this->quote]);

        if($result->rowCount()){
            if(!$this->id){
                $this->id = $db->lastInsertId();
            }
            return true;
        }

        return false;


    }

    public function delete()
    {
        if($this->id){
            $query = "DELETE FROM ".self::$dbTable." WHERE id=".$this->id;
            $db = new DB;
            $result = $db->doQuery($query);

            if($result->rowCount()){
                return true;
            }
        }
        return false;
    }

    public static function findById($id)
    {
        $query = "SELECT * FROM " .self::$dbTable. " WHERE id= ".$id;
        $db = new DB;
        $result = $db->doQuery($query);

        return $result->fetchObject(get_called_class());
    }


    public static function getAll($options = [])
    {
        $query = "SELECT * FROM ".self::$dbTable;

        if (isset($options['orderby'])){
            $query .= " ORDER BY ".$options['orderby'];
        }
        if (isset($options['limit'])){
            $query .= " LIMIT " . $options['limit'];
        }

        $db = new \DB();
        $result = $db->doQuery($query);

        return $result->fetchAll(PDO::FETCH_CLASS,get_called_class());
    }

    public function validate()
    {
        $formerrors =[];

        if(empty($this->name)){
            $formerrors['name']  ='Name is required';
        }
        if(empty($this->quote)){
            $formerrors['quote'] = 'Quote is required';
        }
        return $formerrors;

    }

}