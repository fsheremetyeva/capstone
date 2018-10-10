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
  public function update_organization_data($id, $new, $image){
    $fields = array(
      ':id' => $id,
      ':name' => $new['name'],
      ':address' => $new['address'],
      ':zip' => $new['zip'],
      ':phone' => $new['phone'],
      ':description' => $new['description']
    );
    if(isset($image['tmp_name'])){
      $image_blob = file_get_contents($image['tmp_name']);

      if(!empty($image_blob))
      {
      $finfo = new finfo(FILEINFO_MIME);
      $mime = $finfo->file($image['tmp_name']);
      $mime = substr($mime, 0, strpos($mime, ';'));
      CHController::getModel('organization')->update('UPDATE organization SET avatar = :avatar, avatar_mime = :avatar_mime WHERE id = :id', array(':avatar' => $image_blob, ':avatar_mime' => $mime, ':id' => $id));
    }
    }
    return $this->update('UPDATE organization SET name = :name, address = :address, zip = :zip, phone = :phone, description = :description WHERE id = :id', $fields);
  }
  public function getError(){
    return implode(' ', $this->db->errorInfo());
  }
}
?>
