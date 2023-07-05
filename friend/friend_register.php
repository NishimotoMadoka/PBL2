<?php
require_once __DIR__ . '/../pre.php';
require_once __DIR__ . '/../header.php';

if (isset($_SESSION['friend_register_error'])) {
    $friend_register_error="<script type='text/javascript'>alert('". $_SESSION['friend_register_error'] ."');</script>";
    echo $friend_register_error;
    // echo  $_SESSION['friend_register_error'] ;
    unset($_SESSION['friend_register_error']);
} 
?>

<link rel="stylesheet" href="<?=$friend_register_css?>">

<main>
<div class="form-wrapper">
<div class="form-item">
        <form method="POST" action="./friend_register_db.php">
        <input type="text" name="friend_code" required="required" placeholder="フレンドコードを入力">
        </div>

    



                <div class="button-panel">
                    <!-- <input type="submit" value="追加" class="fbtn" class="button"></td> -->
                    <input type="submit" class="button" title="追加" value="追加"></input>
                </tr>
            </table>
        </form>
    </div>
</main>
<?php
require_once __DIR__ . '/../footer.php';
?>