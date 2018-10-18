<?
class organization{
  public function __construct($parent){
    $this->db = $parent;

  }

  // Setup for MySQL query
  public function select($sql, $value=array()){
    $this->sql = $this->db->prepare($sql);
    $result = $this->sql->execute($value);
    if(!$result) print_r($this->sql->errorInfo());
    $data = $this->sql->fetchAll();
    return $data;
  }

  // Intended to be used for MySQL adds (inserts)
  public function add($sql, $value=array()){
    $this->sql = $this->db->prepare($sql);
    $result = $this->sql->execute($value);
    if(!$result) return -1;
    return $result;
  }

  // Intended to be used for MySQL DELETEs
  public function delete($sql, $value=array()){
    $this->sql = $this->db->prepare($sql);
    $result = $this->sql->execute($value);
  }

// Intended to be used for MySQL UPDATEs
  public function update($sql, $value=array()){
    $this->sql = $this->db->prepare($sql);
    $result = $this->sql->execute($value);
  }
  // Update organization data
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

      if(!empty($image_blob)){
      $finfo = new finfo(FILEINFO_MIME);
      $mime = $finfo->file($image['tmp_name']);
      $mime = substr($mime, 0, strpos($mime, ';'));
      CHController::getModel('organization')->update('UPDATE organization SET avatar = :avatar, avatar_mime = :avatar_mime WHERE id = :id', array(':avatar' => $image_blob, ':avatar_mime' => $mime, ':id' => $id));
    }
    }
    return $this->update('UPDATE organization SET name = :name, address = :address, zip = :zip, phone = :phone, description = :description WHERE id = :id', $fields);
  }
  // Update organization opportunities
  public function update_opportunity($organization_id, $days, $title, $description, $opp_id){
    $fields = array(
      ':title' => $title,
      ':description' => $description,
      ':date' => $days,
      ':organization_id' => $organization_id,
      ':opp_id' => $opp_id
      );
    if(empty($days) && empty($title) && empty($description))
      $x = CHController::getModel('organization')->add('DELETE FROM volunteer_opportunities WHERE organization_id = :organization_id AND id = :opp_id', array(':organization_id' => $organization_id, ':opp_id' => $opp_id));
    else
      $x = CHController::getModel('organization')->add('UPDATE volunteer_opportunities SET title = :title, description = :description, date = :date WHERE organization_id = :organization_id AND id = :opp_id', $fields);
  }
  // Delete a organization opportunity
  public function delete_opportunity($organization_id, $opp_id){
      $x = CHController::getModel('organization')->add('DELETE FROM volunteer_opportunities WHERE organization_id = :organization_id AND id = :opp_id', array(':organization_id' => $organization_id, ':opp_id' => $opp_id));
  }
  // Add a new organization volunteer opportunity
  public function add_new_opportunity($organization_id, $days, $title, $description){
    $fields = array(
      ':title' => $title,
      ':description' => $description,
      ':date' => $days,
      ':organization_id' => $organization_id
      );
    $x = CHController::getModel('organization')->add('INSERT INTO volunteer_opportunities (title, date, description, organization_id) VALUES (:title, :date, :description, :organization_id)', $fields);
  }
  // Search volunteer opportunities
  public function search_opportunities($query)
  {
    $value[':query'] = '%' . $query . '%';
    return $this->select('SELECT *, (SELECT name FROM organization WHERE id = volunteer_opportunities.organization_id LIMIT 1) AS organization, (SELECT avatar FROM organization WHERE id = volunteer_opportunities.organization_id LIMIT 1) AS avatar, (SELECT avatar_mime FROM organization WHERE id = volunteer_opportunities.organization_id LIMIT 1) AS avatar_mime FROM volunteer_opportunities WHERE title LIKE :query OR description LIKE :query OR organization_id IN (SELECT id FROM organization WHERE address LIKE :query OR zip LIKE :query OR description LIKE :query OR NAME LIKE :query) ORDER BY id DESC', $value);
  }
  // Get any PHP PDO / MySQL error for debugging purposes
  public function getError(){
    return implode(' ', $this->db->errorInfo());
  }
}
?>
