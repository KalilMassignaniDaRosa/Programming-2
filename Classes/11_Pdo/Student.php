<?php
// Student.php
require_once __DIR__ . '/Connection.php';
require_once __DIR__ . '/Model.php';
require_once __DIR__ . '/Repository.php';

class Student extends Model implements Repository
{
    private $name;
    private $age;
    private $email;
    private $course;

    public function __construct(array $data = [])
    {
        if (isset($data['id'])) $this->setId((int)$data['id']);
        if (isset($data['name'])) $this->name = $data['name'];
        if (isset($data['age'])) $this->age = (int)$data['age'];
        if (isset($data['email'])) $this->email = $data['email'];
        if (isset($data['course'])) $this->course = $data['course'];
    }

    /**
     * Create a new student record.
     * Returns inserted ID (int) on success, or false on failure.
     */
    public function create(array $data)
    {
        try {
            $student = new Student($data);
            $student->validate();
            return $this->save($student);
        } catch (Exception $e) {
            error_log("Error creating student: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Validate model fields.
     * Throws Exception on invalid data.
     */
    public function validate()
    {
        if (empty($this->name) || empty($this->email) || empty($this->course)) {
            throw new Exception("Name, email and course are required");
        }

        if (!is_numeric($this->age)) {
            throw new Exception("Age must be a number");
        }
        $age = (int)$this->age;
        if ($age < 16 || $age > 100) {
            throw new Exception("Age must be between 16 and 100");
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email address");
        }

        return true;
    }

    /**
     * Save (insert) into database.
     * Returns inserted ID (int) on success, or false on failure.
     */
    public function save($obj)
    {
        try {
            $pdo = Connection::connect();
            $sql = "INSERT INTO student (student_name, age, email, course)
                    VALUES (:student_name, :age, :email, :course)";
            $stmt = $pdo->prepare($sql);

            // Usa os getters para acessar propriedades privadas
            $stmt->bindValue(':student_name', $obj->getName());
            $stmt->bindValue(':age', $obj->getAge(), PDO::PARAM_INT);
            $stmt->bindValue(':email', $obj->getEmail());
            $stmt->bindValue(':course', $obj->getCourse());

            $ok = $stmt->execute();

            if ($ok) {
                return (int)$pdo->lastInsertId();
            } else {
                $err = $stmt->errorInfo();
                error_log("PDO execute failed in save(): SQLSTATE={$err[0]}, Code={$err[1]}, Message={$err[2]}");
            }

            return false;
        } catch (PDOException $e) {
            error_log("Error saving student: " . $e->getMessage());
            return false;
        }
    }

    /**
     * List all students.
     * Returns array of objects (PDO::FETCH_OBJ).
     */
    public function list()
    {
        try {
            $pdo = Connection::connect();
            $sql = "SELECT id, student_name AS name, age, email, course
                    FROM student
                    ORDER BY student_name ASC";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            error_log("Error listing students: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Get a single student by ID.
     * Returns object or null.
     */
    public function getById($id)
    {
        try {
            $pdo = Connection::connect();
            $sql = "SELECT id, student_name AS name, age, email, course
                    FROM student
                    WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ) ?: null;
        } catch (PDOException $e) {
            error_log("Error getting student by ID: " . $e->getMessage());
            return null;
        }
    }

    public function update(array $data)
    {
        try {
            $student = new Student($data);
            if (!$student->getId()) {
                throw new Exception("ID is required for update");
            }
            $student->validate();

            $pdo = Connection::connect();
            $sql = "UPDATE student
                    SET student_name = :student_name, age = :age, email = :email, course = :course
                    WHERE id = :id";
            $stmt = $pdo->prepare($sql);

            // Usa os getters
            $stmt->bindValue(':student_name', $student->getName());
            $stmt->bindValue(':age', $student->getAge(), PDO::PARAM_INT);
            $stmt->bindValue(':email', $student->getEmail());
            $stmt->bindValue(':course', $student->getCourse());
            $stmt->bindValue(':id', $student->getId(), PDO::PARAM_INT);

            $ok = $stmt->execute();
            if (!$ok) {
                $err = $stmt->errorInfo();
                error_log("PDO execute failed in update(): SQLSTATE={$err[0]}, Code={$err[1]}, Message={$err[2]}");
            }
            return $ok;
        } catch (Exception $e) {
            error_log("Error updating student: " . $e->getMessage());
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $pdo = Connection::connect();
            $sql = "DELETE FROM student WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
            $ok = $stmt->execute();

            if (!$ok) {
                $err = $stmt->errorInfo();
                error_log("PDO execute failed in delete(): SQLSTATE={$err[0]}, Code={$err[1]}, Message={$err[2]}");
            }
            return $ok;
        } catch (PDOException $e) {
            error_log("Error deleting student: " . $e->getMessage());
            return false;
        }
    }

    #region Getters/Setters
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getAge()
    {
        return (int)$this->age;
    }
    public function setAge($age)
    {
        $this->age = (int)$age;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getCourse()
    {
        return $this->course;
    }
    public function setCourse($course)
    {
        $this->course = $course;
    }
    #endregion
}
