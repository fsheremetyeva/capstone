<?
class organization{
  public function __construct($parent){
    $this->db = $parent;

  }

  public function select($sql, $value=array()){
    $this->sql = $this->db->prepare($sql);
    $result = $this->sql->execute($value);
    if(!$result) print_r($this->sql->errorInfo());
    $data = $this->sql->fetchAll();
    return $data;
  }

  public function add($sql, $value=array()){
    $this->sql = $this->db->prepare($sql);
    $result = $this->sql->execute($value);
    if(!$result) return -1;
    return $result;
  }
  public function delete($sql, $value=array()){
    $this->sql = $this->db->prepare($sql);
    $result = $this->sql->execute($value);
  }

  public function update($sql, $value=array()){
    $this->sql = $this->db->prepare($sql);
    $result = $this->sql->execute($value);

  }
  public function getError(){
    return implode(' ', $this->db->errorInfo());
  }
}
?>
