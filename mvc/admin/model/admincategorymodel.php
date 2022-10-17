<?php 
    class AdminCategoryModel extends AdminModel
	{
		protected $table=DB_PREFIX.'category';
        protected $fields=['catName', 'alias', 'parentId', 'trash', 'status'];
        protected $key='catId';


        public function catList($limit, $offset)
		{
			//lay ds sp
			$data['cats']=$this->getAllLimit(['trash'=>0], $limit, $offset);
			//tinh tong so SP
			$totalRecords=count($this->getAll(['trash'=>0]));
			//chuan bi paging
			$data['paging']=new Paging('admincategory/catList/', $totalRecords, $limit, $offset);
			return $data;
		}

		public function catListInTrash($limit, $offset)
		{
			//lay ds sp
			$data['cats']=$this->getAllLimit(['trash'=>1], $limit, $offset);
			//tinh tong so SP
			$totalRecords=count($this->getAll(['trash'=>1]));
			//chuan bi paging
			$data['paging']=new Paging('admincategory/catListInTrash/', $totalRecords, $limit, $offset);
			return $data;
		}

		public function toggleTrash($catId)
		{
			if($this->toggle('trash', $catId))
			$_SESSION['msg']="Thuc hien thanh cong";
			else
			$_SESSION['msg']="Thuc hien that bai";
			header("location:".BASE_URL."admincategory/catList/".LIMIT."/0");
		}

		public function toggleStatus($catId)
		{
			if($this->toggle('status', $catId))
			$_SESSION['msg']="Thuc hien thanh cong";
			else
			$_SESSION['msg']="Thuc hien that bai";
			header("location:".BASE_URL."admincategory/catList/".LIMIT."/0");
		}

		public function doAddCat()
		{
			$newpro['catName']= $_POST['inputCatName'];
			$newpro['alias']= $_POST['inputAlias'];
			$newpro['parentId']=0;
			$newpro['trash']=1;
			$newpro['status']= $_POST['inputStatus'];
		
			$helper= new Helper;
			if($newpro['alias']=='') $newpro['alias']= $helper->to_alias($newpro['catName']);
			$_SESSION['msg']=' ';
					if($this->insert($newpro)) $_SESSION['msg'].='Thêm sản phẩm thành công';
					$_SESSION['msg'].= 'Thêm sản phẩm thất bại';

			
    	}

		public function doUpdateCat($catId)
		{
            $newpro['catName']=$_POST['inputCatName'];
			$newpro['alias']=$_POST['inputAlias'];
			$newpro['parentId']= $_POST['inputParentId'];
			$newpro['trash']=$_POST['inputTrash'];
			$newpro['status']=$_POST['inputStatus'];

			$helper= new Helper;
			
			if($newpro ['alias']=='')$newpro['alias']=$helper->to_alias($newpro['catName']);
			$_SESSION['msg']=' ';
					if($this->update($newpro, $catId))$_SESSION['msg'].="Cập nhật sản phẩm thành công";
					else $_SESSION['msg'].="Cập nhật sản phẩm thất bại";
					header ("Location:".BASE_URL."adminCategory/catList");
					exit;
		}
    }
?>