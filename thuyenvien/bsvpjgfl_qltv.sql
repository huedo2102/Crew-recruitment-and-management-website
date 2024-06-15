-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th6 15, 2024 lúc 12:40 PM
-- Phiên bản máy phục vụ: 5.7.41-cll-lve
-- Phiên bản PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bsvpjgfl_qltv`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baiviet`
--

CREATE TABLE `baiviet` (
  `id` int(15) NOT NULL,
  `tieude` mediumtext NOT NULL,
  `motangan` mediumtext NOT NULL,
  `anhmota` varchar(100) NOT NULL,
  `danhmuc` varchar(50) DEFAULT NULL,
  `anhbaiviet` varchar(100) DEFAULT NULL,
  `ndbaiviet` longtext,
  `thoigian` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `baiviet`
--

INSERT INTO `baiviet` (`id`, `tieude`, `motangan`, `anhmota`, `danhmuc`, `anhbaiviet`, `ndbaiviet`, `thoigian`) VALUES
(82, 'Cung cấp dầu nhờn, dầu đốt', '', '661e0c4d9ba7c2.09302767.jpg', 'Dịch Vụ', '6640545eae4ce4.84213840.jpg', '<p>Sản phẩm dầu nhớt giao đến tay c&aacute;c đơn vị kh&aacute;ch h&agrave;ng của ch&uacute;ng t&ocirc;i đều được kiểm tra chất lượng kỹ lưỡng, đảm bảo an to&agrave;n v&agrave;&nbsp;quy định nghi&ecirc;m ngặt về chất lượng sản phẩm.</p>\r\n', '1715491934'),
(84, 'Cung ứng thuyền viên', '', '661e103226e768.11335933.jpg', 'Dịch Vụ', '664055d4980411.57665345.jpg', '<p>Hiện nay C&ocirc;ng ty Nhật Việt đ&atilde; v&agrave; đang cung ứng thuyền vi&ecirc;n c&oacute; tr&igrave;nh độ chuy&ecirc;n nghiệp, được đ&agrave;o tạo từ c&aacute;c trường thuộc chuy&ecirc;n ng&agrave;nh h&agrave;ng hải trong nước như Đại Học H&agrave;ng Hải việt Nam, Cao Đẳng H&agrave;ng Hải Việt Nam v&agrave; c&aacute;c trường ngh&ecirc; Cao Đẳng B&aacute;ch Nghệ...Những thuyền vi&ecirc;n n&oacute;i tr&ecirc;n được tuyển dụng v&agrave; đ&agrave;o tạo th&ecirc;m bởi c&aacute;c Thuyền Trưởng, M&aacute;y Trưởng những người đ&atilde; từng c&ocirc;ng t&aacute;c tr&ecirc;n c&aacute;c con t&agrave;u si&ecirc;u trường si&ecirc;u trọng của c&aacute;c c&ocirc;ng ty nước ngo&agrave;i như VINIC ,VIMAC, LI&Ecirc;N MINH v&agrave; tập đo&agrave;n VGROUP trước khi cung cấp cho đội t&agrave;u của Chủ t&agrave;u nước ngo&agrave;i.</p>\r\n\r\n<p>Với phương tr&acirc;m TẠO DỰNG NIỀM TIN -C&Ugrave;NG NHAU PH&Aacute;T TRIỂN BỀN VỮNG, C&ocirc;ng ty ch&uacute;ng t&ocirc;i lu&ocirc;n tăng cường nỗ lực đầu tư trang thiết bị cũng như hệ thống đ&agrave;o tạo nhằm đảm bảo n&acirc;ng cao chất lượng v&agrave; số lượng thuyền vi&ecirc;n xuất khẩu. Đồng thời đảm bảo quyền lợi cho thuyển vi&ecirc;n trong qu&aacute; tr&igrave;nh l&agrave;m việc&nbsp;C&ocirc;ng ước lao động h&agrave;ng hải MLC.&nbsp;</p>\r\n', '1715492308'),
(85, 'Dịch vụ đại lý hàng hải và vận tải hàng hóa viễn dương', '', '661e109b78f962.54248588.jpg', 'Dịch Vụ', '661e10ba04ca05.56918754.jpg', '<p>Ch&uacute;ng t&ocirc;i cam kết sản phẩm giao nhận nhanh ch&oacute;ng, l&agrave;m việc uy t&iacute;n v&agrave; đặt trọng t&acirc;m kh&aacute;ch h&agrave;ng l&ecirc;n h&agrave;ng đầu</p>\r\n\r\n\r\n\r\n<p>&nbsp;</p>\r\n', '1713246394'),
(86, 'LNG carrier rates smash all records ahead of Europe’s winter', '', '661e111b7cffc7.90206982.jpg', 'Tin Tức - Sự Kiện', '661e115317b077.43437106.jpg', '<p><strong>Spot rates for LNG carriers have set new records during October as tight tonnage supply meets rising demand and Europe&rsquo;s winter approaches.</strong></p>\r\n\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Rates for modern 174,000 cu m two-stroke ships have climbed close to  a day in October, Clarkson said in a market update, and all generations of carriers have set new records. Even thirsty steam-turbine vessels of 145,000 cu m have been fixed at close to quarter of a million dollars, the analyst reported.&nbsp;</p>\r\n\r\n<p>The surge in the market has come despite fleet expansion of more than 4% this year likely to outstrip projected tonne-mile demand growth of 1.2%. This is largely due to shorter voyages from the US as vessels previously sailing to Asia have been re-routed to Europe where imports shot up by 62% in September, year on year.</p>\r\n\r\n<p>Imports from the US have gone some way to replacing supplies previously piped into Europe from Russia. Now, exports from Freeport LNG, brought to a halt by a fire in June, could resume in November if regulators give the go-ahead.</p>\r\n\r\n<p>The Freeport facility could initially start producing at about 85% of its nominal capacity and reach 100% by March, according to reports. The plant usually exports about 15m tonnes of LNG annually.&nbsp; &nbsp;</p>\r\n\r\n<p>Now, in the run-up to colder weather in Europe, a growing number of ships are tied up at ports or waiting off at anchorages as import capacity struggles to keep pace with soaring volumes. Clarkson noted 7.5% of fleet capacity tied up in this way in mid-October, up from an average of 4.8% between January and August.</p>\r\n\r\n<p>There are also more LNG carriers being used for floating storage. Figures for late-October show 22 vessels deployed in storage duties, the analyst reported. In the longer run, more tonnage could be removed from the trading market as older vessels are converted for floating storage or FSRUs to boost import capacity.</p>\r\n\r\n<p>Meanwhile, the arbitrage between Henry Hub prices in the US and Europe&rsquo;s TTF benchmark has narrowed since August but still remains at levels never seen before. And European prices could rise again sharply if mild weather so far across the continent turns to a cold snap.</p>\r\n\r\n<p>ST-Toan Seatrade, a trading name of Informa Markets (UK) Limited.</p>\r\n', '1713246547'),
(87, 'Thách thức với doanh nghiệp vận tải biển Việt Nam', '', '661e1194356df9.71450620.jpg', 'Tin Tức - Sự Kiện', '661e11a8c45a04.15349051.jpg', '<p><strong>Doanh nghiệp vận tải biển Việt Nam phải đ&aacute;p ứng được những quy định mới li&ecirc;n quan đến vấn đề bảo vệ m&ocirc;i trường đ&atilde; được Tổ chức H&agrave;ng hải Quốc tế (IMO) &aacute;p dụng tr&ecirc;n to&agrave;n cầu.</strong></p>\r\n\r\n<p><strong>Nhiều quy định mới nghi&ecirc;m ngặt</strong><br />\r\nTại buổi tọa đ&agrave;m mới đ&acirc;y về ph&aacute;t triển h&agrave;ng hải Việt Nam xanh v&agrave; bền vững, &ocirc;ng Nguyễn Ngọc &Aacute;nh, Trưởng ban Vận tải biển thuộc Tổng C&ocirc;ng ty H&agrave;ng hải Việt Nam (VIMC) cho biết, việc &aacute;p dụng nghi&ecirc;m ngặt c&aacute;c quy định mới của Tổ chức H&agrave;ng hải Quốc tế (<a href=\"https://vlr.vn/IMO-ptag.html\">IMO</a>) như&nbsp;<a href=\"https://vlr.vn/Phu-luc-VI-Cong-uoc-MARPOL-ptag.html\">Phụ lục VI C&ocirc;ng ước MARPOL</a>&nbsp;quy định về nhi&ecirc;n liệu h&agrave;m lượng&nbsp;<a href=\"https://vlr.vn/luu-huynh-duoi-0-ptag.html\">lưu huỳnh dưới 0</a>,5%; Lắp đặt thiết bị kiểm so&aacute;t nước dằn t&agrave;u BWM; Quy định về Chỉ số hiệu quả năng lượng với t&agrave;u hiện c&oacute; (EEXI), Chỉ thị cường độ Carbon (CII)&hellip; đ&atilde; ảnh hưởng rất lớn đến hoạt động của c&aacute;c chủ t&agrave;u nhỏ v&agrave; c&aacute;c nước nhỏ.<br />\r\n<br />\r\nTheo &ocirc;ng &Aacute;nh, việc sử dụng nhi&ecirc;n liệu h&agrave;m lượng lưu huỳnh dưới 0,5% l&agrave;m tăng 25 - 35% chi ph&iacute; so với sử dụng nhi&ecirc;n liệu h&agrave;m lượng lưu huỳnh dưới 3,5%. Do đ&oacute;, việc &aacute;p dụng c&aacute;c qui định n&agrave;y l&agrave;m tăng chi ph&iacute; rất lớn cho c&aacute;c chủ t&agrave;u nhỏ. Đặc biệt, quy định về EEXI v&agrave; CII c&oacute; hiệu lực từ ng&agrave;y 1/1/2023 cũng trở th&agrave;nh g&aacute;nh nặng với c&aacute;c chủ t&agrave;u Việt Nam.<br />\r\n<br />\r\nĐại diện VIMC cho rằng, để đạt được chỉ số EEXI theo y&ecirc;u cầu của IMO, hầu hết c&aacute;c t&agrave;u cũ đều phải giảm c&ocirc;ng suất m&aacute;y ch&iacute;nh, c&oacute; t&agrave;u giảm đến 50% c&ocirc;ng suất dẫn đến phải giảm tốc độ t&agrave;u, ảnh hưởng lớn đến hiệu quả khai th&aacute;c v&agrave; kh&ocirc;ng tốt cho t&igrave;nh trạng kỹ thuật m&aacute;y ch&iacute;nh. Nhiều t&agrave;u cũ cũng kh&ocirc;ng đ&aacute;p ứng được y&ecirc;u cầu về CII, bắt buộc phải giảm c&ocirc;ng suất m&aacute;y xuống rất thấp, tổn hại đến kỹ thuật m&aacute;y v&agrave; giảm s&acirc;u tốc độ t&agrave;u hoặc phải cho t&agrave;u dừng hoạt động.<br />\r\n<br />\r\nĐể đạt được chỉ số CII trong 3 năm li&ecirc;n tiếp từ 2023 - 2026 v&agrave; c&aacute;c năm tiếp theo, phải giảm ph&aacute;t thải CO2 &iacute;t nhất 2%. Để thực hiện được điều n&agrave;y, chủ t&agrave;u phải trang bị th&ecirc;m c&aacute;c thiết bị hoặc phải thực hiện c&aacute;c biện ph&aacute;p ho&aacute;n cải lớn về kết cấu. &ldquo;C&aacute;c biện ph&aacute;p n&agrave;y c&oacute; vẻ bất khả thi với c&aacute;c chủ t&agrave;u Việt Nam v&agrave; nhiều chủ t&agrave;u nhỏ của c&aacute;c nước kh&aacute;c tr&ecirc;n thế giới&rdquo;, đại diện VIMC n&oacute;i v&agrave; cho biết, việc đầu tư, trẻ h&oacute;a đội t&agrave;u đ&aacute;p ứng c&aacute;c qui định tr&ecirc;n c&oacute; chi ph&iacute; đầu tư rất cao. Nếu kh&ocirc;ng giải quyết h&agrave;i h&ograve;a vấn đề &aacute;p dụng c&aacute;c qui định của C&ocirc;ng ước v&agrave; lộ tr&igrave;nh khả thi trẻ h&oacute;a đội t&agrave;u thế giới, tiềm ẩn nguy cơ khủng hoảng năng lực vận tải tr&ecirc;n to&agrave;n cầu l&agrave; rất lớn. Do đ&oacute;, đại diện VIMC cho rằng cần c&oacute; những giải ph&aacute;p để giảm thiểu tổn hại lớn trong tương lai gần với c&aacute;c chủ t&agrave;u nhỏ v&agrave; c&aacute;c nước nhỏ trước nguy cơ dừng hoạt động v&agrave; ph&aacute; sản.<br />\r\n<br />\r\n<strong>Doanh nghiệp t&agrave;u biển cần ch&iacute;nh s&aacute;ch hỗ trợ</strong><br />\r\n<br />\r\nTừ những kh&oacute; khăn đ&atilde; ph&acirc;n t&iacute;ch, đại diện VIMC thay mặt c&aacute;c chủ t&agrave;u Việt Nam kiến nghị IMO nghi&ecirc;n cứu giải ph&aacute;p gia hạn thời gian việc kiểm so&aacute;t EEXI v&agrave; CII cho từng khu vực kh&aacute;c nhau như c&aacute;c nước thuộc khối ch&acirc;u &Aacute;, c&aacute;c nước khu vực kinh tế k&eacute;m ph&aacute;t triển để c&oacute; điều kiện, lộ tr&igrave;nh chuẩn bị nguồn lực t&agrave;i ch&iacute;nh thay thế dần c&aacute;c t&agrave;u kh&ocirc;ng đ&aacute;p ứng được y&ecirc;u cầu. Đồng thời, đề nghị IMO nghi&ecirc;n cứu c&aacute;c ch&iacute;nh s&aacute;ch linh hoạt khi t&agrave;u hoạt động tại khu vực c&oacute; m&ocirc;i trường nước tương đối tương đồng như trong c&ugrave;ng khu vực Đ&ocirc;ng Nam &Aacute;, khu vực Ấn Độ dương c&oacute; thể xem x&eacute;t việc kh&ocirc;ng phải lắp đặt thiết bị kiểm so&aacute;t nước dằn t&agrave;u BWM.<br />\r\n<br />\r\n&Ocirc;ng Nguyễn Quang Minh - Chủ tịch HĐQT C&ocirc;ng ty CP Vận tải biển Việt Nam (VOSCO) thừa nhận việc tăng trưởng đội t&agrave;u phải đi đ&ocirc;i với c&ocirc;ng nghệ ti&ecirc;n tiến. Vị n&agrave;y cho rằng điều quan trọng l&agrave; l&agrave;m thế n&agrave;o để thực hiện v&agrave; hỗ trợ c&aacute;c chủ t&agrave;u, đặc biệt l&agrave; c&aacute;c chủ t&agrave;u ở c&aacute;c nước đang ph&aacute;t triển như Việt Nam để đ&aacute;p ứng c&aacute;c quy định của c&aacute;c C&ocirc;ng ước khi điều n&agrave;y đ&ograve;i hỏi nguồn vốn đầu tư rất lớn. &ldquo;<em>C&aacute;c doanh nghiệp cần được tiếp cận nguồn t&agrave;i ch&iacute;nh với l&atilde;i suất ưu đ&atilde;i v&agrave; thời gian vay ưu đ&atilde;i</em>&rdquo;, &ocirc;ng Minh n&oacute;i v&agrave; b&agrave;y tỏ mong muốn IMO l&agrave;m cầu nối để c&aacute;c chủ t&agrave;u Việt Nam đ&agrave;m ph&aacute;n với c&aacute;c ng&acirc;n h&agrave;ng, tổ chức t&agrave;i ch&iacute;nh quốc tế.<br />\r\n<br />\r\n&Ocirc;ng Nguyễn Mạnh H&agrave; - Ph&oacute; Tổng Thư k&yacute; Hiệp hội Chủ t&agrave;u Việt Nam cho rằng, chuyển đổi năng lượng xanh kh&ocirc;ng phải b&agrave;i to&aacute;n dễ giải với c&aacute;c doanh nghiệp vận tải biển Việt Nam. Điều n&agrave;y kh&ocirc;ng thể chỉ phụ thuộc v&agrave;o năng lực, nội lực của từng doanh nghiệp m&agrave; cần sự chung tay, hỗ trợ của nhiều cấp, ng&agrave;nh. &Ocirc;ng H&agrave; cho rằng, một trong những ch&iacute;nh s&aacute;ch cụ thể v&agrave; cần thiết để ph&aacute;t triển đội t&agrave;u l&agrave; Ch&iacute;nh phủ c&oacute; cơ chế ch&iacute;nh s&aacute;ch khuyến kh&iacute;ch, miễn thuế nhập khẩu v&agrave; giảm 50% ph&iacute; trọng tải khi chủ t&agrave;u mua v&agrave; khai th&aacute;c t&agrave;u container từ 1.500 TEUS trở l&ecirc;n, t&agrave;u chạy bằng năng lượng sạch như LNG, hydro... đến hết năm 2030.<br />\r\n<br />\r\nChia sẻ với những kh&oacute; khăn của c&aacute;c chủ t&agrave;u Việt Nam, &ocirc;ng Kitack Lim - Tổng Thư k&yacute; IMO cho rằng, Việt Nam l&agrave; quốc gia c&oacute; tốc độ ph&aacute;t triển kinh tế nhanh, c&oacute; tiềm năng lớn để ph&aacute;t triển ng&agrave;nh c&ocirc;ng nghiệp v&igrave; c&oacute; bờ biển d&agrave;i, d&acirc;n số v&agrave; nền kinh tế ph&aacute;t triển nhanh, tăng trưởng kinh tế tốt. Từ đ&acirc;y, &ocirc;ng Kitack Lim b&agrave;y tỏ niềm tin c&aacute;c chủ t&agrave;u, doanh nghiệp vận tải Việt Nam c&oacute; thể thực hiện th&agrave;nh c&ocirc;ng trong c&ocirc;ng cuộc ph&aacute;t triển&nbsp;<a href=\"https://vlr.vn/Hang-hai-xanh-ptag.html\">h&agrave;ng hải xanh</a>&nbsp;v&agrave; bền vững d&ugrave; nhiều kh&oacute; khăn, th&aacute;ch thức./.</p>\r\n', '1713246632'),
(102, 'Tuyển dụng tháng 5', '', '', 'Tuyển Dụng', '', '<p>Cần tuyển gấp chức danh:</p>\r\n\r\n<p>01 ETO.( Y&ecirc;u cầu : c&oacute; tiếng anh, c&oacute; kinh nghiệm đi t&agrave;u Mix)</p>\r\n\r\n<p>01 CO ( Y&ecirc;u cầu : c&oacute; tiếng anh, c&oacute; kinh nghiệm đi t&agrave;u gas)</p>\r\n\r\n<p>Lương thỏa thuận.</p>\r\n\r\n<p>CHI TIẾT LI&Ecirc;N HỆ: C&ocirc;ng Ty Cổ Phần Vận Tải Biển V&agrave; Xuất Nhập Khẩu Nhật Việt.</p>\r\n\r\n<p>- Địa chỉ nộp hồ sơ : Số 69 - đường số 4 - khu đ&ocirc; thị waterfront -Cầu R&agrave;o 2 - Q.L&ecirc; Ch&acirc;n - P. Vĩnh Niệm - TP Hải Ph&ograve;ng.</p>\r\n\r\n<p>- Mr Toản: 0975.779.783</p>\r\n\r\n<p>- Ms Phương : 0364.030.969</p>\r\n\r\n<p>&nbsp;</p>\r\n', '1717510610'),
(103, 'Tuyển dụng', '<p><strong>&aacute;dsada</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>&aacute;dsad</strong></p>\r\n', '66666670a878f5.88064066.png', 'Tuyển Dụng', '66666670a87de3.13943360.png', '<p>xđssds</p>\r\n', '1717986928');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucdanh`
--

CREATE TABLE `chucdanh` (
  `id_chucdanh` int(11) NOT NULL,
  `tenchucdanh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chucdanh`
--

INSERT INTO `chucdanh` (`id_chucdanh`, `tenchucdanh`) VALUES
(20, 'Bác sỹ hoặc nhân viên y tế'),
(22, 'Bếp trưởng'),
(23, 'Cấp dưỡng'),
(37, 'Chưa có'),
(30, 'Kế toán'),
(5, 'Máy hai'),
(4, 'Máy trưởng'),
(32, 'Nhân viên bán hàng'),
(33, 'Nhân viên bán vé'),
(27, 'Nhân viên phục vụ bàn'),
(25, 'Nhân viên phục vụ hành khách'),
(18, 'Nhân viên thông tin vô tuyến'),
(21, 'Phục vụ viên'),
(28, 'Quản lý kho hành lý'),
(19, 'Quản trị'),
(10, 'Sỹ quan an ninh tàu biển'),
(3, 'Sỹ quan boong'),
(9, 'Sỹ quan kỹ thuật điện'),
(6, 'Sỹ quan máy'),
(11, 'Sỹ quan máy lạnh'),
(8, 'Sỹ quan thông tin vô tuyến'),
(36, 'Thợ bơm'),
(29, 'Thợ giặt là'),
(17, 'Thợ kỹ thuật điện'),
(15, 'Thợ máy chính'),
(35, 'Thợ máy lạnh'),
(16, 'Thợ máy trực ca'),
(31, 'Thủ quỹ'),
(13, 'Thủy thủ phó'),
(14, 'Thủy thủ trực ca'),
(12, 'Thủy thủ trưởng'),
(7, 'Thuyền phó hành khách'),
(1, 'Thuyền trưởng'),
(26, 'Tổ trưởng phục vụ bàn'),
(24, 'Tổ trưởng phục vụ hành khách'),
(34, 'Trật tự viên'),
(2, 'Đại phó');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucnang`
--

CREATE TABLE `chucnang` (
  `id` int(20) NOT NULL,
  `tenchucnang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chucnang`
--

INSERT INTO `chucnang` (`id`, `tenchucnang`) VALUES
(1, 'Quản lý bài viết'),
(2, 'Quản lý thuyền viên'),
(3, 'Quản lý danh mục'),
(4, 'Quản lý tài khoản');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chungchi`
--

CREATE TABLE `chungchi` (
  `sogiayto` varchar(11) NOT NULL,
  `loaichungchi` int(11) NOT NULL,
  `id_thuyenvien` int(5) UNSIGNED ZEROFILL NOT NULL,
  `tenchungchi` varchar(255) NOT NULL,
  `ngaycap` date NOT NULL,
  `ngayhethan` date NOT NULL,
  `ghichu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chungchi`
--

INSERT INTO `chungchi` (`sogiayto`, `loaichungchi`, `id_thuyenvien`, `tenchungchi`, `ngaycap`, `ngayhethan`, `ghichu`) VALUES
('11', 1, 00004, 'STCW Advanced Firefighting', '2023-08-25', '2028-08-25', ''),
('12', 2, 00004, 'Engineer Officer Certificate', '2024-11-30', '2029-11-30', ''),
('13', 1, 00005, 'STCW Basic Safety Training', '2023-02-10', '2028-02-10', ''),
('14', 1, 00005, 'STCW Advanced Firefighting', '2023-05-15', '2028-05-15', ''),
('15', 2, 00005, 'Deck Officer Certificate', '2024-10-20', '2029-10-20', ''),
('16', 1, 00006, 'STCW Basic Safety Training', '2023-01-05', '2028-01-05', ''),
('17', 1, 00006, 'STCW Advanced Firefighting', '2023-04-10', '2028-04-10', ''),
('18', 2, 00006, 'Engineer Officer Certificate', '2024-09-15', '2029-09-15', ''),
('19', 1, 00007, 'STCW Basic Safety Training', '2023-07-01', '2024-05-30', ''),
('20', 1, 00007, 'STCW Advanced Firefighting', '2023-10-05', '2024-06-28', ''),
('21', 2, 00007, 'Deck Officer Certificate', '2024-12-10', '2029-12-10', ''),
('25', 1, 00009, 'STCW Basic Safety Training', '2023-06-10', '2028-06-10', ''),
('26', 1, 00009, 'STCW Advanced Firefighting', '2023-09-15', '2028-09-15', ''),
('27', 2, 00009, 'Deck Officer Certificate', '2024-11-20', '2029-11-20', ''),
('28', 1, 00010, 'STCW Basic Safety Training', '2023-07-20', '2028-07-20', ''),
('29', 1, 00010, 'STCW Advanced Firefighting', '2023-10-25', '2028-10-25', ''),
('30', 2, 00010, 'Engineer Officer Certificate', '2025-02-28', '2030-02-28', ''),
('31', 1, 00011, 'STCW Basic Safety Training', '2023-09-05', '2028-09-05', ''),
('32', 1, 00011, 'STCW Advanced Firefighting', '2023-12-10', '2028-12-10', ''),
('33', 2, 00011, 'Deck Officer Certificate', '2025-03-15', '2030-03-15', ''),
('34', 1, 00012, 'STCW Basic Safety Training', '2023-08-01', '2028-08-01', ''),
('35', 1, 00012, 'STCW Advanced Firefighting', '2023-11-05', '2028-11-05', ''),
('36', 2, 00012, 'Engineer Officer Certificate', '2025-04-10', '2030-04-10', ''),
('37', 1, 00013, 'STCW Basic Safety Training', '2023-09-20', '2028-09-20', ''),
('38', 1, 00013, 'STCW Advanced Firefighting', '2023-12-25', '2028-12-25', ''),
('39', 2, 00013, 'Deck Officer Certificate', '2025-05-30', '2030-05-30', ''),
('4', 1, 00002, 'STCW Basic Safety Training', '2023-05-10', '2028-05-10', ''),
('40', 1, 00014, 'STCW Basic Safety Training', '2023-10-15', '2028-10-15', ''),
('41', 1, 00014, 'STCW Advanced Firefighting', '2024-01-20', '2029-01-20', ''),
('42', 2, 00014, 'Engineer Officer Certificate', '2025-06-25', '2030-06-25', ''),
('43', 1, 00015, 'STCW Basic Safety Training', '2023-11-10', '2028-11-10', ''),
('44', 1, 00015, 'STCW Advanced Firefighting', '2024-02-15', '2029-02-15', ''),
('45', 2, 00015, 'Deck Officer Certificate', '2025-07-20', '2030-07-20', ''),
('46', 1, 00016, 'STCW Basic Safety Training', '2023-12-05', '2028-12-05', ''),
('47', 1, 00016, 'STCW Advanced Firefighting', '2024-03-10', '2029-03-10', ''),
('48', 2, 00016, 'Engineer Officer Certificate', '2025-08-15', '2030-08-15', ''),
('49', 1, 00017, 'STCW Basic Safety Training', '2024-01-01', '2029-01-01', ''),
('5', 1, 00002, 'STCW Advanced Firefighting', '2023-06-15', '2024-06-15', ''),
('50', 1, 00017, 'STCW Advanced Firefighting', '2024-04-05', '2029-04-05', ''),
('51', 2, 00017, 'Deck Officer Certificate', '2025-09-10', '2030-09-10', ''),
('52', 1, 00018, 'STCW Basic Safety Training', '2024-02-10', '2029-02-10', ''),
('53', 1, 00018, 'STCW Advanced Firefighting', '2024-05-15', '2029-05-15', ''),
('54', 2, 00018, 'Engineer Officer Certificate', '2025-10-20', '2030-10-20', ''),
('55', 1, 00019, 'STCW Basic Safety Training', '2024-03-05', '2029-03-05', ''),
('56', 1, 00019, 'STCW Advanced Firefighting', '2024-06-10', '2029-06-10', ''),
('57', 2, 00019, 'Deck Officer Certificate', '2025-11-15', '2030-11-15', ''),
('58', 1, 00020, 'STCW Basic Safety Training', '2024-04-01', '2029-04-01', ''),
('59', 1, 00020, 'STCW Advanced Firefighting', '2024-07-05', '2029-07-05', ''),
('6', 2, 00002, 'Engineer Officer Certificate', '2024-08-20', '2029-08-20', ''),
('60', 2, 00020, 'Engineer Officer Certificate', '2025-12-10', '2030-12-10', ''),
('61', 1, 00021, 'STCW Basic Safety Training', '2024-05-10', '2029-05-10', ''),
('62', 1, 00021, 'STCW Advanced Firefighting', '2024-08-15', '2029-08-15', ''),
('63', 2, 00021, 'Deck Officer Certificate', '2026-01-20', '2031-01-20', ''),
('789', 1, 00111, 'Giấy chứng nhận huấn luyện nghiệp vụ chuyên môn', '2021-09-20', '2026-09-20', ''),
('8', 1, 00003, 'STCW Advanced Firefighting', '2023-07-10', '2028-07-10', ''),
('9', 2, 00003, 'Deck Officer Certificate', '2024-03-27', '2024-06-28', ''),
('adsadsa', 2, 00115, 'adsadas', '2024-05-27', '2024-06-10', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(5) NOT NULL,
  `tendanhmuc` varchar(50) NOT NULL,
  `sobaiviet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `tendanhmuc`, `sobaiviet`) VALUES
(13, 'Dịch Vụ', 5),
(16, 'Tin Tức - Sự Kiện', 2),
(26, 'Tuyển Dụng', -2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hopdonglentau`
--

CREATE TABLE `hopdonglentau` (
  `sohopdong` varchar(50) NOT NULL,
  `hopdong_tv` int(5) UNSIGNED ZEROFILL NOT NULL,
  `tau` varchar(20) NOT NULL,
  `chucdanh` varchar(255) NOT NULL,
  `ngaybatdau` date NOT NULL,
  `thoihan` int(11) NOT NULL,
  `ngayky` date NOT NULL,
  `nguoiky` varchar(50) NOT NULL,
  `chucdanh_nguoiky` varchar(50) NOT NULL,
  `nguoisdld` varchar(50) NOT NULL,
  `diachi_nguoisdld` varchar(255) NOT NULL,
  `trangthai` tinyint(11) NOT NULL,
  `file_scan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hopdonglentau`
--

INSERT INTO `hopdonglentau` (`sohopdong`, `hopdong_tv`, `tau`, `chucdanh`, `ngaybatdau`, `thoihan`, `ngayky`, `nguoiky`, `chucdanh_nguoiky`, `nguoisdld`, `diachi_nguoisdld`, `trangthai`, `file_scan`) VALUES
('dssdssfs', 00115, 'IMO9074723', 'Nhân viên phục vụ bàn', '2024-07-06', 10, '2024-06-15', 'Sdsfds', 'sdfsd', 'Sdfds', 'sdfds', 0, ''),
('fgfgf', 00030, 'IMO9074720', 'Sỹ quan boong', '2021-04-14', 1, '2021-02-15', 'Trần Thị D', 'Giám đốc', 'Hoàng Văn Dũng', '456 Đường XYZ, Quận 4, TP.HCM', 1, ''),
('HD004', 00001, 'IMO9074725', 'Sỹ quan thông tin vô tuyến', '2024-05-28', 10, '2024-05-27', 'Nguyễn Văn A', 'Giám đốc', 'Hoàng Văn Dũng', '456 Đường XYZ, Quận 4, TP.HCM', 1, ''),
('HD005', 00002, 'IMO9074720', 'Sỹ quan kỹ thuật điện', '2022-05-01', 10, '2022-02-01', 'Nguyễn Văn B', 'Giám đốc', 'Nguyễn Thị Hằng', '123 Đường ABC, Quận 1, TP.HCM', 1, ''),
('HD011', 00003, 'IMO9074720', 'Máy hai', '2022-06-01', 10, '2022-05-25', 'Nguyễn Văn C', 'Phó giám đốc', 'Lê Thị Mai', '789 Đường KLM, Quận 3, TP.HCM', 1, ''),
('HD012', 00003, 'IMO9074720', 'Sỹ quan máy', '2024-06-15', 10, '2024-06-10', 'Nguyễn Văn C', 'Giám đốc', 'Hoàng Văn Dũng', '456 Đường XYZ, Quận 4, TP.HCM', 1, ''),
('HD016', 00004, 'IMO9074725', 'Sỹ quan an ninh tàu biển', '2023-02-17', 10, '2023-01-06', 'Trần Thị D', 'Giám đốc', 'Hoàng Văn Dũng', '456 Đường XYZ, Quận 4, TP.HCM', 1, ''),
('HD019', 00005, 'IMO9074720', 'Thủy thủ trực ca', '2024-06-01', 10, '2024-05-25', 'Lê Thị Ngọc', 'Giám đốc', 'Lê Thị Mai', '789 Đường KLM, Quận 3, TP.HCM', 1, ''),
('HD020', 00005, 'IMO9074729', 'Sỹ quan kỹ thuật điện', '2024-06-15', 12, '2024-06-10', 'Phạm Văn Công', 'Phó giám đốc', 'Hoàng Văn Dũng', '456 Đường XYZ, Quận 4, TP.HCM', 0, 'HD_scan/9a91e933b1.pdf'),
('HD028', 00006, 'IMO9074726', 'Sỹ quan an ninh tàu biển', '2024-08-15', 10, '2024-08-10', 'Phạm Văn Đức', 'Phó giám đốc', 'Hoàng Văn Dũng', '456 Đường XYZ, Quận 4, TP.HCM', 0, ''),
('HD029', 00007, 'IMO9074727', 'Máy trưởng', '2024-09-01', 10, '2024-08-25', 'Nguyễn Thị Thu', 'Phó giám đốc', 'Nguyễn Thị Hằng', '123 Đường ABC, Quận 1, TP.HCM', 0, ''),
('HD036', 00008, 'IMO9074728', 'Sỹ quan máy', '2024-12-15', 10, '2024-12-10', 'Phạm Thị Hương', 'Phó giám đốc', 'Hoàng Văn Dũng', '456 Đường XYZ, Quận 4, TP.HCM', 0, ''),
('HD040', 00009, 'IMO9074722', 'Thuyền phó hành khách', '2025-02-15', 10, '2025-02-10', 'Phạm Thị Ngọc', 'Phó giám đốc', 'Hoàng Văn Dũng', '456 Đường XYZ, Quận 4, TP.HCM', 0, ''),
('HD043', 00010, 'IMO9074723', 'Sỹ quan an ninh tàu biển', '2025-04-01', 10, '2025-03-25', 'Lê Thị Linh', 'Giám đốc', 'Lê Thị Mai', '789 Đường KLM, Quận 3, TP.HCM', 0, ''),
('HD048', 00011, 'IMO9074725', 'Thủy thủ trưởng', '2025-06-15', 10, '2025-06-10', 'Phạm Văn Nam', 'Phó giám đốc', 'Hoàng Văn Dũng', '456 Đường XYZ, Quận 4, TP.HCM', 0, ''),
('HD052', 00012, 'IMO9074721', 'Máy hai', '2025-08-15', 10, '2025-08-10', 'Hoàng Văn Dũng', 'Phó giám đốc', 'Hoàng Văn Dũng', '456 Đường XYZ, Quận 4, TP.HCM', 0, ''),
('HD056', 00013, 'IMO9074724', 'Máy trưởng', '2025-10-15', 10, '2025-10-10', 'Hoàng Văn D', 'Phó giám đốc', 'Hoàng Văn Dũng', '456 Đường XYZ, Quận 4, TP.HCM', 0, ''),
('HD060', 00014, 'IMO9074723', 'Đại phó', '2025-12-15', 10, '2025-12-10', 'Hoàng Văn H', 'Phó giám đốc', 'Hoàng Văn Dũng', '456 Đường XYZ, Quận 4, TP.HCM', 0, ''),
('HD064', 00015, 'IMO9074720', 'Sỹ quan an ninh tàu biển', '2023-01-15', 10, '2022-12-05', 'Hoàng Văn M', 'Phó giám đốc', 'Hoàng Văn Dũng', '456 Đường XYZ, Quận 4, TP.HCM', 1, ''),
('HD068', 00016, 'IMO9074726', 'Thủy thủ trực ca', '2026-04-15', 10, '2026-04-10', 'Hoàng Văn Q', 'Phó giám đốc', 'Hoàng Văn Dũng', '456 Đường XYZ, Quận 4, TP.HCM', 0, ''),
('HD072', 00017, 'IMO9074720', 'Sỹ quan an ninh tàu biển', '2026-06-15', 10, '2026-06-10', 'Hoàng Văn U', 'Phó giám đốc', 'Hoàng Văn Dũng', '456 Đường XYZ, Quận 4, TP.HCM', 0, ''),
('HD076', 00018, 'IMO9074720', 'Sỹ quan an ninh tàu biển', '2026-08-15', 10, '2026-08-10', 'Hoàng Văn Y', 'Phó giám đốc', 'Hoàng Văn Dũng', '456 Đường XYZ, Quận 4, TP.HCM', 0, ''),
('HD080', 00019, 'IMO9074720', 'Sỹ quan an ninh tàu biển', '2026-10-15', 10, '2026-10-10', 'Hoàng Văn C1', 'Phó giám đốc', 'Hoàng Văn Dũng', '456 Đường XYZ, Quận 4, TP.HCM', 0, ''),
('HD084', 00020, 'IMO9074720', 'Sỹ quan an ninh tàu biển', '2026-12-15', 10, '2026-12-10', 'Hoàng Văn E4', 'Phó giám đốc', 'Hoàng Văn Dũng', '456 Đường XYZ, Quận 4, TP.HCM', 0, ''),
('HD088', 00021, 'IMO9074720', 'Sỹ quan an ninh tàu biển', '2027-02-15', 10, '2027-02-10', 'Hoàng Văn F4', 'Phó giám đốc', 'Hoàng Văn Dũng', '456 Đường XYZ, Quận 4, TP.HCM', 0, ''),
('HD092', 00022, 'IMO9074720', 'Sỹ quan an ninh tàu biển', '2027-04-15', 10, '2027-04-10', 'Hoàng Văn G4', 'Phó giám đốc', 'Hoàng Văn Dũng', '456 Đường XYZ, Quận 4, TP.HCM', 0, ''),
('HD096', 00023, 'IMO9074720', 'Sỹ quan an ninh tàu biển', '2027-06-15', 10, '2027-06-10', 'Hoàng Văn H4', 'Phó giám đốc', 'Hoàng Văn Dũng', '456 Đường XYZ, Quận 4, TP.HCM', 0, ''),
('HD097221', 00111, 'IMO9074725', 'Thủy thủ trưởng', '2024-06-15', 10, '2024-06-10', 'Nguyễn Văn C', 'Giám đốc', 'Hoàng Văn Dũng', '789 Đường KLM, Quận 3, TP.HCM', 0, ''),
('hd1323', 00117, 'IMO9074723', 'Nhân viên phục vụ hành khách', '2024-06-22', 10, '2024-06-13', 'Sđs', 'sđ', 'Sds', 'sdsd', 0, 'HD_scan/41596c9ac9.pdf'),
('HD90', 00028, 'IMO9074727', 'Máy hai', '2022-03-20', 10, '2022-01-02', 'Phạm Văn Chính', 'phó giám đốc', 'Hoàng Văn Dũng', '456 Đường XYZ, Quận 4, TP.HCM', 1, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khenthuongkyluat`
--

CREATE TABLE `khenthuongkyluat` (
  `soquyetdinh` varchar(32) NOT NULL,
  `hinhthuc` varchar(255) NOT NULL,
  `ngayky` date NOT NULL,
  `loaihinh` tinyint(1) NOT NULL,
  `ghichu` text NOT NULL,
  `id_thuyenvien` int(5) UNSIGNED ZEROFILL NOT NULL,
  `lydo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khenthuongkyluat`
--

INSERT INTO `khenthuongkyluat` (`soquyetdinh`, `hinhthuc`, `ngayky`, `loaihinh`, `ghichu`, `id_thuyenvien`, `lydo`) VALUES
('ádsdsd', 'sadsa', '2024-07-05', 4, 'sadsa', 00115, 'ádasdsa'),
('QD005', 'Thưởng tiền mặt', '2024-05-03', 1, 'Thuyền viên hoàn thành nhiệm vụ trách nhiệm', 00002, 'Thực hiện nhiệm vụ trách nhiệm'),
('QD006', 'Kỷ luật nhẹ', '2024-05-09', 2, 'Thuyền viên không tuân thủ quy tắc sử dụng điện thoại', 00002, 'Sử dụng điện thoại trong giờ làm việc'),
('QD007', 'Giấy khen', '2024-05-15', 1, 'Thuyền viên hoàn thành nhiệm vụ vượt bậc', 00002, 'Thực hiện công việc vượt bậc'),
('QD008', 'Kỷ luật nặng', '2024-05-20', 3, 'Thuyền viên không tuân thủ quy tắc an toàn khi vận hành tàu', 00002, 'Cố ý gây ra va chạm khi vận hành tàu'),
('QD009', 'Giấy khen', '2024-05-04', 1, 'Thuyền viên hoàn thành nhiệm vụ một cách chuyên nghiệp', 00003, 'Thực hiện nhiệm vụ một cách chuyên nghiệp'),
('QD010', 'Kỷ luật nhẹ', '2024-05-07', 0, 'Thuyền viên không tuân thủ quy tắc vệ sinh cá nhân', 00003, 'Không giữ gìn vệ sinh cá nhân'),
('QD011', 'Thưởng tiền mặt', '2024-05-10', 1, 'Thuyền viên hoàn thành nhiệm vụ trách nhiệm', 00003, 'Thực hiện nhiệm vụ trách nhiệm'),
('QD012', 'Kỷ luật nặng', '2024-05-14', 0, 'Thuyền viên không tuân thủ quy tắc an toàn khi thời tiết xấu', 00003, 'Thiếu kiểm soát khi thời tiết xấu'),
('QD013', 'Kỷ luật nhẹ', '2024-05-16', 0, 'Thuyền viên không tuân thủ quy tắc sử dụng thiết bị cá nhân', 00004, 'Sử dụng thiết bị cá nhân trong giờ làm việc'),
('QD014', 'Giấy khen', '2024-05-18', 1, 'Thuyền viên hoàn thành nhiệm vụ một cách xuất sắc', 00004, 'Hoàn thành nhiệm vụ một cách xuất sắc'),
('QD015', 'Kỷ luật nặng', '2024-05-22', 4, 'Thuyền viên không tuân thủ quy tắc an toàn khi vận hành tàu', 00004, 'Vi phạm quy định an toàn khi vận hành tàu'),
('QD016', 'Thưởng tiền mặt', '2024-05-25', 1, 'Thuyền viên hoàn thành nhiệm vụ trách nhiệm', 00004, 'Thực hiện nhiệm vụ trách nhiệm'),
('QD017', 'Giấy khen', '2024-05-28', 1, 'Thuyền viên hoàn thành nhiệm vụ một cách chuyên nghiệp', 00005, 'Thực hiện nhiệm vụ một cách chuyên nghiệp'),
('QD018', 'Kỷ luật nhẹ', '2024-05-30', 0, 'Thuyền viên không tuân thủ quy tắc sử dụng trang thiết bị an toàn', 00005, 'Không tuân thủ quy tắc sử dụng trang thiết bị an toàn'),
('QD019', 'Thưởng tiền mặt', '2024-06-02', 1, 'Thuyền viên hoàn thành nhiệm vụ trách nhiệm', 00005, 'Thực hiện nhiệm vụ trách nhiệm'),
('QD020', 'Kỷ luật nặng', '2024-06-05', 0, 'Thuyền viên gây ra thất thoát nghiêm trọng cho công ty', 00005, 'Gây ra thất thoát nghiêm trọng'),
('QD021', 'Kỷ luật nhẹ', '2024-06-08', 0, 'Thuyền viên thiếu trách nhiệm trong việc bảo dưỡng thiết bị', 00006, 'Thiếu trách nhiệm trong việc bảo dưỡng thiết bị'),
('QD022', 'Giấy khen', '2024-06-10', 1, 'Thuyền viên hoàn thành nhiệm vụ một cách xuất sắc', 00006, 'Thực hiện nhiệm vụ một cách xuất sắc'),
('QD023', 'Kỷ luật nặng', '2024-06-14', 0, 'Thuyền viên gây ra tai nạn lao động nghiêm trọng', 00006, 'Gây ra tai nạn lao động nghiêm trọng'),
('QD024', 'Thưởng tiền mặt', '2024-06-18', 1, 'Thuyền viên hoàn thành nhiệm vụ trách nhiệm', 00006, 'Thực hiện nhiệm vụ trách nhiệm'),
('QD025', 'Thưởng tiền mặt', '2024-06-22', 1, 'Thuyền viên hoàn thành nhiệm vụ trách nhiệm', 00007, 'Thực hiện nhiệm vụ trách nhiệm'),
('QD026', 'Kỷ luật nhẹ', '2024-06-25', 0, 'Thuyền viên không giữ gìn vệ sinh cá nhân trong lúc làm việc', 00007, 'Không giữ gìn vệ sinh cá nhân'),
('QD027', 'Giấy khen', '2024-06-28', 1, 'Thuyền viên hoàn thành công việc một cách chuyên nghiệp', 00007, 'Thực hiện công việc một cách chuyên nghiệp'),
('QD028', 'Kỷ luật nặng', '2024-07-01', 0, 'Thuyền viên vi phạm nghiêm trọng quy tắc an toàn', 00007, 'Vi phạm nghiêm trọng quy tắc an toàn'),
('QD030', 'Giấy khen', '2024-07-10', 1, '', 00111, 'Thực hiện nhiệm vụ một cách chuyên nghiệp'),
('QD033', 'Giấy khen', '2024-07-25', 1, 'Thuyền viên hoàn thành nhiệm vụ một cách xuất sắc', 00009, 'Thực hiện nhiệm vụ một cách xuất sắc'),
('QD034', 'Kỷ luật nhẹ', '2024-07-28', 0, 'Thuyền viên sử dụng thiết bị cá nhân trong giờ làm việc', 00009, 'Sử dụng thiết bị cá nhân trong giờ làm việc'),
('QD035', 'Thưởng tiền mặt', '2024-08-01', 1, 'Thuyền viên hoàn thành nhiệm vụ trách nhiệm', 00009, 'Thực hiện nhiệm vụ trách nhiệm'),
('QD036', 'Kỷ luật nặng', '2024-08-05', 0, 'Thuyền viên vi phạm nghiêm trọng luật pháp hải quan', 00009, 'Vi phạm nghiêm trọng luật pháp hải quan'),
('QD037', 'Kỷ luật nhẹ', '2024-08-08', 0, 'Thuyền viên không tuân thủ quy trình vận hành tàu', 00010, 'Không tuân thủ quy trình vận hành tàu'),
('QD038', 'Giấy khen', '2024-08-12', 1, 'Thuyền viên hoàn thành công việc một cách chuyên nghiệp', 00010, 'Thực hiện công việc một cách chuyên nghiệp'),
('QD039', 'Kỷ luật nặng', '2024-08-15', 0, 'Thuyền viên gây ra tai nạn lao động nghiêm trọng', 00010, 'Gây ra tai nạn lao động nghiêm trọng'),
('QD040', 'Thưởng tiền mặt', '2024-06-12', 0, 'Thuyền viên hoàn thành nhiệm vụ trách nhiệm', 00010, 'Thực hiện nhiệm vụ trách nhiệm'),
('sdfgrg', 'fdfdf', '2024-06-21', 4, '', 00006, 'dfdvdv');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kinhnghiemditau`
--

CREATE TABLE `kinhnghiemditau` (
  `id` int(11) NOT NULL,
  `id_thuyenvien` int(5) UNSIGNED ZEROFILL NOT NULL,
  `tentau` varchar(255) NOT NULL,
  `loaitau` varchar(255) NOT NULL,
  `chucdanh` int(11) NOT NULL,
  `thoigianbatdau` date NOT NULL,
  `thoigianketthuc` date NOT NULL,
  `lydodoitau` varchar(255) NOT NULL,
  `ghichu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `kinhnghiemditau`
--

INSERT INTO `kinhnghiemditau` (`id`, `id_thuyenvien`, `tentau`, `loaitau`, `chucdanh`, `thoigianbatdau`, `thoigianketthuc`, `lydodoitau`, `ghichu`) VALUES
(6, 00002, 'Titanic', 'Tàu chở dầu', 9, '2020-01-15', '2020-11-15', 'Dẫn dắt tàu qua Đại Tây Dương', 'Ghi chú 1'),
(7, 00002, 'Ocean Star', 'Tàu chở dầu', 6, '2021-02-10', '2021-12-10', 'Thực hiện các hoạt động giải trí cho hành khách', 'Ghi chú 2'),
(11, 00003, 'Serenity II', 'Tàu chở dầu', 1, '2020-07-01', '2020-07-15', 'Thực hiện các nhiệm vụ kiểm soát tàu', 'Ghi chú 1'),
(12, 00003, 'Titanic', 'Tàu chở dầu', 2, '2020-09-01', '2020-09-30', 'Thực hiện các hoạt động giải trí cho hành khách', 'Ghi chú 2'),
(13, 00003, 'Ocean Star', 'Tàu chở dầu', 3, '2020-11-01', '2020-11-30', 'Hỗ trợ trong hoạt động điều khiển tàu', 'Ghi chú 3'),
(14, 00003, 'Explorer', 'Tàu chở dầu', 4, '2021-01-01', '2021-01-31', 'Thực hiện các nhiệm vụ nghiên cứu', 'Ghi chú 4'),
(15, 00003, 'Sailing Ship', 'Tàu chở dầu', 5, '2021-03-01', '2021-03-31', 'Thực hiện việc vận chuyển hàng hóa', 'Ghi chú 5'),
(16, 00004, 'Explorer', 'Tàu chở dầu', 7, '2020-08-01', '2024-05-21', 'Dẫn dắt tàu qua Đại Tây Dương', 'Ghi chú 1'),
(17, 00004, 'Titanic', 'Tàu chở dầu', 2, '2020-10-01', '2020-10-31', 'Thực hiện các hoạt động giải trí cho hành khách', 'Ghi chú 2'),
(18, 00004, 'Serenity II', 'Tàu chở dầu', 3, '2020-12-01', '2020-12-31', 'Hỗ trợ trong hoạt động điều khiển tàu', 'Ghi chú 3'),
(19, 00004, 'Sailing Ship', 'Tàu chở dầu', 4, '2021-02-01', '2021-02-28', 'Thực hiện các nhiệm vụ nghiên cứu', 'Ghi chú 4'),
(20, 00004, 'Ocean Voyager', 'Tàu chở dầu', 5, '2021-04-01', '2021-04-30', 'Thực hiện việc vận chuyển hàng hóa', 'Ghi chú 5'),
(21, 00005, 'Ocean Star', 'Tàu chở dầu', 1, '2020-05-01', '2020-05-15', 'Thực hiện các nhiệm vụ kiểm soát tàu', 'Ghi chú 1'),
(22, 00005, 'Titanic', 'Tàu chở dầu', 2, '2020-07-01', '2020-07-30', 'Thực hiện các hoạt động giải trí cho hành khách', 'Ghi chú 2'),
(23, 00005, 'Serenity II', 'Tàu chở dầu', 3, '2020-09-01', '2020-09-30', 'Hỗ trợ trong hoạt động điều khiển tàu', 'Ghi chú 3'),
(24, 00005, 'Explorer', 'Tàu chở dầu', 4, '2020-11-01', '2020-11-30', 'Thực hiện các nhiệm vụ nghiên cứu', 'Ghi chú 4'),
(25, 00005, 'Sailing Ship', 'Tàu chở dầu', 5, '2021-01-01', '2021-01-31', 'Thực hiện việc vận chuyển hàng hóa', 'Ghi chú 5'),
(26, 00006, 'Titanic', 'Tàu chở dầu', 1, '2020-06-01', '2020-06-15', 'Dẫn dắt tàu qua Đại Tây Dương', 'Ghi chú 1'),
(27, 00006, 'Ocean Star', 'Tàu chở dầu', 2, '2020-08-01', '2020-08-30', 'Thực hiện các hoạt động giải trí cho hành khách', 'Ghi chú 2'),
(28, 00006, 'Serenity II', 'Tàu chở dầu', 3, '2020-10-01', '2020-10-31', 'Hỗ trợ trong hoạt động điều khiển tàu', 'Ghi chú 3'),
(29, 00006, 'Explorer', 'Tàu chở dầu', 4, '2020-12-01', '2020-12-31', 'Thực hiện các nhiệm vụ nghiên cứu', 'Ghi chú 4'),
(30, 00006, 'Sailing Ship', 'Tàu chở dầu', 5, '2021-02-01', '2021-02-28', 'Thực hiện việc vận chuyển hàng hóa', 'Ghi chú 5'),
(31, 00011, 'Ocean Star', 'Tàu chở dầu', 1, '2020-05-01', '2020-05-15', 'Thực hiện các nhiệm vụ kiểm soát tàu', 'Ghi chú 1'),
(32, 00011, 'Titanic', 'Tàu chở dầu', 2, '2020-07-01', '2020-07-30', 'Thực hiện các hoạt động giải trí cho hành khách', 'Ghi chú 2'),
(33, 00011, 'Serenity II', 'Tàu chở dầu', 3, '2020-09-01', '2020-09-30', 'Hỗ trợ trong hoạt động điều khiển tàu', 'Ghi chú 3'),
(34, 00011, 'Explorer', 'Tàu chở dầu', 4, '2020-11-01', '2020-11-30', 'Thực hiện các nhiệm vụ nghiên cứu', 'Ghi chú 4'),
(35, 00011, 'Sailing Ship', 'Tàu chở dầu', 5, '2021-01-01', '2021-01-31', 'Thực hiện việc vận chuyển hàng hóa', 'Ghi chú 5'),
(36, 00012, 'Titanic', 'Tàu chở dầu', 1, '2020-06-01', '2020-06-15', 'Dẫn dắt tàu qua Đại Tây Dương', 'Ghi chú 1'),
(37, 00012, 'Ocean Star', 'Tàu chở dầu', 2, '2020-08-01', '2020-08-30', 'Thực hiện các hoạt động giải trí cho hành khách', 'Ghi chú 2'),
(38, 00012, 'Serenity II', 'Tàu chở dầu', 3, '2020-10-01', '2020-10-31', 'Hỗ trợ trong hoạt động điều khiển tàu', 'Ghi chú 3'),
(39, 00012, 'Explorer', 'Tàu chở dầu', 4, '2020-12-01', '2020-12-31', 'Thực hiện các nhiệm vụ nghiên cứu', 'Ghi chú 4'),
(40, 00012, 'Sailing Ship', 'Tàu chở dầu', 5, '2021-02-01', '2021-02-28', 'Thực hiện việc vận chuyển hàng hóa', 'Ghi chú 5'),
(41, 00012, 'AN HAI VINCENT', 'Tàu hàng hóa', 0, '2025-07-10', '2026-05-10', 'Hết hợp đồng', ''),
(43, 00028, 'HAIAN VIEW', 'Tàu hàng hóa', 0, '2024-09-20', '2025-07-20', 'Hết hợp đồng', ''),
(44, 00003, 'AN HAI VINCENT', 'Tàu hàng hóa', 11, '2024-05-10', '2025-03-10', 'Hết hợp đồng', 'XK Nhật Việt'),
(48, 00005, 'AN HAI VINCENT', 'Tàu hàng hóa', 14, '2024-06-01', '2025-04-01', 'Hết hợp đồng', 'XK Nhật Việt'),
(50, 00004, 'FORTUNE FREIGHTER', 'Tàu du lịch', 10, '2023-02-17', '2023-12-17', 'Hết hợp đồng', 'XK Nhật Việt'),
(51, 00015, 'AN HAI VINCENT', 'Tàu hàng hóa', 10, '2023-01-15', '2023-11-15', 'Hết hợp đồng', ''),
(52, 00028, 'HAIAN VIEW', 'Tàu hàng hóa', 5, '2022-03-20', '2023-01-20', 'Hết hợp đồng', ''),
(53, 00030, 'AN HAI VINCENT', 'Tàu hàng hóa', 3, '2021-04-14', '2021-05-14', 'Hết hợp đồng', ''),
(54, 00002, 'AN HAI VINCENT', 'Tàu hàng hóa', 9, '2022-05-01', '2023-03-01', 'Hết hợp đồng', 'XK Nhật Việt'),
(56, 00001, 'FORTUNE FREIGHTER', 'Tàu du lịch', 8, '2024-05-28', '2025-03-28', 'Hết hợp đồng', 'XK Nhật Việt'),
(57, 00111, 'AN HAI', 'Chở dầu', 12, '2020-06-30', '2021-04-30', 'nhf', ''),
(60, 00115, 'haid', 'chở dầu', 18, '2020-12-20', '2021-10-20', 'sadsad', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaichungchi`
--

CREATE TABLE `loaichungchi` (
  `id_loaichungchi` int(11) NOT NULL,
  `tenloaichungchi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaichungchi`
--

INSERT INTO `loaichungchi` (`id_loaichungchi`, `tenloaichungchi`) VALUES
(1, 'Chứng chỉ thuyền viên'),
(2, 'Chứng chỉ ngoại ngữ'),
(3, 'Chứng nhận y tế'),
(4, 'VISA');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaitau`
--

CREATE TABLE `loaitau` (
  `id` int(11) NOT NULL,
  `tenloaitau` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaitau`
--

INSERT INTO `loaitau` (`id`, `tenloaitau`) VALUES
(1, 'Tàu container'),
(2, 'Tàu chở dầu'),
(3, 'Tàu chở khí đốt'),
(4, 'Tàu hàng hóa'),
(5, 'Tàu du lịch'),
(6, 'Tàu cá');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoithan`
--

CREATE TABLE `nguoithan` (
  `id` int(11) NOT NULL,
  `id_thuyenvien` int(5) UNSIGNED ZEROFILL NOT NULL,
  `quanhe` varchar(100) NOT NULL,
  `namsinh` int(11) NOT NULL,
  `dienthoai` varchar(20) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `ghichu` varchar(255) NOT NULL,
  `hoten` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nguoithan`
--

INSERT INTO `nguoithan` (`id`, `id_thuyenvien`, `quanhe`, `namsinh`, `dienthoai`, `diachi`, `ghichu`, `hoten`) VALUES
(14, 00002, 'Vợ', 1982, '123456789', '123 Đường ABC, Quận XYZ, TP.HCM', 'Người liên lạc khi khẩn cấp', 'Nguyễn Minh Anh'),
(15, 00002, 'Con gái', 2008, '987654321', '456 Đường XYZ, Quận ABC, Hải Phòng', '', 'Trần Nam Tú'),
(16, 00002, 'Bố', 1955, '135792468', '789 Đường XYZ, Quận ABC, Đà Nẵng', 'Người phụ thuộc', 'Trần Văn Hồng'),
(18, 00003, 'Mẹ', 1965, '987654321', '456 Đường XYZ, Quận ABC, Hải Phòng', 'Cần liên hệ khi có sự cố', 'Nguyễn Thị Thảo'),
(19, 00003, 'Anh trai', 1990, '135792468', '789 Đường XYZ, Quận ABC, Đà Nẵng', 'Đang làm việc tạo công ty XYZ', 'Lê Văn Hải'),
(20, 00004, 'Vợ', 1978, '123456789', '123 Đường ABC, Quận XYZ, TP.HCM', 'Người thân quan trọng nhất', 'Nguyễn Thị Mai'),
(21, 00004, 'Con gái', 2005, '987654321', '456 Đường XYZ, Quận ABC, Hải Phòng', 'Cần liên hệ khi có sự cố', 'Phạm Lan'),
(22, 00004, 'Mẹ', 1949, '1234567890', '779 Đường XYZ, Quận ABC, Đà Nẵng', '', 'Lê Thị Liên'),
(23, 00005, 'Em trai', 1999, '123456789', '123 Đường ABC, Quận XYZ, TP.HCM', 'Cần liên hệ khi có sự cố', 'Hoàng Thế Hùng'),
(24, 00005, 'Mẹ', 1970, '987654321', '456 Đường XYZ, Quận ABC, Hải Phòng', 'Đã nghỉ hưu', 'Nguyễn Thị Thu'),
(25, 00005, 'Anh trai', 1988, '135792468', '789 Đường XYZ, Quận ABC, Đà Nẵng', 'Làm việc tại công ty ABC', 'Hoàng Văn Nam'),
(26, 00006, 'Vợ', 1983, '123456789', '123 Đường ABC, Quận XYZ, TP.HCM', 'Người thân quan trọng nhất', 'Nguyễn Văn Minh'),
(27, 00006, 'Con gái', 2009, '987654321', '456 Đường XYZ, Quận ABC, Hải Phòng', 'Cần liên hệ khi có sự cố', 'Trần Thị Hạnh'),
(28, 00006, 'Bố', 1958, '135792468', '789 Đường XYZ, Quận ABC, Đà Nẵng', 'Đang học tại trường Đại học XYZ', 'Lê Văn Phú'),
(29, 00007, 'Con trai', 2003, '123456789', '123 Đường ABC, Quận XYZ, TP.HCM', 'Cần liên hệ khi có sự cố', 'Nguyễn Thị Hương'),
(30, 00007, 'Mẹ', 1968, '987654321', '456 Đường XYZ, Quận ABC, Hải Phòng', 'Đã nghỉ hưu', 'Phạm Văn Đức'),
(31, 00007, 'Anh trai', 1992, '135792468', '789 Đường XYZ, Quận ABC, Đà Nẵng', 'Làm việc tại công ty ABC', 'Hoàng Thị Trang'),
(35, 00009, 'Con gái', 2001, '123456789', '123 Đường ABC, Quận XYZ, TP.HCM', 'Người thân quan trọng nhất', 'Nguyễn Thị Hương'),
(36, 00009, 'Mẹ', 1972, '987654321', '456 Đường XYZ, Quận ABC, Hải Phòng', 'Cần liên hệ khi có sự cố', 'Nguyễn Văn Hoàng'),
(37, 00009, 'Anh trai', 1989, '135792468', '789 Đường XYZ, Quận ABC, Đà Nẵng', 'Làm việc tại công ty ABC', 'Trần Thị Thanh'),
(38, 00010, 'Vợ', 1980, '123456789', '123 Đường ABC, Quận XYZ, TP.HCM', 'Người thân quan trọng nhất', 'Nguyễn Văn Dương'),
(39, 00010, 'Con trai', 2007, '987654321', '456 Đường XYZ, Quận ABC, Hải Phòng', 'Cần liên hệ khi có sự cố', 'Trần Thị Lan'),
(40, 00010, 'Mẹ', 1955, '135792468', '789 Đường XYZ, Quận ABC, Đà Nẵng', 'Đã nghỉ hưu', 'Lê Văn Hưng'),
(41, 00011, 'Con gái', 2000, '123456789', '123 Đường ABC, Quận XYZ, TP.HCM', 'Cần liên hệ khi có sự cố', 'Nguyễn Thị Hương'),
(42, 00011, 'Mẹ', 1973, '987654321', '456 Đường XYZ, Quận ABC, Hải Phòng', 'Đã nghỉ hưu', 'Nguyễn Văn Hoàng'),
(43, 00011, 'Anh trai', 1990, '135792468', '789 Đường XYZ, Quận ABC, Đà Nẵng', 'Làm việc tại công ty ABC', 'Trần Thị Thanh'),
(44, 00012, 'Vợ', 1982, '123456789', '123 Đường ABC, Quận XYZ, TP.HCM', 'Người thân quan trọng nhất', 'Nguyễn Văn Dương'),
(46, 00012, 'Bố', 1957, '135792468', '789 Đường XYZ, Quận ABC, Đà Nẵng', 'Đang học tại trường Đại học XYZ', 'Lê Văn Hưng'),
(47, 00111, 'bố', 1965, '987654568', 'hải phòng', 'Liên lạc khi khẩn cấp', 'Trần Trong Trinh'),
(49, 00115, 'hghg', 1969, '0987654321', 'hghg', 'gfg', 'Hghgh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `tendangnhap` varchar(50) NOT NULL,
  `machucnang` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`tendangnhap`, `machucnang`) VALUES
('hoa', 1),
('hue', 1),
('hue', 2),
('hue3', 2),
('hue', 3),
('hue3', 3),
('hue', 4),
('van', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `tendangnhap` varchar(50) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `trangthai` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`tendangnhap`, `matkhau`, `trangthai`) VALUES
('hoa', '827ccb0eea8a706c4c34a16891f84e7b', 1),
('hue', '827ccb0eea8a706c4c34a16891f84e7b', 1),
('hue3', '827ccb0eea8a706c4c34a16891f84e7b', 1),
('van', '827ccb0eea8a706c4c34a16891f84e7b', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tau`
--

CREATE TABLE `tau` (
  `id` varchar(20) NOT NULL,
  `tentau` varchar(255) NOT NULL,
  `loaitau_id` int(11) NOT NULL,
  `noidangky` varchar(255) NOT NULL,
  `trongtai` varchar(255) NOT NULL,
  `ghichu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tau`
--

INSERT INTO `tau` (`id`, `tentau`, `loaitau_id`, `noidangky`, `trongtai`, `ghichu`) VALUES
('IMO9074720', 'AN HAI VINCENT', 4, 'Việt Nam', '200000', 'Viet Hoa Petroleum Corporation'),
('IMO9074721', 'BACHNGHE STAR', 3, 'Việt Nam', '150000', 'Viet Hoa Petroleum Corporation'),
('IMO9074722', 'BLUE WHALE', 2, 'Việt Nam', '200000', 'Viet Hoa Petroleum Corporation'),
('IMO9074723', 'CASHIN - 01', 3, 'Việt Nam', '250000', 'Tổng Công ty Bảo đảm An toàn Hàng hải Hưng Phát'),
('IMO9074724', 'CHAN NAM HB', 4, 'Việt Nam', '350000', 'Tổng Công ty Bảo đảm An toàn Hàng hải Hưng Phát'),
('IMO9074725', 'FORTUNE FREIGHTER', 5, 'Việt Nam', '300000', 'Công ty TNHH Vận tải biển Bình An'),
('IMO9074726', 'HAI DUONG 06', 1, 'Việt Nam', '325000', 'Công ty TNHH Vận tải biển Bình An'),
('IMO9074727', 'HAIAN VIEW', 4, 'Việt Nam', '210000', 'Công ty TNHH Vận tải biển Bình An'),
('IMO9074728', 'HD GOLD 02', 2, 'Việt Nam', '180000', 'Công ty TNHH Vận tải biển Bình An'),
('IMO9074729', 'HOÀNG ANH 369-ALCK', 3, 'Việt Nam', '300000', 'Công ty TNHH Vận tải biển Bình An');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtindangky`
--

CREATE TABLE `thongtindangky` (
  `madangky` int(5) UNSIGNED ZEROFILL NOT NULL,
  `ngaynhan` date NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `ngaysinh` date NOT NULL,
  `noisinh` text NOT NULL,
  `cccd` char(20) NOT NULL,
  `diachi` text NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `file_cv` varchar(255) NOT NULL,
  `trangthai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thongtindangky`
--

INSERT INTO `thongtindangky` (`madangky`, `ngaynhan`, `hoten`, `ngaysinh`, `noisinh`, `cccd`, `diachi`, `sdt`, `email`, `file_cv`, `trangthai`) VALUES
(00001, '2024-05-01', 'Lê Quốc Uy', '1995-04-24', 'Hải Phòng', '123456', 'fgfgfg', '545456454', 'huedothi50984@gmail.com', 'admin/CV/9415e0c738.pdf', 0),
(00002, '2024-05-31', 'Ngô Văn Liên', '2000-12-13', 'hải phòng', '012345678987', 'hải phòng', '0123456789', 'ngongocvan@gmail.com', 'admin/CV/f8490cc28a.pdf', 1),
(00023, '2024-06-01', 'Phạm Như Thế', '1997-06-13', 'Hải Phòng', '078945612323', 'Hải Phòng', '0789456123', 'hueamerican84@gmail.com', 'admin/CV/7da1ce800d.pdf', 1),
(00024, '2024-06-01', 'Trần Văn Hiển', '1996-08-13', 'hải phòng', '098767656517', 'hải phòng', '0987654543', 'khanhactramvan@gmail.com', 'admin/CV/b5737e9eea.pdf', 0),
(00027, '2024-06-07', 'Ngô Ngọc Vân', '2002-12-13', 'hải phòng', '012345678765', 'veffffdsdsaf', '0987654765', 'ngongocvan132@gmail.com', 'admin/CV/591bacd7c3.pdf', 0),
(00028, '2024-06-08', 'Fdf Fdfdf Dfdf', '2000-04-05', 'gfgf', '098765432123', 'fdfd', '1234567890', 'huueed@gmail.com', 'admin/CV/49be970fe7.pdf', 0),
(00029, '2024-06-10', 'Ngô Ngọc Vân', '2002-12-13', 'hải phòng', '098765654342', 'hải phòng', '0987654546', 'ngongocvan132@gmail.com', 'admin/CV/f50940f6a5.pdf', 1),
(00030, '2024-06-10', 'Sadsad Sad', '2000-10-20', 'sdasdsa', '098757564645', 'sdsd', '0987765657', 'ngongocvan132@gmail.com', 'admin/CV/412ade8078.pdf', 1),
(00033, '2024-06-13', 'Huy Hsddf', '2002-12-13', 'dvfvrfgrt', '123456787666', 'ghg', '1123456765', 'ngongocvan132@gmail.com', 'admin/CV/65a3acd41b.pdf', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuyenvien`
--

CREATE TABLE `thuyenvien` (
  `id_thuyenvien` int(5) UNSIGNED ZEROFILL NOT NULL,
  `tenthuyenvien` varchar(255) NOT NULL,
  `ngaysinh` date NOT NULL,
  `noisinh` text NOT NULL,
  `cccd` char(20) NOT NULL,
  `hokhauthuongtru` text NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `cannang` varchar(20) NOT NULL,
  `chieucao` varchar(20) NOT NULL,
  `nhommau` varchar(20) NOT NULL,
  `sizegiay` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ngaynhanhs` date NOT NULL,
  `honnhan` tinyint(1) NOT NULL,
  `trangthai` int(11) NOT NULL,
  `anh` varchar(255) DEFAULT NULL,
  `madangky` int(5) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thuyenvien`
--

INSERT INTO `thuyenvien` (`id_thuyenvien`, `tenthuyenvien`, `ngaysinh`, `noisinh`, `cccd`, `hokhauthuongtru`, `sdt`, `cannang`, `chieucao`, `nhommau`, `sizegiay`, `email`, `ngaynhanhs`, `honnhan`, `trangthai`, `anh`, `madangky`) VALUES
(00001, 'Nguyễn Văn Anh', '1990-01-01', 'Hà Nội', '031123456789', 'Số 16, Hồ Gươm, Hà Nội', '0123456789', '50.7', '165.6', 'AB', '37', 'nguyenvananh@email.com', '2023-10-20', 1, 1, 'images/anh1.PNG', NULL),
(00002, 'Trần Đình Bảo', '1974-02-07', 'Hải Phòng', '031987654321', 'Số 17, Cầu Đất, Hải Phòng', '0987654321', '55', '165', 'O', '39', 'trandinhbao@email.com', '2022-03-01', 1, 1, 'images/anh2.PNG', NULL),
(00003, 'Lê Thanh Cường', '1992-03-03', 'Đà Nẵng', '031135792468', 'Số 18, Bàn Cờ, Đà Nẵng', '0112233445', '58', '168', 'A', '41', 'lethanhcuong@email.com', '2023-01-01', 0, 1, 'images/anh3.PNG', NULL),
(00004, 'Phạm Văn Đức', '1970-07-07', 'Hồ Chí Minh', '031246813579', 'Số 19, Võ Văn Tần, Hồ Chí Minh', '0998877665', '60', '170', 'B', '38', 'phamvandat@email.com', '2023-01-01', 1, 4, 'images/4b62886351.png', NULL),
(00005, 'Hoàng Xuân Đức', '1994-05-05', 'Cần Thơ', '031369258147', 'Số 20, Cầu Rạch Mía, Cần Thơ', '0332211447', '65', '172', 'AB', '42', 'hoangxuanduc@email.com', '2023-01-01', 1, 3, 'images/743505141a.png', NULL),
(00006, 'Nguyễn Văn Dũng', '1995-06-06', 'Hà Nội', '031482516937', 'Số 21, Hồ Tây, Hà Nội', '0888777666', '55', '160', 'O', '42', 'nguyenvandung@email.com', '2023-01-01', 0, 4, 'images/Capture.PNG', NULL),
(00007, 'Vũ Đình Dương', '1996-07-07', 'Hải Phòng', '031695347182', 'Số 22, Cầu Đất, Hải Phòng', '0554433221', '62', '165', 'A', '43', 'vudinhduong@email.com', '2023-01-01', 1, 2, 'images/Capture.PNG', NULL),
(00008, 'Trần Văn Hoàng', '1997-08-08', 'Đà Nẵng', '031718293546', 'Số 23, Bàn Cờ, Đà Nẵng', '0999555444', '60', '168', 'B', '39', 'tranvanhoang@email.com', '2023-01-12', 0, 2, 'images/Capture.PNG', NULL),
(00009, 'Lê Văn Hùng', '1998-09-09', 'Hồ Chí Minh', '031927361485', 'Số 24, Võ Văn Tần, Hồ Chí Minh', '0663322110', '65', '170', 'O', '41', 'levanhung@email.com', '2023-01-01', 1, 2, 'images/Capture.PNG', NULL),
(00010, 'Phạm Văn Khánh', '1999-10-10', 'Cần Thơ', '031381726954', 'Số 25, Cầu Rạch Mía, Cần Thơ', '0777711222', '70', '175', 'AB', '42', 'phamvankhanh@email.com', '2023-01-01', 0, 2, 'images/anh2.PNG', NULL),
(00011, 'Hoàng Văn Lâm', '2000-11-11', 'Hà Nội', '031243156789', 'Số 26, Hồ Tây, Hà Nội', '0221122334', '65', '172', 'A', '40', 'hoangvanlam@email.com', '2023-01-01', 0, 2, 'images/anh3.PNG', NULL),
(00012, 'Nguyễn Văn Minh', '2001-12-12', 'Hải Phòng', '031372819546', 'Số 27, Cầu Đất, Hải Phòng', '0999887766', '60', '168', 'O', '38', 'nguyenvanminh@email.com', '2023-01-01', 0, 2, 'images/anh4.PNG', NULL),
(00013, 'Vũ Xuân Nam', '2002-01-01', 'Đà Nẵng', '031729345681', 'Số 28, Bàn Cờ, Đà Nẵng', '0111222333', '75', '180', 'B', '44', 'vuxuannam@email.com', '2023-01-01', 1, 2, 'images/anh5.PNG', NULL),
(00014, 'Trần Văn Oanh', '2003-02-02', 'Hồ Chí Minh', '031931827456', 'Số 29, Võ Văn Tần, Hồ Chí Minh', '0888777666', '65', '175', 'AB', '42', 'tranvanoanh@email.com', '2023-01-01', 0, 2, 'images/anh6.PNG', NULL),
(00015, 'Lê Thịnh', '2004-03-03', 'Cần Thơ', '031381927654', 'Số 30, Cầu Rạch Mía, Cần Thơ', '0999777666', '70', '178', 'O', '40', 'lethin@email.com', '2023-01-01', 1, 1, 'images/anh7.PNG', NULL),
(00016, 'Nguyễn Văn Bình', '1990-01-16', 'Hà Nội', '031123456789', 'Số 16, Hồ Gươm, Hà Nội', '0123456789', '60', '165', 'AB', '37', 'nguyenvanbinh@email.com', '2023-01-01', 1, 2, 'images/Capture.PNG', NULL),
(00017, 'Trần Văn Chí', '1991-02-17', 'Hải Phòng', '031987654321', 'Số 17, Cầu Đất, Hải Phòng', '0987654321', '65', '170', 'O', '39', 'tranvanchi@email.com', '2023-01-01', 0, 2, 'images/Capture.PNG', NULL),
(00018, 'Lê Hoàng Dũng', '1992-03-18', 'Đà Nẵng', '031135792468', 'Số 18, Bàn Cờ, Đà Nẵng', '0112233445', '70', '175', 'A', '41', 'lehoangdung@email.com', '2023-01-01', 1, 2, 'images/Capture.PNG', NULL),
(00019, 'Phạm Văn Dương', '1993-04-19', 'Hồ Chí Minh', '031246813579', 'Số 19, Võ Văn Tần, Hồ Chí Minh', '0998877665', '75', '180', 'B', '38', 'phamvanduong@email.com', '2023-01-01', 0, 2, 'images/Capture.PNG', NULL),
(00020, 'Hoàng Minh Đức', '1994-05-20', 'Cần Thơ', '031369258147', 'Số 20, Cầu Rạch Mía, Cần Thơ', '0332211447', '80', '185', 'AB', '42', 'hoangminhduc@email.com', '2023-01-01', 1, 2, 'images/Capture.PNG', NULL),
(00021, 'Nguyễn Quốc Dũng', '1995-06-21', 'Hà Nội', '031482516937', 'Số 21, Hồ Tây, Hà Nội', '0888777666', '85', '190', 'O', '36', 'nguyenquocdung@email.com', '2023-01-01', 0, 2, 'images/Capture.PNG', NULL),
(00022, 'Vũ Thanh Giang', '1996-07-22', 'Hải Phòng', '031695347182', 'Số 22, Cầu Đất, Hải Phòng', '0554433221', '90', '195', 'A', '43', 'vuthanhgiang@email.com', '2023-01-01', 1, 2, 'images/Capture.PNG', NULL),
(00023, 'Trần Văn Hải', '1997-08-23', 'Đà Nẵng', '031718293546', 'Số 23, Bàn Cờ, Đà Nẵng', '0999555444', '95', '200', 'B', '39', 'tranvanhai@email.com', '2023-01-01', 0, 2, 'images/Capture.PNG', NULL),
(00024, 'Lê Minh Hòa', '1998-09-24', 'Hồ Chí Minh', '031927361485', 'Số 24, Võ Văn Tần, Hồ Chí Minh', '0663322110', '100', '205', 'O', '41', 'leminhhoa@email.com', '2023-01-01', 1, 1, 'images/Capture.PNG', NULL),
(00025, 'Phạm Văn Hùng', '1999-10-25', 'Cần Thơ', '031381726954', 'Số 25, Cầu Rạch Mía, Cần Thơ', '0777711222', '105', '210', 'AB', '42', 'phamvanhung@email.com', '2023-01-01', 0, 1, 'images/Capture.PNG', NULL),
(00026, 'Hoàng Văn Khánh', '2000-11-26', 'Hà Nội', '031243156789', 'Số 26, Hồ Tây, Hà Nội', '0221122334', '110', '215', 'A', '40', 'hoangvankhanh@email.com', '2023-01-01', 1, 1, 'images/Capture.PNG', NULL),
(00027, 'Nguyễn Văn Lâm', '2001-12-27', 'Hải Phòng', '031372819546', 'Số 27, Cầu Đất, Hải Phòng', '0999887766', '115', '220', 'O', '38', 'nguyenvanlam@email.com', '2023-01-01', 0, 1, 'images/Capture.PNG', NULL),
(00028, 'Vũ Xuân Nam', '2002-01-28', 'Đà Nẵng', '031729345681', 'Số 28, Bàn Cờ, Đà Nẵng', '0111222333', '120', '225', 'B', '44', 'vuxuannam@email.com', '2023-01-01', 1, 1, 'images/Capture.PNG', NULL),
(00029, 'Trần Văn Oanh', '1990-06-06', 'Hồ Chí Minh', '031931827456', 'Số 29, Võ Văn Tần, Hồ Chí Minh', '0888777666', '125', '230', 'AB', '42', 'tranvanoanh@email.com', '2023-01-01', 0, 1, 'images/Capture.PNG', NULL),
(00030, 'Lê Thịnh', '2004-03-30', 'Cần Thơ', '031381927654', 'Số 30, Cầu Rạch Mía, Cần Thơ', '0999777666', '130', '235', 'O', '40', 'lethinh@email.com', '2023-01-01', 1, 1, 'images/7f5a94b86a.png', NULL),
(00111, 'Trần Văn Hiển', '1996-08-13', 'Hải Phòng', '031569258456', 'Hải Phòng', '0987654543', '50.6', '176', 'AB', '40', 'khanhactramvan@gmail.com', '2024-06-01', 0, 3, 'images/76a8532b49.png', 00024),
(00112, 'Lê Quốc Uy', '1995-04-24', 'Hải Phòng', '031256489754', 'Hải Phòng', '0987654321', '56', '178', 'B', '45', 'uyquoc@gmail.com', '2024-06-21', 0, 1, 'images/6cf553030f.png', 00001),
(00113, 'Ngô Ngọc Vân', '2002-12-13', 'hải phòng', '012345678765', 'veffffdsdsaf', '0987654765', '45', '178', 'AB', '39', 'ngongocvan132@gmail.com', '2024-06-07', 0, 1, 'images/4d1961180b.png', 00027),
(00115, 'Ngô Ngọc Vân', '2002-12-13', 'hải phòng', '098765654342', 'hải phòng', '0987654546', '56', '159', 'AB', '39', 'ngongocvan132@gmail.com', '2024-06-10', 0, 4, 'images/12ca4a8d85.png', 00029),
(00116, 'Sadsad Sad', '2000-10-20', 'sdasdsa', '098757564645', 'sdsd', '0987765657', '56', '165', 'A', '38', 'ngongocvan132@gmail.com', '2024-05-28', 0, 1, 'images/a80ebe12c2.jpg', 00030),
(00117, 'Huy Hsddf', '2002-12-13', 'dvfvrfgrt', '123456787666', 'ghg', '1123456765', '56', '167', 'AB+', '38', 'ngongocvan132@gmail.com', '2024-06-12', 0, 2, 'images/3ff99418b0.png', 00033);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangthai`
--

CREATE TABLE `trangthai` (
  `matrangthai` int(11) NOT NULL,
  `tentrangthai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `trangthai`
--

INSERT INTO `trangthai` (`matrangthai`, `tentrangthai`) VALUES
(1, 'Trên bờ'),
(2, 'Chờ lên tàu'),
(3, 'Trên tàu'),
(4, 'Đã thôi việc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `truonghoc`
--

CREATE TABLE `truonghoc` (
  `id` int(11) NOT NULL,
  `id_thuyenvien` int(5) UNSIGNED ZEROFILL NOT NULL,
  `tentruong` varchar(255) NOT NULL,
  `chuyennghanh` varchar(255) NOT NULL,
  `batdau` date NOT NULL,
  `ketthuc` date NOT NULL,
  `xeploai` varchar(20) NOT NULL,
  `ghichu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `truonghoc`
--

INSERT INTO `truonghoc` (`id`, `id_thuyenvien`, `tentruong`, `chuyennghanh`, `batdau`, `ketthuc`, `xeploai`, `ghichu`) VALUES
(4, 00002, 'Trường Trung học phổ thông DEF', 'Chương trình học cấp 3', '2011-09-01', '2014-06-30', 'Khá', 'Tốt nghiệp với thành tích tốt'),
(5, 00002, 'Đại học Hàng hải Việt Nam', 'Quản trị Hàng hải', '2014-09-01', '2018-06-30', 'Trung bình', 'Tham gia các hoạt động ngoại khóa liên quan đến quản trị Hàng hải'),
(6, 00006, 'Trường Trung học phổ thông Lê Lợi', 'Chương trình học cấp 3', '2012-09-01', '2015-06-30', 'Trung bình', 'Hoàn thành khóa học cấp 3'),
(7, 00006, 'Đại học Hàng hải Việt Nam - Trường Đại học Hàng hải Hải Phòng', 'Kỹ thuật Hàng hải', '2015-09-01', '2019-06-30', 'Khá', 'Thực tập tại công ty Hàng hải ABC'),
(8, 00007, 'Trường Trung học phổ thông Nguyễn Huệ', 'Chương trình học cấp 3', '2013-09-01', '2016-06-30', 'Giỏi', 'Tốt nghiệp với thành tích cao'),
(9, 00007, 'Đại học Hàng hải Việt Nam - Trường Đại học Hàng hải TP.HCM', 'Quản lý Hàng hải', '2016-09-01', '2020-06-30', 'Trung bình', 'Tham gia các hoạt động ngoại khóa liên quan đến quản lý Hàng hải'),
(12, 00009, 'Trường Trung học phổ thông Hai Bà Trưng', 'Chương trình học cấp 3', '2015-09-01', '2018-06-30', 'Trung bình', 'Hoàn thành khóa học cấp 3'),
(13, 00009, 'Đại học Hàng hải Việt Nam - Trường Đại học Hàng hải Hải Phòng', 'Kỹ thuật Hàng hải', '2018-09-01', '2022-06-30', 'Khá', 'Thực tập tại công ty Hàng hải XYZ'),
(14, 00010, 'Trường Trung học phổ thông Lý Tự Trọng', 'Chương trình học cấp 3', '2016-09-01', '2019-06-30', 'Giỏi', 'Tốt nghiệp với thành tích cao'),
(15, 00010, 'Đại học Hàng hải Việt Nam - Trường Đại học Hàng hải TP.HCM', 'Quản lý Hàng hải', '2019-09-01', '2023-06-30', 'Trung bình', 'Tham gia các hoạt động ngoại khóa liên quan đến quản lý Hàng hải'),
(16, 00011, 'Trường Trung học phổ thông Võ Thị Sáu', 'Chương trình học cấp 3', '2017-09-01', '2020-06-30', 'Trung bình', 'Tốt nghiệp với thành tích trung bình'),
(17, 00011, 'Đại học Hàng hải Việt Nam - Trường Đại học Hàng hải Đà Nẵng', 'Kỹ thuật Đóng tàu', '2020-09-01', '2024-06-30', 'Giỏi', 'Thực tập tại công ty Đóng tàu XYZ'),
(25, 00111, 'Đại học hàng hải', 'máy tàu biển', '2015-09-09', '2019-09-09', 'Khá', ''),
(27, 00115, 'gfgfg', 'gfgf', '2024-05-27', '2024-06-22', 'gfgf', 'gfgf');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `danhmuc` (`danhmuc`);

--
-- Chỉ mục cho bảng `chucdanh`
--
ALTER TABLE `chucdanh`
  ADD PRIMARY KEY (`id_chucdanh`),
  ADD UNIQUE KEY `tenchucdanh` (`tenchucdanh`);

--
-- Chỉ mục cho bảng `chucnang`
--
ALTER TABLE `chucnang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chungchi`
--
ALTER TABLE `chungchi`
  ADD PRIMARY KEY (`sogiayto`),
  ADD KEY `FK` (`loaichungchi`),
  ADD KEY `FK1` (`id_thuyenvien`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tendanhmuc` (`tendanhmuc`);

--
-- Chỉ mục cho bảng `hopdonglentau`
--
ALTER TABLE `hopdonglentau`
  ADD PRIMARY KEY (`sohopdong`),
  ADD KEY `hopdong_tv` (`hopdong_tv`),
  ADD KEY `tau` (`tau`),
  ADD KEY `chucdanh` (`chucdanh`);

--
-- Chỉ mục cho bảng `khenthuongkyluat`
--
ALTER TABLE `khenthuongkyluat`
  ADD PRIMARY KEY (`soquyetdinh`),
  ADD KEY `id_thuyenvien` (`id_thuyenvien`);

--
-- Chỉ mục cho bảng `kinhnghiemditau`
--
ALTER TABLE `kinhnghiemditau`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_thuyenvien` (`id_thuyenvien`),
  ADD KEY `chucdanh` (`chucdanh`);

--
-- Chỉ mục cho bảng `loaichungchi`
--
ALTER TABLE `loaichungchi`
  ADD PRIMARY KEY (`id_loaichungchi`);

--
-- Chỉ mục cho bảng `loaitau`
--
ALTER TABLE `loaitau`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nguoithan`
--
ALTER TABLE `nguoithan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_thuyenvien` (`id_thuyenvien`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD UNIQUE KEY `tendangnhap` (`tendangnhap`,`machucnang`),
  ADD KEY `machucnang` (`machucnang`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`tendangnhap`);

--
-- Chỉ mục cho bảng `tau`
--
ALTER TABLE `tau`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tentau` (`tentau`),
  ADD KEY `loaitau_id` (`loaitau_id`);

--
-- Chỉ mục cho bảng `thongtindangky`
--
ALTER TABLE `thongtindangky`
  ADD PRIMARY KEY (`madangky`);

--
-- Chỉ mục cho bảng `thuyenvien`
--
ALTER TABLE `thuyenvien`
  ADD PRIMARY KEY (`id_thuyenvien`),
  ADD KEY `trangthai` (`trangthai`),
  ADD KEY `madangky` (`madangky`);

--
-- Chỉ mục cho bảng `trangthai`
--
ALTER TABLE `trangthai`
  ADD PRIMARY KEY (`matrangthai`);

--
-- Chỉ mục cho bảng `truonghoc`
--
ALTER TABLE `truonghoc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_thuyenvien` (`id_thuyenvien`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT cho bảng `chucdanh`
--
ALTER TABLE `chucdanh`
  MODIFY `id_chucdanh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `kinhnghiemditau`
--
ALTER TABLE `kinhnghiemditau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `loaichungchi`
--
ALTER TABLE `loaichungchi`
  MODIFY `id_loaichungchi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `loaitau`
--
ALTER TABLE `loaitau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `nguoithan`
--
ALTER TABLE `nguoithan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `thongtindangky`
--
ALTER TABLE `thongtindangky`
  MODIFY `madangky` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `thuyenvien`
--
ALTER TABLE `thuyenvien`
  MODIFY `id_thuyenvien` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT cho bảng `trangthai`
--
ALTER TABLE `trangthai`
  MODIFY `matrangthai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `truonghoc`
--
ALTER TABLE `truonghoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  ADD CONSTRAINT `baiviet_ibfk_1` FOREIGN KEY (`danhmuc`) REFERENCES `danhmuc` (`tendanhmuc`);

--
-- Các ràng buộc cho bảng `chungchi`
--
ALTER TABLE `chungchi`
  ADD CONSTRAINT `chungchi_ibfk_1` FOREIGN KEY (`loaichungchi`) REFERENCES `loaichungchi` (`id_loaichungchi`),
  ADD CONSTRAINT `chungchi_ibfk_2` FOREIGN KEY (`id_thuyenvien`) REFERENCES `thuyenvien` (`id_thuyenvien`);

--
-- Các ràng buộc cho bảng `hopdonglentau`
--
ALTER TABLE `hopdonglentau`
  ADD CONSTRAINT `hopdonglentau_ibfk_1` FOREIGN KEY (`chucdanh`) REFERENCES `chucdanh` (`tenchucdanh`),
  ADD CONSTRAINT `hopdonglentau_ibfk_2` FOREIGN KEY (`hopdong_tv`) REFERENCES `thuyenvien` (`id_thuyenvien`),
  ADD CONSTRAINT `hopdonglentau_ibfk_3` FOREIGN KEY (`tau`) REFERENCES `tau` (`id`);

--
-- Các ràng buộc cho bảng `khenthuongkyluat`
--
ALTER TABLE `khenthuongkyluat`
  ADD CONSTRAINT `khenthuongkyluat_ibfk_1` FOREIGN KEY (`id_thuyenvien`) REFERENCES `thuyenvien` (`id_thuyenvien`);

--
-- Các ràng buộc cho bảng `kinhnghiemditau`
--
ALTER TABLE `kinhnghiemditau`
  ADD CONSTRAINT `kinhnghiemditau_ibfk_1` FOREIGN KEY (`id_thuyenvien`) REFERENCES `thuyenvien` (`id_thuyenvien`);

--
-- Các ràng buộc cho bảng `nguoithan`
--
ALTER TABLE `nguoithan`
  ADD CONSTRAINT `nguoithan_ibfk_1` FOREIGN KEY (`id_thuyenvien`) REFERENCES `thuyenvien` (`id_thuyenvien`);

--
-- Các ràng buộc cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD CONSTRAINT `quyen_ibfk_1` FOREIGN KEY (`machucnang`) REFERENCES `chucnang` (`id`),
  ADD CONSTRAINT `quyen_ibfk_2` FOREIGN KEY (`tendangnhap`) REFERENCES `taikhoan` (`tendangnhap`);

--
-- Các ràng buộc cho bảng `tau`
--
ALTER TABLE `tau`
  ADD CONSTRAINT `tau_ibfk_1` FOREIGN KEY (`loaitau_id`) REFERENCES `loaitau` (`id`);

--
-- Các ràng buộc cho bảng `thuyenvien`
--
ALTER TABLE `thuyenvien`
  ADD CONSTRAINT `thuyenvien_ibfk_1` FOREIGN KEY (`trangthai`) REFERENCES `trangthai` (`matrangthai`),
  ADD CONSTRAINT `thuyenvien_ibfk_2` FOREIGN KEY (`madangky`) REFERENCES `thongtindangky` (`madangky`);

--
-- Các ràng buộc cho bảng `truonghoc`
--
ALTER TABLE `truonghoc`
  ADD CONSTRAINT `truonghoc_ibfk_1` FOREIGN KEY (`id_thuyenvien`) REFERENCES `thuyenvien` (`id_thuyenvien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
