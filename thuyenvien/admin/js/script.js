/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function () {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        } else {
            dropdownContent.style.display = "block";
        }
    });
}

function openNav() {
    document.getElementById("mySidenav").style.width = "400px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}




function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}


function openFormthemditau() {
    document.getElementById("myFormthemditau").style.display = "block";
}

function closeFormthemditau() {
    document.getElementById("myFormthemditau").style.display = "none";
}
function openFormsuaditau(event) {
    var selectedRow = event.target.closest('tr'); // Lấy hàng chứa nút "Sửa" được nhấn
    // Lấy các trường thông tin trong form sửa
    var form = document.getElementById("myFormsuaditau");
    var idInput = form.querySelector("#id_suathuyenvien");
    var tentauInput = form.querySelector("#tentau");
    var loaitauInput = form.querySelector("#loaitau");
    var chucdanhInput = form.querySelector("#chucdanh");
    var thoigianbatdauInput = form.querySelector("#thoigianbatdau");
    var thoigianketthucInput = form.querySelector("#thoigianketthuc");
    var lydodoitauInput = form.querySelector("#lydodoitau");
    var ghichuInput = form.querySelector("#ghichu");

    var id = event.target.dataset.id;
    // Điền thông tin từ hàng đã chọn vào các trường trong form sửa
    idInput.value = id;
    tentauInput.value = selectedRow.cells[0].innerText;
    chucdanhInput.value = selectedRow.cells[2].innerText;

    // Lấy giá trị của chức danh từ hàng đã chọn
    var chucdanhValue = selectedRow.cells[2].innerText;

    // Lặp qua các tùy chọn trong dropdown menu
    Array.from(chucdanhInput.options).forEach(function (option) {
        // So sánh giá trị của tùy chọn với chức danh từ hàng đã chọn
        if (option.textContent === chucdanhValue) {
            // Nếu phù hợp, đặt thuộc tính selected của tùy chọn đó thành true
            option.selected = true;
        }
    });
    loaitauInput.value = selectedRow.cells[1].innerText;
    thoigianbatdauInput.value = convertDateFormat(selectedRow.cells[3].innerText);
    thoigianketthucInput.value = convertDateFormat(selectedRow.cells[4].innerText);
    lydodoitauInput.value = selectedRow.cells[6].innerText;
    ghichuInput.value = selectedRow.cells[7].innerText;

    // Hiển thị form sửa
    form.style.display = "block";
}


function closeFormsuaditau() {
    document.getElementById("myFormsuaditau").style.display = "none";
}


function openFormthemtruonghoc() {
    document.getElementById("myFormthemtruonghoc").style.display = "block";
}

function closeFormthemtruonghoc() {
    document.getElementById("myFormthemtruonghoc").style.display = "none";
}

function openFormsuatruonghoc(event) {
    var selectedRow = event.target.closest('tr'); // Lấy hàng chứa nút "Sửa" được nhấn
    // Lấy các trường thông tin trong form sửa
    var form = document.getElementById("myFormsuatruonghoc");
    var idInput = form.querySelector("#id_suatruonghoc");
    var tentruongInput = form.querySelector("#tentruong");
    var chuyennghanhInput = form.querySelector("#chuyennghanh");
    var batdauInput = form.querySelector("#batdau4");
    var ketthucInput = form.querySelector("#ketthuc4");
    var xeploaiInput = form.querySelector("#xeploai");
    var ghichuInput = form.querySelector("#ghichu");

    var id = event.target.dataset.id;
    // Điền thông tin từ hàng đã chọn vào các trường trong form sửa
    idInput.value = id;
    tentruongInput.value = selectedRow.cells[0].innerText;
    chuyennghanhInput.value = selectedRow.cells[1].innerText;
    batdauInput.value = convertDateFormat(selectedRow.cells[2].innerText);
    ketthucInput.value = convertDateFormat(selectedRow.cells[3].innerText);
    xeploaiInput.value = selectedRow.cells[4].innerText;
    ghichuInput.value = selectedRow.cells[5].innerText;

    // Hiển thị form sửa
    form.style.display = "block";
}

function closeFormsuatruonghoc() {
    document.getElementById("myFormsuatruonghoc").style.display = "none";
}

function openFormthemnguoithan() {
    document.getElementById("myFormthemnguoithan").style.display = "block";
}

function closeFormthemnguoithan() {
    document.getElementById("myFormthemnguoithan").style.display = "none";
}


function openFormsuanguoithan(event) {
    var selectedRow = event.target.closest('tr'); // Lấy hàng chứa nút "Sửa" được nhấn
    // Lấy các trường thông tin trong form sửa
    var form = document.getElementById("myFormsuanguoithan");
    var idInput = form.querySelector("#id_suanguoithan");
    var hotenInput = form.querySelector("#hoten2");
    var quanheInput = form.querySelector("#quanhe");
    var namsinhInput = form.querySelector("#namsinh2");
    var diachiInput = form.querySelector("#diachi");
    var dienthoaiInput = form.querySelector("#dienthoai2");
    var ghichuInput = form.querySelector("#ghichu");

    var id = event.target.dataset.id;
    // Lấy giá trị của năm sinh từ hàng đã chọn
    var namsinhValue = selectedRow.cells[2].innerText;

    // Lặp qua các tùy chọn trong dropdown menu
    Array.from(namsinhInput.options).forEach(function (option) {
        // So sánh giá trị của tùy chọn với năm sinh từ hàng đã chọn
        if (option.textContent == namsinhValue) { // Sử dụng == để so sánh giá trị dạng chuỗi
            // Nếu phù hợp, đặt thuộc tính selected của tùy chọn đó thành true
            option.selected = true;
        }
    });

    // Điền thông tin từ hàng đã chọn vào các trường trong form sửa
    idInput.value = id;
    hotenInput.value = selectedRow.cells[0].innerText;
    quanheInput.value = selectedRow.cells[1].innerText;
    dienthoaiInput.value = selectedRow.cells[3].innerText;
    diachiInput.value = selectedRow.cells[4].innerText;
    ghichuInput.value = selectedRow.cells[5].innerText;

    // Hiển thị form sửa
    form.style.display = "block";
}

function closeFormsuanguoithan() {
    document.getElementById("myFormsuanguoithan").style.display = "none";
}


function openFormthemchungchi() {
    document.getElementById("myFormthemchungchi").style.display = "block";
}

function closeFormthemchungchi() {
    document.getElementById("myFormthemchungchi").style.display = "none";
}

function openFormsuachungchi(event) {
    var selectedRow = event.target.closest('tr'); // Lấy hàng chứa nút "Sửa" được nhấn
    // Lấy các trường thông tin trong form sửa
    var form = document.getElementById("myFormsuachungchi");
    var sogiaytoInput = form.querySelector("#sogiayto");
    var loaichungchiInput = form.querySelector("#loaichungchi");
    var tenchungchiInput = form.querySelector("#tenchungchi");
    var ngaycapInput = form.querySelector("#ngaycap2");
    var ngayhethanInput = form.querySelector("#ngayhethan2");
    var ghichuInput = form.querySelector("#ghichu");
    var suaInput = form.querySelector("#id_sua");

    var id = event.target.dataset.id;
    suaInput.value = id;
    // Điền thông tin từ hàng đã chọn vào các trường trong form sửa
    // Lấy giá trị của chức danh từ hàng đã chọn
    var loaichungchiValue = selectedRow.cells[1].innerText;

    // Lặp qua các tùy chọn trong dropdown menu
    Array.from(loaichungchiInput.options).forEach(function (option) {
        // So sánh giá trị của tùy chọn với chức danh từ hàng đã chọn
        if (option.textContent === loaichungchiValue) {
            // Nếu phù hợp, đặt thuộc tính selected của tùy chọn đó thành true
            option.selected = true;
        }
    });

    sogiaytoInput.value = selectedRow.cells[0].innerText;

    tenchungchiInput.value = selectedRow.cells[2].innerText;
    ngaycapInput.value = convertDateFormat(selectedRow.cells[3].innerText);
    ngayhethanInput.value = convertDateFormat(selectedRow.cells[4].innerText);
    ghichuInput.value = selectedRow.cells[5].innerText;

    // Hiển thị form sửa
    form.style.display = "block";
}
// Hàm chuyển đổi định dạng ngày tháng từ "d/m/Y" sang "Y-m-d"
function convertDateFormat(dateString) {
    if (!dateString) return '';
    var parts = dateString.split("/");
    if (parts.length !== 3) return ''; // Đảm bảo chuỗi có đúng định dạng ngày tháng
    return parts[2] + '-' + parts[1] + '-' + parts[0];
}
function closeFormsuachungchi() {
    document.getElementById("myFormsuachungchi").style.display = "none";
}

function openFormthemktkl() {
    document.getElementById("myFormthemktkl").style.display = "block";
}

function closeFormthemktkl() {
    document.getElementById("myFormthemktkl").style.display = "none";
}

function openFormsuaktkl(event) {
    var selectedRow = event.target.closest('tr'); // Lấy hàng chứa nút "Sửa" được nhấn
    // Lấy các trường thông tin trong form sửa
    var form = document.getElementById("myFormsuaktkl");
    var soquyetdinhInput = form.querySelector("#soquyetdinh");
    var loaihinhInput = form.querySelector("#loaihinh");
    var hinhthucInput = form.querySelector("#hinhthuc");
    var lydoInput = form.querySelector("#lydo");
    var ngaykyInput = form.querySelector("#ngayky");
    var ghichuInput = form.querySelector("#ghichu");

    var id = event.target.dataset.id;

    // Điền thông tin từ hàng đã chọn vào các trường trong form sửa
    // Lấy giá trị của chức danh từ hàng đã chọn
    var loaihinhValue = selectedRow.cells[1].innerText;

    // Lặp qua các tùy chọn trong dropdown menu
    Array.from(loaihinhInput.options).forEach(function (option) {
        // So sánh giá trị của tùy chọn với chức danh từ hàng đã chọn
        if (option.textContent === loaihinhValue) {
            // Nếu phù hợp, đặt thuộc tính selected của tùy chọn đó thành true
            option.selected = true;
        }
    });

    soquyetdinhInput.value = selectedRow.cells[0].innerText;

    hinhthucInput.value = selectedRow.cells[2].innerText;
    lydoInput.value = selectedRow.cells[3].innerText;
    ngaykyInput.value = convertDateFormat(selectedRow.cells[4].innerText);
    ghichuInput.value = selectedRow.cells[5].innerText;

    // Hiển thị form sửa
    form.style.display = "block";
}

function closeFormsuaktkl() {
    document.getElementById("myFormsuaktkl").style.display = "none";
}

function openFormthemtau() {
    document.getElementById("myFormthemtau").style.display = "block";
}

function closeFormthemtau() {
    document.getElementById("myFormthemtau").style.display = "none";
}

function openFormsuatau(event) {
    var selectedRow = event.target.closest('tr'); // Lấy hàng chứa nút "Sửa" được nhấn
    // Lấy các trường thông tin trong form sửa
    var form = document.getElementById("myFormsuatau");
    var idInput = form.querySelector("#id");
    var tentauInput = form.querySelector("#tentau");
    var loaitau_idInput = form.querySelector("#loaitau_id");
    var noidangkyInput = form.querySelector("#noidangky");
    var trongtaiInput = form.querySelector("#trongtai");
    var ghichuInput = form.querySelector("#ghichu");

    var id = event.target.dataset.id;

    // Điền thông tin từ hàng đã chọn vào các trường trong form sửa
    // Lấy giá trị của chức danh từ hàng đã chọn
    var loaitau_idValue = selectedRow.cells[2].innerText;
    // Lặp qua các tùy chọn trong dropdown menu
    Array.from(loaitau_idInput.options).forEach(function (option) {
        // So sánh giá trị của tùy chọn với chức danh từ hàng đã chọn
        if (option.textContent === loaitau_idValue) {
            // Nếu phù hợp, đặt thuộc tính selected của tùy chọn đó thành true
            option.selected = true;
        }
    });


    idInput.value = selectedRow.cells[0].innerText;

    tentauInput.value = selectedRow.cells[1].innerText;
    noidangkyInput.value = selectedRow.cells[3].innerText;
    trongtaiInput.value = selectedRow.cells[4].innerText;
    ghichuInput.value = selectedRow.cells[5].innerText;

    // Hiển thị form sửa
    form.style.display = "block";
}

function closeFormsuatau() {
    document.getElementById("myFormsuatau").style.display = "none";
}


function openFormthemhdlt() {
    document.getElementById("myFormthemhdlt").style.display = "block";
}

function closeFormthemhdlt() {
    document.getElementById("myFormthemhdlt").style.display = "none";
}


function openFormsuahdlt(event) {
    var selectedRow = event.target.closest('tr'); // Lấy hàng chứa nút "Sửa" được nhấn
    // Lấy các trường thông tin trong form sửa
    var form = document.getElementById("myFormsuahdlt");
    var sohopdongInput = form.querySelector("#sohopdong");
    var tauInput = form.querySelector("#tau");
    var chucdanhInput = form.querySelector("#chucdanh");
    var id_thuyenvien2Input = form.querySelector("#id_thuyenvien2");
    var ngaybatdauInput = form.querySelector("#ngaybatdau2");
    var thoihanInput = form.querySelector("#thoihan");
    var ngaykyInput = form.querySelector("#ngayky2");
    var nguoikyInput = form.querySelector("#nguoiky2");
    var chucdanh_nguoikyInput = form.querySelector("#chucdanh_nguoiky");
    var nguoisdldInput = form.querySelector("#nguoisdld2");
    var diachi_nguoisdldInput = form.querySelector("#diachi_nguoisdld");
    var trangthaiInput = form.querySelector("#trangthai");

    var id = event.target.dataset.id;

    // Điền thông tin từ hàng đã chọn vào các trường trong form sửa
    // Lấy giá trị của chức danh từ hàng đã chọn
    var trangthaiValue = selectedRow.cells[10].innerText;
    var tauValue = selectedRow.cells[1].innerText;
    var chucdanhValue = selectedRow.cells[2].innerText;

    // Lặp qua các tùy chọn trong dropdown menu
    Array.from(trangthaiInput.options).forEach(function (option) {
        // So sánh giá trị của tùy chọn với chức danh từ hàng đã chọn
        if (option.textContent === trangthaiValue) {
            // Nếu phù hợp, đặt thuộc tính selected của tùy chọn đó thành true
            option.selected = true;
        }
    });
    // Lặp qua các tùy chọn trong dropdown menu
    Array.from(tauInput.options).forEach(function (option) {
        // So sánh giá trị của tùy chọn với chức danh từ hàng đã chọn
        if (option.textContent === tauValue) {
            // Nếu phù hợp, đặt thuộc tính selected của tùy chọn đó thành true
            option.selected = true;
        }
    });
    // Lặp qua các tùy chọn trong dropdown menu
    Array.from(chucdanhInput.options).forEach(function (option) {
        // So sánh giá trị của tùy chọn với chức danh từ hàng đã chọn
        if (option.textContent === chucdanhValue) {
            // Nếu phù hợp, đặt thuộc tính selected của tùy chọn đó thành true
            option.selected = true;
        }
    });

    sohopdongInput.value = selectedRow.cells[0].innerText;
    ngaybatdauInput.value = convertDateFormat(selectedRow.cells[3].innerText);
    thoihanInput.value = selectedRow.cells[4].innerText;
    ngaykyInput.value = convertDateFormat(selectedRow.cells[5].innerText);
    nguoikyInput.value = selectedRow.cells[6].innerText;
    chucdanh_nguoikyInput.value = selectedRow.cells[7].innerText;
    nguoisdldInput.value = selectedRow.cells[8].innerText;
    diachi_nguoisdldInput.value = selectedRow.cells[9].innerText;

    id_thuyenvien2Input.value = id;

    // Hiển thị form sửa
    form.style.display = "block";
}

function closeFormsuahdlt() {
    document.getElementById("myFormsuahdlt").style.display = "none";
}

function openFormthemkehoach() {
    document.getElementById("myFormthemkehoach").style.display = "block";
}

function closeFormthemkehoach() {
    document.getElementById("myFormthemkehoach").style.display = "none";
}



function openFormsuakehoach(event) {
    var selectedRow = event.target.closest('tr'); // Lấy hàng chứa nút "Sửa" được nhấn
    // Lấy các trường thông tin trong form sửa
    var form = document.getElementById("myFormsuakehoach");
    var idInput = form.querySelector("#id");
    var tenkehoachInput = form.querySelector("#tenkehoach");
    var ngaylapInput = form.querySelector("#ngaylap");
    var ngayxuatcangInput = form.querySelector("#ngayxuatcang");
    var ngaycapcangInput = form.querySelector("#ngaycapcang");
    var ghichuInput = form.querySelector("#ghichu");
    var tau_idInput = form.querySelector("#tau_id");

    var id = event.target.dataset.id;

    // Điền thông tin từ hàng đã chọn vào các trường trong form sửa
    // Lấy giá trị của chức danh từ hàng đã chọn
    var tau_idValue = selectedRow.cells[5].innerText;

    // Lặp qua các tùy chọn trong dropdown menu
    Array.from(tau_idInput.options).forEach(function (option) {
        // So sánh giá trị của tùy chọn với chức danh từ hàng đã chọn
        if (option.textContent === tau_idValue) {
            // Nếu phù hợp, đặt thuộc tính selected của tùy chọn đó thành true
            option.selected = true;
        }
    });

    idInput.value = selectedRow.cells[0].innerText;
    tenkehoachInput.value = selectedRow.cells[1].innerText;
    ngaylapInput.value = selectedRow.cells[2].innerText;
    ngayxuatcangInput.value = selectedRow.cells[4].innerText;
    ngaycapcangInput.value = selectedRow.cells[3].innerText;
    ghichuInput.value = selectedRow.cells[7].innerText;

    // Hiển thị form sửa
    form.style.display = "block";
}

function closeFormsuakehoach() {
    document.getElementById("myFormsuakehoach").style.display = "none";
}


function openFormthemcang() {
    document.getElementById("myFormthemcang").style.display = "block";
}

function closeFormthemcang() {
    document.getElementById("myFormthemcang").style.display = "none";
}

function openFormsuacang(event) {
    var selectedRow = event.target.closest('tr'); // Lấy hàng chứa nút "Sửa" được nhấn
    // Lấy các trường thông tin trong form sửa
    var form = document.getElementById("myFormsuacang");
    var idInput = form.querySelector("#id");
    var tencangInput = form.querySelector("#tencang");
    var quocgiaInput = form.querySelector("#quocgia");

    var id = event.target.dataset.id;



    idInput.value = selectedRow.cells[0].innerText;

    tencangInput.value = selectedRow.cells[1].innerText;
    quocgiaInput.value = selectedRow.cells[2].innerText;
    // Hiển thị form sửa
    form.style.display = "block";
}

function closeFormsuacang() {
    document.getElementById("myFormsuacang").style.display = "none";
}


// CHỨC DANH
function openFormthemchucdanh() {
    document.getElementById("myFormthemchucdanh").style.display = "block";
}

function closeFormthemchucdanh() {
    document.getElementById("myFormthemchucdanh").style.display = "none";
}

function openFormsuachucdanh(event) {
    var selectedRow = event.target.closest('tr'); // Lấy hàng chứa nút "Sửa" được nhấn
    // Lấy các trường thông tin trong form sửa
    var form = document.getElementById("myFormsuachucdanh");
    var idInput = form.querySelector("#id");
    var tenchucdanhInput = form.querySelector("#tenchucdanh");

    var id = event.target.dataset.id;

    // Điền thông tin từ hàng đã chọn vào các trường trong form sửa
    idInput.value = selectedRow.cells[0].innerText;

    tenchucdanhInput.value = selectedRow.cells[1].innerText;

    // Hiển thị form sửa
    form.style.display = "block";
}

function closeFormsuachucdanh() {
    document.getElementById("myFormsuachucdanh").style.display = "none";
}

// LOẠI CHỨNG CHỈ
function openFormthemloaichungchi() {
    document.getElementById("myFormthemloaichungchi").style.display = "block";
}

function closeFormthemloaichungchi() {
    document.getElementById("myFormthemloaichungchi").style.display = "none";
}

function openFormsualoaichungchi(event) {
    var selectedRow = event.target.closest('tr'); // Lấy hàng chứa nút "Sửa" được nhấn
    // Lấy các trường thông tin trong form sửa
    var form = document.getElementById("myFormsualoaichungchi");
    var idInput = form.querySelector("#id");
    var tenloaichungchiInput = form.querySelector("#tenloaichungchi");

    var id = event.target.dataset.id;

    // Điền thông tin từ hàng đã chọn vào các trường trong form sửa
    idInput.value = selectedRow.cells[0].innerText;

    tenloaichungchiInput.value = selectedRow.cells[1].innerText;

    // Hiển thị form sửa
    form.style.display = "block";
}

function closeFormsualoaichungchi() {
    document.getElementById("myFormsualoaichungchi").style.display = "none";
}

// LOẠI TÀU
function openFormthemloaitau() {
    document.getElementById("myFormthemloaitau").style.display = "block";
}

function closeFormthemloaitau() {
    document.getElementById("myFormthemloaitau").style.display = "none";
}

function openFormsualoaitau(event) {
    var selectedRow = event.target.closest('tr'); // Lấy hàng chứa nút "Sửa" được nhấn
    // Lấy các trường thông tin trong form sửa
    var form = document.getElementById("myFormsualoaitau");
    var idInput = form.querySelector("#id");
    var tenloaitauInput = form.querySelector("#tenloaitau");

    var id = event.target.dataset.id;

    // Điền thông tin từ hàng đã chọn vào các trường trong form sửa
    idInput.value = selectedRow.cells[0].innerText;

    tenloaitauInput.value = selectedRow.cells[1].innerText;

    // Hiển thị form sửa
    form.style.display = "block";
}

function closeFormsualoaitau() {
    document.getElementById("myFormsualoaitau").style.display = "none";
}
