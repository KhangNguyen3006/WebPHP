<?php
	class AdminProductModel extends AdminModel
	{
		protected $table=DB_PREFIX.'product';
		protected $field=['productName', 'alias', 'catId', 'brandId', 'image', 'trash', 'status', 'detail', 'price', 'saleprice'];
		protected $key='productId';

		//function cần thiết 
		public function productList($limit, $offset)
		{
			//lay ds sp
			$data['products']=$this->getAllLimit(['trash'=>0], $limit, $offset);
			//tinh tong so SP
			$totalRecords=count($this->getAll(['trash'=>0]));
			//chuan bi paging
			$data['paging']=new Paging('adminproduct/productList/', $totalRecords, $limit, $offset);
			return $data;
		}

		public function productListInTrash($limit, $offset)
		{
			//lay ds sp
			$data['products']=$this->getAllLimit(['trash'=>1], $limit, $offset);
			//tinh tong so SP
			$totalRecords=count($this->getAll(['trash'=>1]));
			//chuan bi paging
			$data['paging']=new Paging('adminproduct/productListInTrash/', $totalRecords, $limit, $offset);
			return $data;
		}

		public function toggleTrash($productId)
		{
			if($this->toggle('trash', $productId))
			$_SESSION['msg']="Thuc hien thanh cong";
			else
			$_SESSION['msg']="Thuc hien that bai";
			header("location:".BASE_URL."adminproduct/productList/".LIMIT."/0");
		}

		public function toggleStatus($productId)
		{
			if($this->toggle('status', $productId))
			$_SESSION['msg']="Thuc hien thanh cong";
			else
			$_SESSION['msg']="Thuc hien that bai";
			header("location:".BASE_URL."adminproduct/productList/".LIMIT."/0");
		}

		public function doAddProduct()
		{
			$newpro['productName']= $_POST['inputProductName'];
			$newpro['alias']= $_POST['inputAlias'];
			$newpro['catId']= $_POST['inputCatId'];
			$newpro['brandId']= $_POST['inputBrandId'];
			$newpro['image']= basename($_FILES['inputFileUpload']['name']);
			$newpro['trash']= 0;
			$newpro['status']= $_POST['inputStatus'];
			$newpro['detail']= $_POST['inputDetail'];
			$newpro['price']= $_POST['inputPrice'];
			$newpro['saleprice']= $_POST['inputSalePrice'];
		

			$helper= new Helper;
			if($newpro['alias']=='') $newpro['alias']= $helper->to_alias($newpro['productName']);
			$_SESSION['msg']='';
			if($newpro['price']<$newpro['saleprice'])
			$_SESSION['msg']="Giá sale phải nhỏ hơn giá bán";
			else
			{
				$uploadSuccess= $helper->doUpload('inputFileUpload');
				if($uploadSuccess)
				{
					if($this->insert($newpro)) $_SESSION['msg'].='Thêm sản phẩm thành công';
					else $_SESSION['msg'].= 'Thêm sản phẩm thất bại';
				}
			}
			
    	}

		public function doUpdateProduct($productId)
		{
			$newpro['productName']=$_POST['inputProductName'];
			$newpro['alias']=$_POST['inputAlias'];
			$newpro['catId']=$_POST['inputCatId'];
			$newpro['brandId']=$_POST ['inputBrandId'];
			$newpro['trash']=$_POST['inputTrash'];
			$newpro['status']=$_POST['inputStatus'];
			$newpro['detail']=$_POST['inputDetail'];
			$newpro['price']=$_POST['inputPrice'];
			$newpro['saleprice']=$_POST['inputSalePrice'];

			$helper= new Helper;
			
			if($newpro ['alias']=='')$newpro['alias']=$helper->to_alias($newpro['productName']);
			$_SESSION['msg']=' ';
			if($newpro['price']<$newpro['saleprice'])
			$_SESSION['msg']=" Giá sale phải nhỏ hơn giá bán";
			else
			if ($_FILES['inputFileUpload']['name']!='')
			{
				$_SESSION['msg'].= "File up lên:".$_FILES['inputFileUpload']['name'];
				$uploadSuccess= $helper->doUpload('inputFileUpLoad');
				if($uploadSuccess){
					$newpro['image']= $_FILES['inputFileUpload']['name'];
					if($this->update($newpro, $productId))$_SESSION['msg'].="Cập nhật sản phẩm thành công";
					else $_SESSION['msg'].="Cập nhật sản phẩm thất bại";
					header ("Location:".BASE_URL."adminProduct/productList");
					exit;
				}
			}
			else
			{
				if($this->update ($newpro, $productId))
				$_SESSION['msg'].=' Cập nhật sản phẩm thành công';
				else $_SESSION['msg']=' Cập nhật sản phẩm thất bại';
				header ("Location:".BASE_URL."adminProduct/productList");
				exit;
			
			}
		}
	}
 ?>