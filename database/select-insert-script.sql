SELECT * FROM web.Customers;
SELECT * FROM web.Orders;
SELECT * FROM web.Products;
SELECT * FROM web.Brands;
SELECT * FROM web.Categories;
SELECT * FROM web.Images;
SELECT * FROM web.ProductBrands;
SELECT * FROM web.ProductCategories;
SELECT * FROM web.ProductImages;

INSERT INTO web.Brands (BrandName, BrandRating) 
	VALUES ('UFU', 5);

INSERT INTO web.Categories (CategoryName) 
	VALUES ('University');