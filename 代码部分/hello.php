<?php
$q = isset($_GET['q'])? htmlspecialchars($_GET['q']) : '';
if($q) {
    if($q =='RUNOOB') {
        echo 'http://www.runoob.com';
    } else if($q =='GOOGLE') {
        echo 'http://www.google.com';
    } else if($q =='TAOBAO') {
        echo 'http://www.taobao.com';
    }
} else {
    ?>
    <form action="" method="get">
        <select name="q">
            <option value="">选择一个站点:</option>
            <option value="RUNOOB">Runoob</option>
            <option value="GOOGLE">Google</option>
            <option value="TAOBAO">Taobao</option>
        </select>
        <input type="submit" value="提交">
    </form>
    <?php
}
?>