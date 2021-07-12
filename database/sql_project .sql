drop database if  exists database_restaurant;
create database database_restaurant;
use database_restaurant;

-- -----------------------------
-- table for image:
-- -----------------------------
-- mk
 -- htqsrivbcbqbikoz

 -- qAD8LIxKB#78Roo3O!G5

 -- 6*ko)LJg4~6*FBQV
Create table  image_member(
id INT(11) NOT NULL auto_increment primary key,
name_mem varchar(255) default null,
image_mem varchar(255)  COLLATE utf8_unicode_ci NOT NULL,
Note varchar(255) default null
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;
 insert into image_member value
        (1, 'Quan', 'img/img_member/quan.jpg', 'Quanty nha'),
        (2,'Diem','img/img_member/diem.jpg', 'Không biết thì hỏi thầy sẽ biết'),
        (3,'Vương','img/img_member/vuong.jpg', 'Auto hand some boy'),
        (4,'Vi','img/img_member/vi.jpg', 'Dep trai co gi sai');
       
CREATE table  image_slider (
id INT(11) NOT NULL auto_increment primary key,
name_slider varchar(255) default null,
image varchar(255)  COLLATE utf8_unicode_ci NOT NULL,
note varchar(255) default null
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

 insert into image_slider value
(1, 'Good', 'img/interface/backgroundd.jpg', 'Shop Now'),
(2,'Good','img/interface/backgroundd.jpg', 'Shop Now'),
        (3,'Good','img/interface/backgroundd.jpg', 'Shop Now');


create table employees(
    id_employeer int primary key auto_increment,
    name_employeer varchar(60),
    gender varchar(5),
    address varchar(100),
    phone varchar(11),
    salary decimal(10,2)
);
insert into employees
values (1,'Nguyen Doan Ngoc Hau','Nu','Hai Lang- Quang Tri',12000123,6000000),
(2,'Nguyen Dinh Long','Nam','Dinh-10 Quang Binh',111112,3000000),
(3,'Nguyen Ngoc Pha','Nam','Quang Nam',111113,5000000),
(4,'Le Ngoc Vi','Nam','Binh Dinh',111114,5000000),
(5,'Le Hong Hanh','Nu','Tuyen Hoa- Quang Tri',111115,4000000),
(6,'Ho Thi Nhu Quynh','Nu','Quang Tri',111116,4000000);
create table if not exists users(
	id_user int primary key auto_increment,
    fullname varchar(60),
    user_name varchar(255),
    password char(11),
    gender char(5),
    role varchar(255),    
    email varchar(50),
    phone char(11),
    status int(11) not null default '0',
    address varchar(100)
);
insert into users(fullname,user_name,`password`,avatar,gender,`role`,email,phone,`status`,address) 
values
	('hung vuong','vuong1',123,'','nam','user','jojo@gmail.com',0121212,1,'Hung-Vuong'),
	('Trung Quan','vuong123',123,'','nam','admin','quanhuhoq111@gmail.com',0121212,1,'Hung-Vuong'),
    ('Thi Diem','diem',123,'','nu','admin','diemthi@gmail.com',0121212,1,'Hung-Vuong'),
    ('ngoc vi','vi',123,'','nam','admin','jojo@gmail.com',0121212,1,'Hung-Vuong');
select * from users;




-- Tạo bảng nhà cung cấp
create table Vendor(
id_vendor int primary key,
    name_vendor varchar(100),
    address   varchar(100),
    phone char(11),
    email varchar(100)
);
insert into Vendor value(1,'ABCD','33-HungVuong-HaNoi',012345,'abcd@gmail.com.vn'),
(2,'CDEFH','Ho Chi Minh',012367,'cdefh@gmail.com.vn'),
(3,'HFQXZ','Da Nang',012389,'hfqxz@gmail.com.vn'),
(4,'HDTHC','Quang Binh',19008198,'hdthc@gmail.com.vn');
-- Tạo bảng danh mục sản phẩm( thể loại chính cho từng sản phẩm)
create table Product_category(
id_prodCate int primary key auto_increment,
    product_Category_Name varchar(100),
id_vendor int,
    foreign key (id_vendor) references Vendor(id_vendor)
);
insert into Product_category values (1,'New Product',2),
(2,'Drinks',3),
(3,'Product Discount',4),
                                    (4,'Room',1);



create table product(
	id_newProd int primary key auto_increment,
    name_newProd varchar(100),
	id_prodCate int, -- id thể loái sản phầm
	image varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    old_price decimal(10,2) not null default '0',
    price decimal(10,2) not null,
    create_date date,
    quantity int,
    Descriptions varchar(250), -- mô tả sản phẩm
	status int(11) DEFAULT NULL,
    foreign key (id_prodCate) references Product_category(id_prodCate)
);
insert into product values
(1,'Ba Ba',1,'img/img-product/baba.jpg','',100000,'2020-1-21',100,'',1),
(2,'Ga Luoc',1,'img/img-product/galuoc.png','',150000,'2020-03-05',100,'',1),
(3,'Cua Hoang De',1,'img/img-product/cuahoangde.jpg','',150000,'2020-03-05',100,'',1),
(4,'Ca Mú Hấp',1,'img/img-product/camuhap.jpg','',700000,'2020-05-11',100,'',1),
(5,'Cá',1,'img/img-product/ganuong.jpg','',100000,'2020-05-12',100,'',1),
(6,'Ga Nuong',1,'img/img-product/ganuong.jpg','',500000,'2020-05-14',100,'',1),
(7,'Ga Nuong',1,'img/img-product/ganuong.jpg','',500000,'2020-05-14',100,'',1),
(8,'Ga Nuong',1,'img/img-product/ganuong.jpg','',500000,'2020-05-14',100,'',1),
(9,'Ga Nuong',1,'img/img-product/ganuong.jpg','',500000,'2020-05-14',100,'',1),
(10,'Ga Nuong',1,'img/img-product/ganuong.jpg','',500000,'2020-05-14',200,'',1),
(11,'Ba Ba',3,'img/img-product/baba.jpg',500000,100000,'2020-1-21',100,'',1),
(12,'Ga Choi',3,'img/img-product/gachoi.jpg',500000,150000,'2020-03-05',23,'',1),
(13,'Cua Hoang De',3,'img/img-product/cuahoangde.jpg',500000,150000,'2020-03-05',23,'',1),
(14,'Ca Mú Hấp',3,'img/img-product/camuhap.jpg',500000,700000,'2020-05-11',20,'',1),
(15,'Cá',3,'img/img-product/honhop.jpg',500000,200000,'2020-05-12',20,'',1),
(16,'Ga Nuong',3,'img/img-product/ganuong.jpg',500000,500000,'2020-05-14',40,'',1);


create table if not exists drinks(
id int(11) NOT NULL AUTO_INCREMENT,
name_water varchar(255) COLLATE utf8_unicode_ci NOT NULL,
category_id int(11) NOT NULL,
image_water varchar(255) COLLATE utf8_unicode_ci NOT NULL,
description text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
price float NOT NULL,
status int(11) DEFAULT NULL,
PRIMARY KEY (id),
FOREIGN KEY (category_id) REFERENCES Product_category(id_prodCate)
 );

INSERT INTO drinks values 	(1,'Red Bull',2,'img/drink/Bò-húc.jpg','',200000,0),
							(2,'CocaCoLa',2,'img/drink/coca.jpg','',200000,0),
                            (3,'Beer',2,'img/drink/beer.jpg','',200000,0),
                            (4,'Milk-tea',2,'img/drink/gong-cha.jpg','',200000,0),
                            (5,'Bí đao',2,'img/drink/milk-tea.jpg','',200000,0),
                            (6,'KHông Độ',2,'img/drink/không-độ.jpg','',200000,0);

create table if not exists wedding_img(
id int(11) NOT NULL AUTO_INCREMENT,
name varchar(255) COLLATE utf8_unicode_ci NOT NULL,
category_id int(11) NOT NULL,
image varchar(255) COLLATE utf8_unicode_ci NOT NULL,
description text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
price float NOT NULL,
status int(11) DEFAULT NULL,
PRIMARY KEY (id),
FOREIGN KEY (category_id) REFERENCES Product_category(id_prodCate)
 );

INSERT INTO wedding_img values 	(1,'Tôm Nướng',2,'img/wedding/tom.jpg','',200000,0),
							(2,'Fruit',2,'img/wedding/fruit.jpg','',200000,0),
                            (3,'Mâm Cưới',2,'img/wedding/mâm.jpg','',200000,0);
                            


-- -----------------------------
-- table for rooms:
-- -----------------------------
drop table if exists room_restaurant;
CREATE TABLE room_restaurant(
id_room int NOT NULL AUTO_INCREMENT primary key,
name_room varchar(255) COLLATE utf8_unicode_ci NOT NULL,
category_id int(11) NOT NULL,
image_room varchar(255) COLLATE utf8_unicode_ci NOT NULL,
description text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
price float NOT NULL,
created_day date NOT NULL,
quantity_person int(11) NOT NULL,
status int(11) DEFAULT NULL,
FOREIGN KEY (category_id) REFERENCES Product_category(id_prodCate)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34;

INSERT INTO room_restaurant values (1,'room',4,'img/img-room/room1.jpg','',100000,'2020-1-21',20,1),
(2,'room1',4,'img/img-room/room2.jpg','',100000,'2020-1-21',20,1),
                            (3,'room2',4,'img/img-room/room3.jpg','',100000,'2020-1-21',20,1),
                            (4,'room3',4,'img/img-room/room4.jpg','',100000,'2020-1-21',20,1),
                            (5,'room4',4,'img/img-room/room5.jpg','',100000,'2020-1-21',20,1),
                            (6,'room5',4,'img/img-room/room6.jpg','',100000,'2020-1-21',20,1);

select * from room_restaurant;
CREATE TABLE room_interface(
id int(11) NOT NULL AUTO_INCREMENT,
room_name varchar(255) COLLATE utf8_unicode_ci NOT NULL,
img_room varchar(255) COLLATE utf8_unicode_ci NOT NULL,
description text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34;
INSERT INTO room_interface values (1,'room','img/img-room/room1.jpg','Good nè'),
(2,'room1','img/img-room/room2.jpg','Good nè'),
                            (3,'room2','img/img-room/room3.jpg','Good nè'),
                            (4,'room3','img/img-room/room4.jpg','Good nè');
                           

select * from room_interface;
drop table if exists orders;
CREATE TABLE orders (
    id_order INT PRIMARY KEY,
    id_user INT,
    total_money DECIMAL(10 , 2),
    id_product int,
	id_room int,
     FOREIGN KEY (id_product) REFERENCES product(id_newProd),
       FOREIGN KEY (id_user) REFERENCES users(id_user),
  FOREIGN KEY (id_room) REFERENCES room_restaurant(id_room)
);

-- tạo bảng giỏ hàng
create table carts(
	id_cart int auto_increment primary key,
    total decimal(10,2) not null,
    date_time datetime, -- địa chỉ giao hàng
    id_order int,
    quantity int,
    id_newProd int,
    id_room int,
    id_user int,
    foreign key (id_user) references users(id_user),
	foreign key (id_order) references orders(id_order),
    FOREIGN KEY (id_newProd) REFERENCES product(id_newProd),
	FOREIGN KEY (id_room) REFERENCES room_restaurant(id_room)
);  
select *from carts;
-- Tạo bảng hóa đơn
create table bills(
id_bill int primary key auto_increment,
    id_employ int,
    id_user int,
    id_carts int, -- id giỏ hàng
    total DECIMAL(10 , 2 ),
    id_newProd int,
    id_room int,
    foreign key (id_employ) references employees(id_employeer),
    foreign key (id_user) references users(id_user),
    foreign key (id_carts) references carts(id_cart),
    FOREIGN KEY (id_newProd) REFERENCES product(id_newProd),
FOREIGN KEY (id_room) REFERENCES room_restaurant(id_room)

);  


/* Đồ án học kì 2*/
-- VIEW
-- drop view view_name;
-- drop view if exists view_name;
-- Create view view_name
-- As
-- select  p.id_prod, p.name_prod, s.id_supplier, s.name_supplier
-- from Products p
-- INNER JOIN Suppliers s  
-- ON (p.id_supplier = s.id_supplier)
-- where p.id_prod in( 1012,1015);

-- select * from view_name;

-- -- view tim khach hang vip
-- drop view if exists view_employee;
-- create view  view_employee as
-- select name_employee,phone,max(salary)
-- from employees;
-- select * from view_employee;

-- -- PROCEDURE
-- -- Tìm giá lớn nhất và bé nhất trong bảng sản phẩm
-- drop procedure if exists Prices;
-- delimiter //
-- create procedure Prices(out maxx int, out minn int)
-- begin
--     select max(price) into maxx  from Products;
--     select min(price) into minn from Products;
-- select @maxx,@minn;
--     end//
--     delimiter ;
--     call Prices(@maxx,@minn);
--    
-- -- tạo cursor danh sách email và phone của curtomer
-- drop procedure if exists createEmail_Phone;
-- delimiter //
-- create procedure createEmail_Phone(inout phoneEmail_List varchar(9000))
-- begin
-- declare finished int default 0;
-- declare email_address  varchar(100) default "";
-- declare phone_address varchar(100) default "";
-- declare cur_customer cursor for
-- select email ,phone from customers;
--     DECLARE CONTINUE HANDLER
--         FOR NOT FOUND SET finished = 1;
-- OPEN cur_customer;
--     getEmail_Phone: LOOP
--     Fetch cur_customer  into email_address,phone_address;
-- if finished=1 then
-- leave getEmail_Phone;
--     end if;
--     Set phoneEmail_List = concat(phoneEmail_List," ",email_address ,phone_address,"----");
-- end loop getEmail_Phone;
-- close cur_customer;
-- end //
-- delimiter ;
-- set @phoneEmail_List ="";
-- CALL createEmail_Phone(@phoneEmail_List);
-- select @phoneEmail_List as phone_email_customer;


-- -- FUNCTION
--  -- đếm số đơn hàng trong tháng
--  drop function if exists CountEd;
--  delimiter //
--  create function CountEd( months int)
--  returns int
--  deterministic
--  begin
-- declare sums int ;
-- select count(*) into sums  from Bills
--     where month(Date_of_payment) = months ;
--     return sums ;
--     end//
-- delimiter ;
-- select CountEd(1) AS 'Số hóa đơn trong tháng';

-- -- Function tìm lương của nhân viên theo id  nhân viên
-- drop function if exists salaryEmp;
-- delimiter //
-- create function salaryEmp (id_emp char(4)) returns decimal(10,2)
-- deterministic
-- begin
--  declare salarys decimal(10,2);
--  select salary into salarys from Employees
--  where id_employee = id_emp ;
--  return salarys ;
--  end //
--  delimiter ;
--  select salaryEmp (5) as 'Salary_Of_Employee';
--  
-- -- TRIGGER
-- -- Trigger kiểm tra số lượng của sản phẩm trước khi update;
-- drop  trigger if exists  before_product_update
-- DELIMITER //
-- CREATE TRIGGER before_product_update
-- BEFORE UPDATE
-- ON products FOR EACH ROW
-- BEGIN
-- declare errorMessage VARCHAR(255);
-- SET errorMessage = CONCAT('The new amount ',NEW.quantity,' cannot be 2 times greater than the current quantity ',OLD.quantity);
-- IF new.quantity > old.quantity * 2 THEN
-- SIGNAL SQLSTATE '45000'
-- SET MESSAGE_TEXT = errorMessage;
-- END IF;
-- END //
-- DELIMITER ;

-- select quantity from products where id_prod = 1010;

-- UPDATE products
-- SET quantity = 100
-- WHERE id_prod = 1010;
-- select * from products;

-- -- kiểm tra insert giá < 0 thì báo lỗi
-- drop  trigger if exists  befor_product_insert ;
-- delimiter //
-- create trigger befor_product_insert
-- before insert on products for each row
-- begin
-- declare bug varchar(200);
-- set bug =concat("The product inserted is invalid , price < 0 ");
-- if( new.price <= 0 ) then signal sqlstate '45000' set message_text = bug ;
--     end if;
--     end //
-- delimiter ;
-- insert into products values (1020,'Tạ 10kg',-100,2,'Suc khoe doi dao nang cao the luc','2020-03-05',500,03);


-- -- EVENT
-- Drop table messages;
-- CREATE TABLE  messages (
--     id INT PRIMARY KEY AUTO_INCREMENT,
--     message VARCHAR(1000) NOT NULL
-- );
-- set global event_scheduler= on;
-- drop event Number_of_Employee;
-- delimiter //
-- Create event  Number_of_Employee
-- ON SCHEDULE every 10 second
-- ON COMPLETION PRESERVE
-- Do
-- begin
-- declare numberofemployee int;    
-- declare tmp varchar(1000);
--     Select count(e.id_employee) into numberofemployee
--     from employees e
--     inner join orders o
--     On e.id_employee = o.id_employee
--     where e.salary >= 5000000 or  o.quantity >3;
--     set tmp=concat("There are: ", numberofemployee," employee that salary in 1million to 5 mililion and quantity >3 ");
--     insert into messages (message) value (tmp);
-- End//
-- delimiter ;
-- select * from messages;
-- show events from banhang_online;

-- -- AFTER INSERT
-- -- kiểm tra ngày xuất hóa đơn , nếu ngày xuat hóa đơn là null thì insert vào message id hóa đơn đó và content : vui lòng nhập ngày lập hóa đơn
-- delimiter //
-- create trigger after_Bill_insert
-- after insert on Bills for each row
-- begin
-- if new.Date_of_payment is null then
-- insert into messages values (new.id_bill,concat("Vui lòng nhập ngày xuất hóa đơn"));
--     end if;
-- end //
-- delimiter ;
-- drop trigger after_Bill_insert;
-- insert into Bills values (112,108,null,900000,1019);
-- select id,message from messages;

-- drop table messages;


-- -- AFTER UPDATE
-- -- Giá trị của giá thay đổi thì lưu vào table message để sau này biết lịch sử thay đổi của nó
-- create table change_price(
-- id int primary key,
-- content varchar (200)
-- );



-- drop trigger if exists after_product_update;
-- delimiter //
-- create trigger after_product_update
-- after update on products for each row
--  begin
--   if new.price <> old.price then
--   insert into change_price values ( new.id_prod , concat( " Giá thay đổi từ ", old.price, " thành ", new.price));
--   end if;
--   end//
-- delimiter ;
-- update products set price = '15000' where id_prod = '1015';

-- select * from change_price ;



-- -- FullText INDEX
-- CREATE FULLTEXT INDEX NameProd_IDX ON Products(Descriptions);
-- Select *from products where match(Descriptions) against("Ngon" in natural language mode);

-- ALTER TABLE shippers
-- DROP INDEX name_shipper;

-- CREATE FULLTEXT INDEX index_shippers ON shippers(name_shipper);
-- Select * from shippers where match(name_shipper) against("Chu" in natural language mode);