<?php
class ORM {
	public $db;
		
	public function connect() {
		$this->db = new SQLite3(ROOT_DIR.'/database/sqlite3.db');
	}

	public function create($table, $fields, $values) {
		$create_table = $db->query("CREATE TABLE IF NOT EXISTS $table (id INTEGER PRIMARY KEY)");
		
		foreach ($fields as $field) {
			$alter_table = $db->query("ALTER TABLE $table ADD COLUMN $field INTEGER DEFAULT 0");
		}
		
		$comma_string = implode(', ', $values);
		$result = $db->query("INSERT INTO $table VALUES ($comma_string)");
		return $result;
	}
	
	public function read($id, $table) {
		$result = $this->db->query("SELECT * FROM $table WHERE id=$id");
		return $result->fetchArray();
	}
	
	public function update($id, $table, $field, $value) {
		$result = $db->query("UPDATE $table SET $field=$value WHERE id=$id");
		return $result;
	}
	
	public function delete($table, $id, $field, $value) {
		if (isset($id)) {
			$result = $db->query("DELETE FROM $table WHERE id=$id");
			return $result;
		} else if (isset($field) && isset($value)) {
			$result = $db->query("DELETE FROM $table WHERE $field=$value");
			return $result;
		} else {
			return 0;
		}
	}
}
?>