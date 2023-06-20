<?php
$db= new mysqli('localhost','root','','company');

if(isset($_POST['mansubmit'])){
    $mname=$_POST['name'];
    $contact=$_POST['contact'];
    $db->query("call add_manufacture('$mname','$contact')");

}

if(isset($_POST['prosubmit'])){
    $pname=$_POST['pname'];
    $price=$_POST['pprice'];
    $mid=$_POST['manufac'];
    $db->query("call add_product(' $pname','$price','$mid')");
}
if(isset($_POST['manusubmit'])){
    $mid= $POST['manufac'];
    $db->query("delete from manufacture where id='$mid'");
}

?>


<form action="" method="post">
    <h2>Manufacture Table</h2>
    <table>
        <tr>
            <td><label for="">Name</label></td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td><label for="">Contact</label></td>
            <td><input type="text" name="contact"></td>
        </tr>
        <tr>
            <td><label for=""></label></td>
            <td><input type="submit" name="mansubmit" value="submit"></td>
        </tr>
    </table>
</form>


<form action="" method="post">
    <h2>Product Table</h2>
    <table>
        <tr>
            <td><label for="">Name</label></td>
            <td><input type="text" name="pname"></td>
        </tr>
        <tr>
            <td><label for="">Price</label></td>
            <td><input type="text" name="pprice"></td>
        </tr>
        <tr>
            <td><label for="manufac">Manufacture Name</label></td>
            <td>
                <select name="manufac">
                    <?php
                     $mfr = $db->query("select * from manufacture");
                     while($data = $mfr->fetch_assoc()){?>

                    <option value="<?=$data['id'] ?>"><?=$data['name'] ?></option>

                    <?php
                    }
                    ?>

                </select>
            </td>
        </tr>
        <tr>
            <td><label for=""></label></td>
            <td><input type="submit" name="prosubmit" value="submit"></td>
        </tr>
    </table>
</form>

<form action="" method="post">
    <table>
        <tr>
            <td><label for="manufac">Manufacture Name</label></td>
            <td>
                <select name="manufac">
                    <?php
                     $mfr = $db->query("select * from manufacture");
                     while($data = $mfr->fetch_assoc()){?>

                    <option value="<?=$data['id'] ?>"><?=$data['name'] ?></option>

                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for=""></label></td>
            <td><input type="submit" name="manusubmit" value="delete"></td>
        </tr>
    </table>
</form>

<h3>View table</h3>