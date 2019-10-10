<?php 
require_once "class/goc.php";
class tin extends goc{

    function TinNoiBat($from, $sotin, $lang){
        $sql="SELECT idTin,TieuDe,Ngay,TomTat, urlHinh, loaitin.Ten as TenLT 
         FROM tin, loaitin
          WHERE tin.idLT = loaitin.idLT AND tin.AnHien=1 AND TinNoiBat=1 AND tin.lang='$lang' 
         ORDER BY idTin DESC LIMIT $from, $sotin";
        $kq = $this->db->query($sql);
       if(!$kq) die('Lỗi trong hàm '.__FUNCTION__.' '. $this->db->error);
        return $kq;
    }
    
}//tin
?>
