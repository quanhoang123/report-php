<?php
class database
{
    private $db_server = "localhost";
    private $db_username = "root";
    private $db_password = "";
    private $db_data = "database_restaurant";
    public $conn = "";
    //connect database
    public function connect()
    {
        if (!$this->conn) {
            $this->conn = mysqli_connect($this->db_server, $this->db_username, $this->db_password, $this->db_data) or die(mysqli_connect_error());
            // thực hiện mã hóa phông chữ
            mysqli_query($this->conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
        }
    }

    // close database
    public function dis_connect()
    {
        if ($this->conn) {
            mysqli_close($this->conn);
        }
    }

    // group select table
    public function Read($sql)
    {
        $this->connect();
        $result = mysqli_query($this->conn, $sql);
        if (!$result) {
            die('câu lệnh bị sai!');
        }
        if (mysqli_num_rows($result) > 0) {
            echo '<table class="table table-bordered table-striped" >';
            echo "<thead>";
            echo "<tr>";
            echo "<th>#</th>";
            echo "<th>Name</th>";
            echo "<th>category</th>";
            echo "<th>image</th>";
            echo "<th>description</th>";
            echo "<th>price</th>";
            echo "<th>created_day</th>";
            echo "<th>quantity</th>";
            echo "<th>Action</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id_product'] . "</td>";
                echo "<td>" . $row['name_product'] . "</td>";
                echo "<td>" . $row['category_id'] . "</td>";
                // echo "<td>". '<img src="data:../img/img-product/;base64,'.base64_encode( stripslashes($row['image']) ).'"/>' . "</td>"; 
                echo "<td><img src=' " . $row['image'] . "'></td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . $row['created_day'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
                echo "<td>";
                echo '<a href="../modal/read_product.php?id=' . $row['id_product'] . '" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                echo '<a href="/modalupdate.php?=' . $row['id_product'] . '" class="mr-3" title="Update Record" data-toggle="modal" data-target="#myModal"><span class="fa fa-refresh"></span></a>                            ';
                echo '<a href="../modal/delete_product.php?id=' . $row['id_product'] . '" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            // Free result set
            mysqli_free_result($result);
        }
    }
    
    public function select($sql)
    {
        $this->connect();
        $result = array();
        $result = mysqli_query($this->conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }
        if (!empty($resultset))
            return $resultset;
    }

    public function read_product_detail($id)
    {

        // Connect sql
        $this->connect();
        $sql = "SELECT * FROM products WHERE id_product = $id";
        // Create array 
        $result = array();
        $query = mysqli_query($this->conn, $sql);

        if (mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
            $result = $row;
        }
        return $result;
    }
    public function searchProdById()
    {
        // Nếu người dùng submit form thì thực hiện
        if (isset($_REQUEST['ok'])) {
            // Gán hàm addslashes để chống sql injection
            $search = addslashes($_GET['search']);
            // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
            if (empty($search)) {
                echo "Yeu cau nhap du lieu vao o trong";
            } else {
                // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                $query = "select * from product where name_newProd like '%$search%'";
                $con = mysqli_connect("localhost", "root", "", "group_restaurant");
                // Thực thi câu truy vấn
                $sql = mysqli_query($con, $query);
                // Đếm số đong trả về trong sql.
                $num = mysqli_num_rows($sql);


                // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
                if (mysqli_num_rows($sql) > 0 && $search != "") {
                    // Dùng $num để đếm số dòng trả về.
                    echo "$num ket qua tra ve voi tu khoa <b>$search</b>";

                    // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
                    while ($row = mysqli_fetch_assoc($sql)) {

                        echo "<div>{$row['name_newProd']}</div>";
                        echo "<img src=' " . $row['image'] . "'>";
                    }
                } else {
                    echo "Khong tim thay ket qua!";
                }
            }
        }
    }
    public function searchProd()
    {

        // Nếu người dùng submit form thì thực hiện
        if (isset($_REQUEST['ok'])) {
            // Gán hàm addslashes để chống sql injection
            $search = addslashes($_GET['search']);
            // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
            if (empty($search)) {
                echo "Yeu cau nhap du lieu vao o trong";
            } else {
                // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                $query = "select * from product where name_newProd like '%$search%'";
                $con = mysqli_connect("localhost", "root", "", "database_restaurant");
                // Thực thi câu truy vấn
                $sql = mysqli_query($con, $query);
                // Đếm số đong trả về trong sql.
                $num = mysqli_num_rows($sql);


                // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
                if (mysqli_num_rows($sql) > 0 && $search != "") {

                    echo "<script> alert('The result returns $num rows of data with name is $search')</script>";
                } else {
                    echo "Khong tim thay ket qua!";
                }
            }
        }
    }
    public function fetch_all()
    {
        $userid = 0;
        if (isset($_POST['userid'])) {
            $userid = mysqli_real_escape_string($con, $_POST['userid']);
        }
        $select_query = "SELECT * FROM product WHERE id_newProd=" . $userid;
        $result = mysqli_query($this->con, $select_query);

        $html = '<div>';
        while ($row = mysqli_fetch_array($result)) {
            $nameProd = $row['name_newPro'];
            $name = $row['price'];
            
            $html .= "<span class='head'>name_product : </span><span>" . $name . "</span><br/>";
            $html .= "<span class='head'>price_product : </span><span>" . $nameProd . "</span><br/>";
          
        }
        $html .= '</div>';
        echo $html;
    }
}
