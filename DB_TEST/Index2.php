<?php
print 'veikia';

class atabase
{
    public function __construct()
    {
        try {
            $this->connection = new PDO('mysql:host=localhost:3307;dbname=db_test', 'root', '');
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         } catch (PDOException $e) {
            print "DB Connection Failed: " . $e->getMessage();
        }
    }
    public function select($sql)
    {
        return $this->connection->query($sql)->fetchAll(PDO::FETCH_OBJ);
    }
    public function deleteInsertEdit($sql, $name)
    {
        return $this->connection->prepare($sql)->execute($name);
    }
}

session_start();

$_SESSION =
[
    'user_id' => 28,
];

$obj = New Database();
$user_id = $_SESSION['user_id'];

$sql = "SELECT `id_posts`, `u_id`, `title`, `text`, `date` FROM `posts` WHERE `u_id` = '$user_id'";
$userPosts = $obj->select($sql);

function table($postArray)
{
    $style="\"padding: 15px; border: 3px solid black; border-collapse: collapse\"";
    print "<table $style>";
    foreach ($postArray as $post) {
        print "<tr>
<td $style>$post->title</td>
<td $style>$post->text</td>
<td $style>$post->date</td>
</tr>";
    }
}
table($userPosts);
?>
