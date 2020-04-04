<?php
class htmlHelper {
    public function formStart( $method = "post", $action = "", $attribute = "" ) {
        print '<form action="' . $action . '" method="' . $method . '".' . $attribute . '>';
    }
    public function formEnd() {
        print '</form>';
    }
    public function text( $name, $value = "", $error = "" ) {
        print '<div class="form-group">
        <label>' . ucwords( $name ) . '</label>
         <input type="text"  class="form-control"  name="' . $name . '" value="' . $value . '"/>
         <span class="error" id="err' . $name . '">' . $error . '</span>
         </div>';
    }
    public function password( $name, $value = "", $error = "" ) {
        print '<div class="form-group">
        <label>' . ucwords( $name ) . '</label>
         <input type="password"  class="form-control"  name="' . $name . '" value="' . $value . '"/>
         <span class="error" id="err' . $name . '">' . $error . '</span>
         </div>';
    }
    public function date( $name, $value = "", $error = "" ) {
        print '<div class="form-group">
        <label>' . ucwords( $name ) . '</label>
         <input type="text"  class="form-control"  name="' . $name . '" value="' . $value . '"/>
         <span class="error" id="err' . $name . '">' . $error . '</span>
         </div>';
    }
    public function textArea($name,$value="",$error=""){
       print'<div class="form-group">
       <label>'.ucwords($name).'</label>
       <textarea class="form-control"$name ="'.$name.'">'.$value.'</textarea>
       <span class="error" id="err'.$name.'">'.$error.'</span>
       </div>';
    }
    public function Select( $name, $table, $value = "", $error = "" ) {
      print '<div class="form-group">
            <label>'.ucwords($name).'</label>
            <select class="form-control" name="'.$name.'">
            <option value="0">selected</value>';
           foreach($table as $row){
               if($row['id'] == $value){
                   print '<option value="'.$row["id"].'" selected>'.$row["name"].'</option>';
               }
               else{
                print '<option value="'.$row["id"].'">'.$row["name"].'</option>';
               }
           } 
        print '</select>
        <span class="error" id="err'.$name.'">'.$error.'</span>
        </div>';   
             
    }
    public function submit( $name = "submit", $value = "submit" ) {
        print '<input type="submit" class="btn btn-primary" value="' . $value . '" name="' . $name . '"/>';
    }
    public function Table( $table, $controller ) {
        print "<table>";
        $i = 0;
        foreach ( $table as $row ) {
            if ( $i <= 0 ) {
                print "<tr>";
                foreach ( $row as $k => $v ) {
                    if ( strtolower( $k ) != "id" ) {
                        print "<td>" . ucwords( $k ) . "</td>";

                    }
                }
                print "</tr>";
            }
            print "<tr>";
            foreach ( $row as $k => $v ) {
                if ( strtolower( $k ) != "id" ) {
                    print "<td>" . $v . "</td>";
                }
            }
            print "<td>
            <a href=\"?controller=" . $controller . "&view=edit&id=" . $row['id'] . "\"/>Edit</a>
            <a href=\"?controller=" . $controller . "&id=" . $row['id'] . "\"/>Delete</a>
            </td>";
            print "</tr>";
            $i++;
        }
        print "</table>";
    }
    public function error( $message ) {
        print '<span class="error">' . $message . '</span>';
    }
    public function errorBlock( $message ) {
        print '<div class="error">' . $message . '</div>';
    }
    public function success( $message ) {
        print '<span class="success">' . $message . '</span>';
    }
    public function successBlock( $message ) {
        print '<div class="success">' . $message . '</div>';
    }
    public function BlockLink($link,$text){
        print '<a href="'.$link.'" class="blockLink">'.$text."</a>";
    }

}
