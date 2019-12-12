<?php

namespace datatable;
use database\Database;

class Tables
{
    public function table($array)
    {
        print '<table>' . '<thead>';
        foreach ($array as $objarray) {
            print '<tr>';
            foreach ($objarray as $key => $value) {
                print '<th>' . $key . '</th>';
            }
            print '</tr>';
            break;
        }
        print '</thead>';
        foreach ($array as $objarray) {
            print '<tr>';
            foreach ($objarray as $value) {
                print '<td>' . $value . '</td>';
            }
            print '</tr>';
        }
        print '</table>';
    }

    public function userPostsTable($postsArrayById)
    {
        print '<form method="Post"><table>';
        foreach ($postsArrayById as $post) {
            print "
        <tr>
        <td><input name='post_id' type='checkbox' value='$post->id_posts'></td>
        <td>$post->title</td>
        <td>$post->text</td>
        <td>$post->date</td>
        <td>$post->updated_at</td>
        </tr>
        ";
        }
        print '<input type="submit" value="Update" name="update"></table></form>';
    }

    public function getSubject($post_id)
    {
        $db = New Database();
        $sql = "SELECT `title`, `text`, `date` FROM `posts` WHERE `id_posts` = '$post_id'";
        return $postData = $db->select($sql);
    }
}