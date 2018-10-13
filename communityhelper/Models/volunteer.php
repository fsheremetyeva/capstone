<?
class volunteer{
  public function __construct($parent){

    $this->db = $parent;

  }

  public function select($sql, $value=array()){
    $this->sql = $this->db->prepare($sql);
    $result = $this->sql->execute($value);
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
  public function update_volunteer_data($id, $new, $image){
    $fields = array(
      ':id' => $id,
      ':name' => $new['name'],
      ':zip' => $new['zip'],
      ':phone' => $new['phone'],
      ':association' => $new['association']
    );

    if(isset($image['tmp_name'])){
      $image_blob = file_get_contents($image['tmp_name']);

      if(!empty($image_blob)){
      $finfo = new finfo(FILEINFO_MIME);
      $mime = $finfo->file($image['tmp_name']);
      $mime = substr($mime, 0, strpos($mime, ';'));
      CHController::getModel('volunteer')->update('UPDATE volunteer SET avatar = :avatar, avatar_mime = :avatar_mime WHERE id = :id', array(':avatar' => $image_blob, ':avatar_mime' => $mime, ':id' => $id));
    }
    }
    return $this->update('UPDATE volunteer SET name = :name, zip = :zip, phone = :phone, association = :association WHERE id = :id', $fields);
  }
  public function add_new_record($name_id, $date, $organization_id, $duration, $notes){
    $fields = array(
      ':notes' => $notes,
      ':duration' => $duration,
      ':date' => $date,
      ':organization_id' => $organization_id,
      ':name_id' => $name_id
      );
    $x = CHController::getModel('volunteer')->add('INSERT INTO volunteer_records (date, organization_id, name_id, duration, notes) VALUES (:date, :organization_id, :name_id, :duration, :notes)', $fields);
  }
  public function update_record($name_id, $date, $organization_id, $duration, $notes, $record_id){
    $fields = array(
      ':notes' => $notes,
      ':duration' => $duration,
      ':date' => $date,
      ':organization_id' => $organization_id,
      ':name_id' => $name_id,
      ':record_id' => $record_id
      );
    return $this->update('UPDATE volunteer_records SET date = :date, organization_id = :organization_id, name_id = :name_id, duration = :duration, notes = :notes WHERE id = :record_id', $fields);
  }

}
?>
