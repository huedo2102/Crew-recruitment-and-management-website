<?php
include 'config/config.php';
?>

<?php


// Tạo kết nối
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Tạo thủ tục
$createProcedureSQL = "
CREATE PROCEDURE `UpdateThuyenvienTrangthai`()
BEGIN
    DECLARE done INT DEFAULT FALSE;
    DECLARE thuyenvien_id INT;

    -- Con trỏ để duyệt qua từng thuyền viên
    DECLARE thuyenvien_cursor CURSOR FOR 
    SELECT id_thuyenvien FROM thuyenvien;
    
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

    OPEN thuyenvien_cursor;

    read_loop: LOOP
        FETCH thuyenvien_cursor INTO thuyenvien_id;
        IF done THEN
            LEAVE read_loop;
        END IF;

        -- Kiểm tra nếu trạng thái của thủy viên là 4, thì không kiểm tra gì nữa cho thủy viên này
        IF (SELECT trangthai FROM thuyenvien WHERE id_thuyenvien = thuyenvien_id) = 4 THEN
            ITERATE read_loop; -- Chuyển sang thủ tục tiếp theo
        END IF;

        -- Kiểm tra nếu thuyền viên không có hợp đồng
        IF (SELECT COUNT(*) FROM hopdonglentau WHERE hopdong_tv = thuyenvien_id AND trangthai = 0) = 0 THEN
            UPDATE thuyenvien
            SET trangthai = 1
            WHERE id_thuyenvien = thuyenvien_id;
        ELSE
            -- Cập nhật trạng thái thuyền viên nếu hopdonglentau.ngayky nhỏ hơn hoặc bằng ngày hiện tại cho hợp đồng mới nhất
            UPDATE thuyenvien tv
            JOIN (
                SELECT hdl.*
                FROM hopdonglentau hdl
                INNER JOIN (
                    SELECT hopdong_tv, MAX(ngayky) AS max_ngayky
                    FROM hopdonglentau
                    WHERE trangthai = 0
                    GROUP BY hopdong_tv
                ) hdl_max ON hdl.hopdong_tv = hdl_max.hopdong_tv AND hdl.ngayky = hdl_max.max_ngayky
            ) hdl ON tv.id_thuyenvien = hdl.hopdong_tv
            SET tv.trangthai = 2
            WHERE hdl.ngaybatdau >= CURDATE() AND tv.id_thuyenvien = thuyenvien_id;

            -- Cập nhật trạng thái thuyền viên nếu hopdonglentau.ngaybatdau nhỏ hơn hoặc bằng ngày hiện tại cho hợp đồng mới nhất
            UPDATE thuyenvien tv
            JOIN (
                SELECT hdl.*
                FROM hopdonglentau hdl
                INNER JOIN (
                    SELECT hopdong_tv, MAX(ngayky) AS max_ngayky
                    FROM hopdonglentau
                    WHERE trangthai = 0
                    GROUP BY hopdong_tv
                ) hdl_max ON hdl.hopdong_tv = hdl_max.hopdong_tv AND hdl.ngayky = hdl_max.max_ngayky
            ) hdl ON tv.id_thuyenvien = hdl.hopdong_tv
            SET tv.trangthai = 3
            WHERE hdl.ngaybatdau <= CURDATE() AND tv.id_thuyenvien = thuyenvien_id;

            -- Cập nhật trạng thái thuyền viên nếu hopdonglentau.ngaybatdau + thoihan (tháng) lớn hơn hoặc bằng ngày hiện tại cho hợp đồng mới nhất
            UPDATE thuyenvien tv
            JOIN (
                SELECT hdl.*
                FROM hopdonglentau hdl
                INNER JOIN (
                    SELECT hopdong_tv, MAX(ngayky) AS max_ngayky
                    FROM hopdonglentau
                    WHERE trangthai = 0
                    GROUP BY hopdong_tv
                ) hdl_max ON hdl.hopdong_tv = hdl_max.hopdong_tv AND hdl.ngayky = hdl_max.max_ngayky
            ) hdl ON tv.id_thuyenvien = hdl.hopdong_tv
            SET tv.trangthai = 1
            WHERE DATE_ADD(hdl.ngaybatdau, INTERVAL hdl.thoihan MONTH) < CURDATE() AND tv.id_thuyenvien = thuyenvien_id;
        END IF;
    END LOOP;

    CLOSE thuyenvien_cursor;
END ;
";

// Tạo thủ tục
if ($conn->query($createProcedureSQL) === TRUE) {
    //echo "Procedure created successfully\n";
} else {
    echo "Error creating procedure: " . $conn->error;
}

// Gọi thủ tục
$callProcedureSQL = "CALL UpdateThuyenvienTrangthai();";

if ($conn->query($callProcedureSQL) === TRUE) {
    //echo "Procedure called successfully\n";
} else {
    echo "Error calling procedure: " . $conn->error;
}

// Xóa thủ tục
$dropProcedureSQL = "DROP PROCEDURE IF EXISTS UpdateThuyenvienTrangthai;";

if ($conn->query($dropProcedureSQL) === TRUE) {
    //echo "Procedure dropped successfully\n";
} else {
    echo "Error dropping procedure: " . $conn->error;
}

// Đóng kết nối
$conn->close();
?>
