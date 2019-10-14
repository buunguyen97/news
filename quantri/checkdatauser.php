<?PHP


require_once "../class/quantritin.php";
$db = new quantritin();
$data = ['result' => 'khong'];
$ketqua ="";
$kq = $db->UserName();
while ($r= $kq->fetch_assoc()){
    $ketqua .=$r['Username']."+";

}
$cuoi =explode('+', $ketqua);


    if(isset($_POST)){
        $username = $_POST['username'];
        foreach ($cuoi as $key =>$value){
            if($username == $value ){
                $data =  ['result' => 'co'];

            }
        }

        header('Content-Type: application/json');
        echo json_encode($data);
    }



