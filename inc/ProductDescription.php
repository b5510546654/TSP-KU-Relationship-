<?php
    class ProductDescription {
	
	public $id;
	public $brand;
	public $category;
	public $description;
	public $modelCode;
	public $productName;
	public $createDate;
	public $additionTags;
	public $images;
	
	public function __construct(){
	}
	
	public static function CreateProductDescription( $category, $brand, $description, $modelCode, $additionTags, $productName ) {
	    $dao = ProductDao::GetInstance();
	    $now = new DateTime( 'now' );
	    print_r($now);
	    $pdid = $dao->addProductDescription( $category->id, $brand->id, $productName, $modelCode, $description , $additionTags, $now->format('Y-m-d H:i:s') );
	    
	    $instance = new self();
	    $instance->id = $pdid;
	    $instance->brand = $brand;
	    $instance->category = $category;
	    $instance->description = $description;
	    $instance->modelCode = $modelCode;
	    $instance->productName = $productName;
	    $instance->createDate = $now;
	    $instance->additionTags = $additionTags;
	    return $instance;
	}
	
	public function updateData() {
	    $dao = ProductDao::GetInstance();
	    echo ("x" .$this->productName);
	    $dao->editProductDescription( $this->id, $this->category->id, $this->brand->id, $this->productName, $this->modelCode, $this->description , $this->additionTags, $this->createDate->format('Y-m-d H:i:s') );
	    echo ("y" .$this->productName);
	}
	
	public static function GetProductDescription( $pdid ) {
	    $dao = ProductDao::GetInstance();
	    $data = $dao->getProductDescriptionById( $pdid );
	    
	    $instance = new self();
	    $instance->id = $data['ProductDescriptionId'];
	    $instance->category = Category::GetCategory( $data['CategoryId'] );
	    $instance->brand = Brand::GetBrand( $data['BrandId'] );
	    $instance->productName = $data['ProductName'];
	    $instance->modelCode = $data['ModelCode'];
	    $instance->description = $data['Description'];
	    $instance->createDate = new DateTime( $data['CreateDate'] );
	    
	    $data = $dao->getImagesByProductDescriptionId( $pdid );
	    $instance->images = array();
	    foreach ( $data as &$value ) {
		array_push( $instance->images, $value['ImageAddress'] );
	    }
	    return $instance;
	}
	
	public static function GetProductDescriptionsByCategoryId ( $categoryId ) {
	    $array = array();
	    $dao = ProductDao::GetInstance();
	    $data = $dao->getProductDescriptionIdByCategoryId( $categoryId );
	    foreach ( $data as &$value ) {
		array_push( $array, ProductDescription::GetProductDescription( $value[0] ) );
	    }
	    return $array;
	}
	
	public static function SearchByTags ( $stringArray ) {
	    $dao = ProductDao::GetInstance();
	    return $dao->findProductDescriptionByTags( $stringArray );
	}
	
	public static function AddImages ( $productDescriptionId, $imageAddressArray ) {
	    $dao = ProductDao::GetInstance();
	    $dao->addProductDescriptionImages( $productDescriptionId, $imageAddressArray );
	}
    }

?>