<?php
namespace datatable;
class Tables
{
    public function table($array)
    {
        print '<table>'.'<thead>';
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
}