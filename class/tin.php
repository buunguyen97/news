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
    function TinCuCungLoai($idTin, $lang, $sotin = 5){
        $sql="SELECT idTin, TieuDe, TomTat, urlHinh, Ngay, SoLanXem  FROM  tin 
	WHERE AnHien = 1 AND idTin<$idTin AND  lang ='$lang' 
	AND idLT = (SELECT idLT FROM tin WHERE idTin = $idTin)
	ORDER BY idTin DESC  LIMIT 0, $sotin";
        $kq = $this->db-> query($sql);
        if(!$kq) die( 'Lỗi trong hàm ' . __FUNCTION__. '  '. $this-> db->error);
        return $kq;
    }
    function LuuYKien($idTin, $hoten,$email, $noidung, $loi){
        $loi="";
        settype($idTin, "int");
        $hoten = $this->db->escape_string(trim(strip_tags($hoten)));
        $email = $this->db->escape_string(trim(strip_tags($email)));
        $noidung = $this->db->escape_string(trim(strip_tags($noidung)));
        if ($hoten=="") $loi.="Ban chưa nhập họ tên<br>";
        if ($email=="") $loi.="Ban chưa nhập email<br>";
        if ($noidung=="") $loi.="Ban chưa nhập nội dung ý kiến<br>";
        if (strlen($noidung)<10) $loi.="Nội dung ý kiến quá ngắn<br>";
        if ($loi!="") return FALSE;

        $sql="INSERT INTO ykien (idTin, HoTen, Email, NoiDung, Ngay) VALUES 
   ($idTin,'$hoten', '$email', '$noidung', NOW())";
        $kq = $this->db-> query($sql);
        if(!$kq) die( 'Lỗi trong hàm ' . __FUNCTION__. '  '. $this-> db->error);
        return $kq;
    }
    function LayCacYKienCua1Tin($idTin){
        $sql="SELECT idYKien, HoTen, NoiDung, Ngay FROM  ykien  
	WHERE AnHien = 1 AND idTin=$idTin  
	ORDER BY Ngay DESC";
        $kq = $this->db-> query($sql);
        if(!$kq) die( 'Lỗi trong hàm ' . __FUNCTION__. '  '. $this-> db->error);
        return $kq;
    }
    function LayCacTags($idTin){
        $sql ="SELECT tags FROM tin  WHERE idTin=$idTin";
        $kq = $this->db-> query($sql);
        if(!$kq) die( 'Lỗi trong hàm ' . __FUNCTION__. '  '. $this-> db->error);
        return $kq->fetch_assoc();
    }
    function LayTheLoaiTrongTin($idTin){
        $sql ="SELECT TenTL FROM tin,theloai WHERE tin.idTL = theloai.idTL AND idTin =$idTin ";
        $kq = $this->db-> query($sql);
        if(!$kq) die( 'Lỗi trong hàm ' . __FUNCTION__. '  '. $this-> db->error);
        return $kq->fetch_assoc();
    }

    function TinTrongLoai($idLT ,$pageNum, $pageSize,&$totalRows ){
        $startRow = ($pageNum-1)*$pageSize;
        $sql="SELECT idTin, TieuDe, TomTat, urlHinh, Ngay, SoLanXem 
        FROM  tin  WHERE AnHien = 1 AND idLT=$idLT 
        ORDER BY idTin DESC LIMIT $startRow , $pageSize ";// chỉ lấy vài record
        $kq = $this->db-> query($sql);
        if(!$kq) die( $this-> db->error);	
         
        //đếm số record, 2 câu lệnh sql phải giống nhau phần From & Where
        $sql = "SELECT count(*) FROM  tin WHERE AnHien = 1 AND idLT=$idLT";	
        $rs = $this->db->query($sql) ;	
        $row_rs = $rs->fetch_row();
        $totalRows = $row_rs[0];
        if(!$kq) die( $this-> db->error);	
        return $kq;		
     }
     function TimKiem($tukhoa, &$totalRows, $pageNum=1, $pageSize=5){
        $startRow = ($pageNum-1)*$pageSize;
         $tukhoa = $this->db-> escape_string( trim(strip_tags($tukhoa)) );
         $sql = "SELECT idTin, TieuDe, TomTat, urlHinh, Ngay, SoLanXem, Ten, TenTL
         FROM tin, loaitin, theloai
         WHERE tin.AnHien = 1 AND tin.idLT = loaitin.idLT AND tin.idTL = theloai.idTL 
         AND (TieuDe RegExp '$tukhoa' or TomTat RegExp '$tukhoa') 
         ORDER BY idTin DESC LIMIT $startRow , $pageSize ";		
         $kq = $this->db->query($sql);
        if(!$kq) die( 'Lỗi trong hàm ' . __FUNCTION__. '  '. $this-> db->error);
     
         $sql = "SELECT count(*) 
         FROM tin, loaitin, theloai
         WHERE tin.AnHien = 1 AND tin.idLT = loaitin.idLT AND tin.idTL = theloai.idTL 
         AND (TieuDe RegExp '$tukhoa' or TomTat RegExp '$tukhoa') ";	
         $rs = $this->db->query($sql);
        if(!$rs) die( 'Lỗi trong hàm ' . __FUNCTION__. '  '. $this-> db->error);
        $row_rs = $rs->fetch_row();
        $totalRows = $row_rs[0];
         return $kq;
     }
     function getTitle($p=''){
        if ($p=='') return "Tin tức tổng hợp";
        elseif ($p=='search') return "Tìm kiếm tin";
        elseif ($p=="detail"){
           $id = $_GET['idTin'];  settype($id,"int");
           $kq = $this->db->query("select TieuDe from tin where idTin=$id");
           if(!$kq) die( $this-> db->error);
           if ($kq->num_rows<=0) return "Tin tức tổng hợp";
           $row_kq = $kq->fetch_row();
           return $row_kq[0];
        }
        elseif ($p=="cat"){
           $id = $_GET['idLT'];  settype($id,"int");
           $tenLT = $this->LayTenLoaiTin($id);
           if ($tenLT=="") return "Tin tức tổng hợp";
           else return $tenLT;
        }
     } //function 
     
     

}//tin
?>
