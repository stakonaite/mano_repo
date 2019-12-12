<?php

namespace form;

use datatable\Tables;

class Forms
{
    public function deleteForm()
    {
        print "
            <form method='post'>
                <input type='text' placeholder='email' name='user_email'>
                <input type='submit' value='Delete' name='delete'>
            </form>
        ";
    }

    public function insertEditUserForm()
    {
        print "
            <form method='post'>
                <input type='text' placeholder='user name' name='user_name'>
                <input type='email' placeholder='e-mail' name='user_email'>
                <input type='password' placeholder='password' name='user_psw'>
                <input type='submit' value='Insert' name='insert'>
                <input type='submit' value='Edit' name='edit'>
            </form>
        ";
    }

    public function loginForm()
    {
        print "
        <div>
            <h2>Prisijungimas</h2>
            <form method='post'>
            <input type='email' placeholder='Email:' name='user_email'>
            <input type='password' placeholder='Password:' name='user_psw'>
            <input type='submit' placeholder='Register' name='login'>
            </form>
        </div>
        ";
    }

    public function registerForm()
    {
        print "
        <div>
            <h2>Registracija</h2>
            <form method='post'>
            <input type='text' placeholder='username:' name='user_name'>
            <input type='email' placeholder='Email:' name='user_email'>
            <input type='password' placeholder='Password:' name='user_psw'>
            <input type='submit' placeholder='Login' name='register'>
            </form>
        </div>
        ";
    }
    public function editForm(){
        $table = New Tables();
        $data = $table->getSubject($_SESSION['post_id']);

        $title = $data[0]->title;
        $text = $data[0]->text;
        print "
        <form method='post'>
        <input type='text' placeholder='Title' value='$title' name='title'>
        <textarea id='' cols='30' rows='10' placeholder='Text' name='text'>$text</textarea>
        <input type='submit' placeholder='Sent new data' name='update'>
        </form>
        ";
    }
}