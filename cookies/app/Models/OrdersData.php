<?php
/**
 * Created by PhpStorm.
 * User: tadaspetruskevicius
 * Date: 2019-11-13
 * Time: 11:49
 */

namespace Order;

use database\Database;

class OrdersData extends Database
{
    public function deleteOrder()
    {

        if (isset($_POST['Del'])) {
            $del_array = new Database();

            $sql_del = "DELETE FROM `flower_order` WHERE `email_order` = :email_order";
            $param_del = [
                'email_order' => $_POST['email_del'],
            ];
            $del_array->insert_update_remove($sql_del, $param_del);
        }


        print "
            <form action=\"\" method=\"post\" class=\"delete\">
            <h2>DELETE</h2>
                <input type=\"email\" name=\"email_del\" placeholder=\"email_delete\">
                <input type=\"submit\" value=\"Del\" name=\"Del\">
            </form>
        ";
    }

    public function insertOrder()
    {
        if (isset($_POST['insert'])) {
            $insert_array = new Database();

            $sql_insert = "INSERT INTO `flower_order`(`email_order`, `flower_name`, `unit_order`, `boxing_order`) VALUES (:email_order, :flower_name, :unit_order, :boxing_order)";
            $param_insert = [
                'email_order' => $_POST['email_order_insert'],
                'flower_name' => $_POST['flower_name_insert'],
                'unit_order' => $_POST['unit_order_insert'],
                'boxing_order' => $_POST['boxing_order_insert'],
            ];
            $insert_array->insert_update_remove($sql_insert, $param_insert);
        }

        print "
                <form class=\"form-detail\" action=\"#\" method=\"post\">
                    <h2>INSERT</h2>
                    <div class=\"form-row\">
                        <input type=\"email\" name=\"email_order_insert\" id=\"full-email\" class=\"input-text\" placeholder=\"Email Address\"
                               required>
                    </div>
                    <div class=\"form-row\">
                        <select name=\"flower_name_insert\" class=\"input-text\">
                            <option value=\"Tulpes\">Geles</option>
                        </select>
                    </div>
                    <div class=\"form-row\">
                        <input type=\"number\" name=\"unit_order_insert\" id=\"units\" class=\"input-text\" placeholder=\"Units\" required>
                    </div>
                    <div class=\"form-row\">
                        <select name=\"boxing_order_insert\" class=\"input-text\">
                            <option value=\"box\">box</option>
                            <option value=\"just\">just ...</option>
                        </select>
                    </div>
                    <div class=\"form-row-last\">
                        <input type=\"submit\" name=\"insert\" class=\"register\" value=\"Order\">
                    </div>
                </form>
                </section>
        ";

    }

    public function updateOrder()
    {
        if (isset($_POST['update'])) {
            $update_array = new Database();

            $sql_update = 'UPDATE `flower_order` SET `email_order`= :email_order,`flower_name`=:flower_name,`unit_order`=:unit_order,`boxing_order`=:boxing_order WHERE `email_order` = :email_order';
            $param_update = [
                'email_order' => $_POST['email_order'],
                'flower_name' => $_POST['flower_name'],
                'unit_order' => $_POST['unit_order'],
                'boxing_order' => $_POST['boxing_order'],
            ];

            $update_array->insert_update_remove($sql_update, $param_update);
        }

        print "
               <section class=\"form\">
                <form class=\"form-detail\" action=\"#\" method=\"post\">
                    <h2>UPDATE</h2>
                    <div class=\"form-row\">
                        <input type=\"email\" name=\"email_order\" id=\"full-email\" class=\"input-text\" placeholder=\"Email Address\"
                               required>
                    </div>
                    <div class=\"form-row\">
                        <select name=\"flower_name\" class=\"input-text\">
                            <option value=\"1\">Geles</option>
                        </select>
                    </div>
                    <div class=\"form-row\">
                        <input type=\"number\" name=\"unit_order\" id=\"units\" class=\"input-text\" placeholder=\"Units\" required>
                    </div>
                    <div class=\"form-row\">
                        <select name=\"boxing_order\" class=\"input-text\">
                            <option value=\"box\">box</option>
                            <option value=\"just\">just ...</option>
                        </select>
                    </div>
                    <div class=\"form-row-last\">
                        <input type=\"submit\" name=\"update\" class=\"register\" value=\"Order\">
                    </div>
                </form>
        ";
    }

    public function getOrders()
    {
        $order_array = New Database();

        $sql_order = 'SELECT `id_order`, `email_order`, `flower_name`, `unit_order`, `boxing_order` FROM `flower_order`';

        $result_order = $order_array->select($sql_order);

        print "<table><tr><th>Email:</th><th>Flowers:</th><th>Unit:</th><th>Boxing:</th></tr>";
        foreach ($result_order as $value) {
            print '<tr>
        <td>' . $value['email_order'] . '</td>
        <td>' . $value['flower_name'] . '</td>
        <td>' . $value['unit_order'] . '</td>
        <td>' . $value['boxing_order'] . '</td>
            </tr>';
        }
        print "</table>";
    }
}

