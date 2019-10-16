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
    function TinMoi($from, $sotin, $lang){
        $sql="SELECT idTin,TieuDe,Ngay,TomTat, urlHinh, loaitin.Ten as TenLT 
     FROM tin, loaitin 
	  WHERE tin.idLT = loaitin.idLT AND tin.AnHien=1 and tin.lang='$lang' 
     ORDER BY idTin DESC LIMIT $from, $sotin";
        $kq = $this->db->query($sql);
        if(!$kq) die('Lỗi trong hàm '.__FUNCTION__.' '. $this->db->error);
        return $kq;
    }
    function TinMoiTrong1Loai($idLT, $from, $sotin, $lang){
        $sql="SELECT idTin,TieuDe,Ngay,TomTat, urlHinh 
     FROM tin WHERE idLT = $idLT AND AnHien=1 and lang='$lang' 
     ORDER BY idTin DESC LIMIT $from, $sotin";
        $kq = $this->db->query($sql);
        if(!$kq) die('Lỗi trong hàm '.__FUNCTION__.' '. $this->db->error);
        return $kq;
    }
    function LayTenLoaiTin($idLT){
        $sql="SELECT Ten FROM loaitin WHERE idLT = $idLT";
        $kq = $this->db->query($sql);
        if(!$kq) die('Lỗi trong hàm '.__FUNCTION__.' '. $this->db->error);
        if ($kq->num_rows<=0) return "";
        $row = $kq->fetch_row();
        $ten= $row[0];
        return $ten;
    }
    function TinNgauNhien($sotin, $lang){
        $sql="SELECT idTin,TieuDe,Ngay,TomTat, urlHinh, loaitin.Ten as TenLT 
     FROM tin, loaitin
	  WHERE tin.idLT = loaitin.idLT AND tin.AnHien=1 and tin.lang='$lang' 
     ORDER BY rand() LIMIT 0, $sotin";
        $kq = $this->db->query($sql);
        if(!$kq) die('Lỗi trong hàm '.__FUNCTION__.' '. $this->db->error);
        return $kq;
    }
    function ListLoaiTin($lang){
        $sql="SELECT idLT, Ten as TenLT FROM loaitin
	  WHERE lang='$lang' AND AnHien=1 ORDER BY ThuTu";
        $kq = $this->db->query($sql);
        if(!$kq) die('Lỗi trong hàm '.__FUNCTION__.' '. $this->db->error);
        return $kq;
    }
    function ListTags($lang){
        $sql="SELECT idTag, TenTag FROM Tags 
	  WHERE lang='$lang' AND AnHien=1 ORDER BY ThuTu";
        $kq = $this->db->query($sql);
        if(!$kq) die('Lỗi trong hàm '.__FUNCTION__.' '. $this->db->error);
        return $kq;
    }
    function TinXemNhieu($from, $sotin, $lang){
        $sql="SELECT idTin,TieuDe,Ngay,TomTat, urlHinh, loaitin.Ten as TenLT 
     FROM tin, loaitin
	  WHERE tin.idLT = loaitin.idLT AND tin.AnHien=1 and tin.lang='$lang' 
     ORDER BY SoLanXem DESC LIMIT $from, $sotin";
        $kq = $this->db->query($sql);
        if(!$kq) die('Lỗi trong hàm '.__FUNCTION__.' '. $this->db->error);
        return $kq;
    }
    function TinMoiCoPhanHoi($from, $sotin, $lang){
        $sql="SELECT idTin,TieuDe,Ngay,TomTat, urlHinh, loaitin.Ten as TenLT 
     FROM tin, loaitin
	  WHERE tin.idLT = loaitin.idLT AND tin.AnHien=1 and tin.lang='$lang' 
	  AND idTin in (
		SELECT DISTINCT idTin From YKien ORDER By Ngay DESC		
	  ) 
    ORDER BY idTin ASC LIMIT $from, $sotin";
        $kq = $this->db->query($sql);
        if(!$kq) die('Lỗi trong hàm '.__FUNCTION__.' '. $this->db->error);
        return $kq;
    }
    function ListTheLoai($lang){
        $sql="SELECT idTL, TenTL  FROM theloai
	  WHERE AnHien=1 and lang='$lang' ORDER BY ThuTu ";
        $kq = $this->db->query($sql);
        if(!$kq) die('Lỗi trong hàm '.__FUNCTION__.' '. $this->db->error);
        return $kq;
    }
    function ListLoaiTinTrong1TheLoai ($idTL){
        $sql="SELECT idLT, Ten  FROM loaitin
	  WHERE AnHien=1 and idTL=$idTL ORDER BY ThuTu ";
        $kq = $this->db->query($sql);
        if(!$kq) die('Lỗi trong hàm '.__FUNCTION__.' '. $this->db->error);
        return $kq;
    }
    function TinMoiNhan($sotin, $lang){
        $sql="SELECT idTin,TieuDe, Ngay
     FROM tin  WHERE idTL=22 AND lang='$lang' 
     LIMIT 0, $sotin";
        $kq = $this->db->query($sql);
        if(!$kq) die('Lỗi trong hàm '.__FUNCTION__.' '. $this->db->error);
        return $kq;
    }
    function ChiTietTin($idTin)  {
        settype($idTin, "int");
        $sql="SELECT idTin, TieuDe, TomTat, Ngay, urlHinh, Content, SoLanXem, 
	tin.idLT, Ten, tin.idTL, TenTL
	FROM  tin, loaitin, theloai
	WHERE tin.idLT=loaitin.idLT  AND loaitin.idTL=theloai.idTL AND idTin=$idTin";
        $kq = $this->db-> query($sql);
        if(!$kq) die('Lỗi trong hàm '.__FUNCTION__.' '. $this->db->error);
        if ($kq->num_rows<=0) return FALSE;
        return $kq->fetch_assoc();
    }
    function CapNhatSolanXemTin($idTin){
        settype($idTin,"int");
        $sql = "UPDATE tin SET SolanXem = SoLanXem+1 WHERE idTin = $idTin";
        $this->db->query($sql);
    }


}//tin
?>
